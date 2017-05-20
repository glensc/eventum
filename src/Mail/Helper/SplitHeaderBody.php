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

namespace Eventum\Mail\Helper;

use Mail_Helper;
use Zend\Mime;

class SplitHeaderBody
{
    /**
     * Split $raw email to headers array and content part.
     */
    public static function splitMessage($raw, &$headers, &$content)
    {
        // this method could be really easy
        // if we wouldn't need to handle broken input.

        // Handle messages broken by Mail_Helper::rewriteThreadingHeaders()
        // which by inserted References: to \r\n separated headers
        // used \n separator.
        file_put_contents('/tmp/debug.txt', $raw);

//        if (!substr_count($raw, "\r\n\r\n")) {
        // split by standard headers separator
//            list($headers, $content) = explode("\r\n\r\n", $raw, 2);

//        } else {
        // split by unix separator
//            list($headers, $content) = explode("\n\n", $raw, 2);
//        }

//                    Mime\Decode::splitMessage($raw, $headers, $content, "\r\n");

        // then retry with \r\n
//        try {
//            Mime\Decode::splitMessage($raw, $headers, $content, "\n");
//        } catch (\Zend\Mail\Exception\RuntimeException $e) {
//            Mime\Decode::splitMessage($raw, $headers, $content, "\r\n");
//        }


        // try parse. if failed retry with our own header split
        try {
            Mime\Decode::splitMessage($raw, $headers, $content);
        } catch (\Zend\Mail\Exception\RuntimeException $e) {
            // retry our own splitting
            // message likely corrupted by eventum
            list($headers, $content) = explode("\r\n\r\n", $raw, 2);

            // split by \r\n, but \r may be optional
            $headers = preg_split("/\r?\n/", $headers);
//             strip any leftover \r
            $headers = array_map('trim', $headers);

//            Mime\Decode::splitMessage($raw, $headers, $content);
        }


        // split by \r\n, but \r may be optional
//        $headers = preg_split("/\r?\n/", $headers);
        // strip any leftover \r
//        $headers = array_map('trim', $headers);

        // now headers is in array form, hard to break that again.
    }

    private function jurajaokse()
    {
        // some old emails that were \r separated
        // eventum filled as \r\r\nheader\nheader\r\n
        //    Mail_Helper::rewriteThreadingHeaders()
        // corrupted them

        // split headers/body by \r\n and join headers back by \n
        // this ensures Headers::fromString doesn't assume email headers are \n\n separated
        // splitMessage)_
        list($headers, $content) = explode("\r\n\r\n", $raw, 2);

        $headers = preg_split("/\r?\n/", $headers);
        // strip any leftover \r
        $headers = array_map('trim', $headers);
//        echo json_encode($headersArray);die;
//        $headers = join("\n", $headersArray);
//        $raw = $headers."\n\n".$content;

        /*        // try with default \n
                // then retry with \r\n
                try {
                    Mime\Decode::splitMessage($raw, $headers, $content, "\n");
                } catch (\Zend\Mail\Exception\RuntimeException $e) {
                    Mime\Decode::splitMessage($raw, $headers, $content, "\r\n");
                }*/

        /*
                // if $raw is "\r" only separated, replace it with "\n"
                if (substr_count($headers, "\n") == 0) {
                    $parts = explode("\r", $raw);
                    $raw = join("\n", $parts);
                }*/
        return new CreateFromRaw();

//        $message = new self(['root' => true, 'raw' => $raw]);
        $message = new self(['root' => true, 'headers' => $headers, 'content' => $content]);

        return $message;
    }
}
