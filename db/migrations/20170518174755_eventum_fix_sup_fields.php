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

use Eventum\Db\AbstractMigration;
use Eventum\Mail\Helper\SplitHeaderBody;
use Eventum\Mail\MailMessage;
use Zend\Mail\Headers;

class EventumFixSupFields extends AbstractMigration
{
    /** @var string */
    private $email_table;
    /** @var string */
    private $body_table;

    /**
     * This would be in init() but it's too early to use adapter.
     *
     * @see https://github.com/robmorgan/phinx/issues/1095
     */
    public function initTables()
    {
        $this->email_table = $this->quoteColumnName('support_email');
        $this->body_table = $this->quoteColumnName('support_email_body');
    }

    public function up()
    {
        $this->initTables();
        $this->fixTruncatedAddressFields('sup_cc', 'Cc');
        $this->fixTruncatedAddressFields('sup_to', 'To');
        throw new RuntimeException();
    }

    public function fixTruncatedAddressFields($field, $header)
    {
        $st = $this->getTruncatedRecords($field);
        foreach ($st as $row) {
            $sup_id = $row['sup_id'];
            file_put_contents("/tmp/{$row['sup_id']}", $row['body']);
            $mail = $this->createMessage($row['body']);
            $value = $this->unfold($mail->{$header});
            $this->updateFieldValue($sup_id, $field, $value);
        }
    }

    /**
     * @see \Zend\Mail\Header\AbstractAddressList::fromString
     * @param $fieldValue
     * @return mixed
     */
    private function unfold($fieldValue)
    {
        $fieldValue = str_replace(Headers::FOLDING, ' ', $fieldValue);

        return $fieldValue;
    }

    private function updateFieldValue($sup_id, $field, $value)
    {
        $field = $this->quoteTableName($field);
        $value = $this->quoteValue($value);

        echo "Updating: $sup_id($field): $value\n";
        $stmt
            = "
            UPDATE {$this->email_table}
            SET $field=$value
            WHERE sup_id=$sup_id AND 1=0
        ";
        $this->query($stmt);
    }

    /**
     * Get sup_id where $field length appears to be truncated
     * Thus length is exactly 255 characters.
     * This will return only records where support_email_body is not truncated.
     *
     * @see https://github.com/eventum/eventum/issues/266
     *
     * @param string $field
     * @param int $length
     * @return Traversable|array
     */
    private function getTruncatedRecords($field, $length = 255)
    {
        $field = $this->quoteTableName($field);

        $stmt
            = "
            SELECT sup_id, $field field, seb_full_email body
            FROM {$this->email_table} e, {$this->body_table} b
            WHERE sup_id=seb_sup_id
            AND LENGTH($field) = $length
/*            and sup_id not in (10357, 4876)
*/
/*            aND sup_id=10357
*/
        ";

        return $this->query($stmt);
    }

    private function createMessage($body)
    {

        SplitHeaderBody::splitMessage($body, $headers, $content);

//        $message = new self(['root' => true, 'raw' => $raw]);
//        $message = new self(['root' => true, 'headers' => $headers, 'content' => $content]);

        $mail = MailMessage::createFromHeaderBody($headers, $content);

        return $mail;
    }
}
