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

use Eventum\Mail\MailMessage;
use Eventum\Test\TestCase;
use Mail_Helper;
use Mime_Helper;
use Zend\Mail\Header\GenericHeader;
use Zend\Mail\Header\To;
use Zend\Mail\Headers;

/**
 * @group mail
 */
class MailParseTest extends TestCase
{
    /**
     * Test that HTML entities used in text/html part get decoded
     */
    public function testParseHtmlEntities()
    {
        $full_message = $this->readDataFile('encoding.txt');

        $structure = Mime_Helper::decode($full_message, true, true);
        $this->assertEquals(
            "\npöördumise töötaja.\n<b>Võtame</b> töösse võimalusel.\npöördumisele süsteemis\n\n", $structure->body
        );
    }

    public function testBug684922()
    {
        $message = $this->readDataFile('bug684922.txt');

        $structure = Mime_Helper::decode($message, true, true);
        $message_body = $structure->body;
        $this->assertEquals('', $message_body);
    }

    /**
     * Test reading email whose headers are \r\n separated
     * but body is \n separated. AND it contains \n\n in the email body
     */
    public function testReadHeadersSeparator()
    {
        /*        $content = $this->readDataFile('10357_fixed.txt');

        $m = MailMessage::createFromString($content);
        $headers = $m->getHeadersArray();
        list($text_headers, $body) = Mail_Helper::rewriteThreadingHeaders(1, $content, $headers);

        file_put_contents('/tmp/broken2.txt', $text_headers);
*/

        $content = $this->readDataFile('10357_original.txt');
        $mail = MailMessage::createFromString($content);

//        $content = $this->readDataFile('10357.txt');
//        $mail = MailMessage::createFromString($content);
    }

    public function testToHeaderNameWithComma()
    {
        $to = To::fromString('To: "=?iso-8859-1?Q?Wetlesen=2C_Asbj=F8rn?=" <asbjorn.wetlesen@findexa.no>');
        echo $to->toString();
        $to = To::fromString($to->toString());
        echo $to->toString();
    }

    public function testDogFood()
    {
        $headers = new Headers();
        $headers->addHeader(GenericHeader::fromString('To: "=?iso-8859-1?Q?Wetlesen=2C_Asbj=F8rn?=" <asbjorn.wetlesen@findexa.no>'));
        $headers->get('To');
    }
}
