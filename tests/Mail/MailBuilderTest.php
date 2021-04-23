<?php

/*
 * This file is part of the Eventum (Issue Tracking System) package.
 *
 * @copyright (c) Eventum Team
 * @license GNU General Public License, version 2 or later (GPL-2+)
 *
 * For the full copyright and license information,
 * please see the COPYING and AUTHORS files
 * that were distributed with this source code.
 */

namespace Eventum\Test\Mail;

use Eventum\Attachment\Attachment;
use Eventum\Mail\MailBuilder;
use Eventum\Mail\MailMessage;
use Eventum\Test\TestCase;
use Laminas\Mail\Header\MessageId;
use ReflectionProperty;

class MailBuilderTest extends TestCase
{
    /** @var MailMessage */
    private $mail;

    private $from;
    private $to;
    private $subject;
    private $message_id;
    private $date;

    public function setUp(): void
    {
        $this->from = '"Admin User " <note-3@eventum.example.org>';
        $this->to = '"Admin User" <admin@example.com>';
        $this->subject = '[#3] Note: Re: pläh';
        $this->message_id = 'eventum.md5.5bh5b2b2k.1odx18yqps5xd@eventum.example.org';
        $this->date = 'Wed, 19 Jul 2017 18:15:33 GMT';

        $mail = MailMessage::createNew()
            ->setFrom($this->from)
            ->setSubject($this->subject)
            ->setTo($this->to)
            ->setDate($this->date);

        /** @var MessageId $header */
        $header = $mail->getHeaderByName('Message-Id');
        $header->setId($this->message_id);

        $this->mail = $mail;
    }

    /**
     * @see http://framework.zend.com/manual/current/en/modules/zend.mail.message.html
     * @see http://framework.zend.com/manual/current/en/modules/zend.mail.attachments.html
     */
    public function testPlaintext(): void
    {
        $body = "Hello, bödi tekst\n\nBye";
        $from = '"Admin User " <note-3@eventum.example.org>';
        $to = '"Admin User" <admin@example.com>';
        $subject = '[#3] Note: Re: pläh';

        $builder = new MailBuilder();
        $builder
            ->addTextPart($body)
            ->getMessage()
            ->setFrom($from)
            ->setTo($to)
            ->setSubject($subject);
        $mail = $builder->toMailMessage();

        $this->assertStringStartsWith('text/plain', $mail->getHeaders()->get('Content-Type')->getFieldValue());
        $this->assertEquals(0, $mail->countParts());
        $expected = "Hello, bödi tekst\r\n\r\nBye";
        $this->assertEquals($expected, $mail->getMessageBody());
    }

    public function testMimeMessageAttachment(): void
    {
        $body = "Hello, bödi tekst\n\nBye\n";

        $builder = new MailBuilder();
        $builder->addTextPart($body);
        $builder->setSubject($this->subject);
        $builder->setFrom($this->from);
        if ($this->to) {
            $builder->setTo($this->to);
        }

        // textual attachment
        $attachment = $this->createAttachment(
            [
                'iaf_file' => 'lamp€1',
                'iaf_filetype' => 'application/octet-stream',
                'iaf_filename' => 'test2123.txt',
            ]
        );
        $builder->addAttachment($attachment);

        // binary
        $attachment = $this->createAttachment(
            [
                'iaf_file' => "\x1b\xff\xff\xcf",
                'iaf_filetype' => 'application/octet-stream',
                'iaf_filename' => 'Testá.xlsx',
            ]
        );
        $builder->addAttachment($attachment);

        $mail = $builder->toMailMessage();

        $this->assertStringStartsWith('multipart/mixed;', $mail->contentType);

        // Test that filename is with expected value
        $m = MailMessage::createFromString($mail->getRawContent());
        $attachments = $m->getAttachments();
        $this->assertEquals('Testá.xlsx', $attachments[1]['filename']);
    }

    private function createAttachment(array $params): Attachment
    {
        $attachment = new Attachment($params['iaf_filename'], $params['iaf_filetype']);
        $property = new ReflectionProperty($attachment, 'blob');

        $property->setAccessible(true);
        $property->setValue($attachment, $params['iaf_file']);

        return $attachment;
    }
}
