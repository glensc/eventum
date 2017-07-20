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

use Email_Account;
use Eventum\Mail\ImapMessage;
use Eventum\Test\TestCase;
use Support;

/**
 * @group imap
 */
class DownloadEmailTest extends TestCase
{
    private $account_id = 3;

    public function testDownload()
    {
        $account = Email_Account::getDetails($this->account_id, true);
        $mbox = Support::connectEmailServer($account);

        $this->assertNotEmpty($mbox);

        global $m0;
        $m0 = $this->readDataFile('issue-88943.eml');
        $mail = ImapMessage::createFromImap($mbox, 1, $account);
        Support::processMailMessage($mail, $account);

        global $m1, $m2;
        $this->assertEquals($m1, $m2);
    }

    /**
     * Test Support::getEmailInfo when $info['ema_use_routing'] is true
     */
    public function testRouting()
    {
        //        $routed = Routing::route($message);
    }
}
