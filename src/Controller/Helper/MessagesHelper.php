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

namespace Eventum\Controller\Helper;

use Eventum\Session;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;

class MessagesHelper
{
    public const MSG_INFO = 'info';
    public const MSG_WARNING = 'warning';
    public const MSG_ERROR = 'error';
    public const MSG_HTML_BOX = 'html_box';
    public const MSG_NOTE_BOX = 'note_box';

    /** @var FlashBagInterface */
    private $flashBag;

    public function __construct()
    {
        $this->flashBag = Session::getFlashBag();
    }

    /**
     * Add message of type info
     *
     * @param string $msg
     */
    public function addInfoMessage($msg): void
    {
        $this->flashBag->add(self::MSG_INFO, $msg);
    }

    /**
     * Add message of type error
     *
     * @param string $msg
     */
    public function addErrorMessage($msg): void
    {
        $this->flashBag->add(self::MSG_ERROR, $msg);
    }

    /**
     * Add message of type HTML box
     *
     * @param string $msg
     */
    public function addHtmlBoxMessage($msg): void
    {
        $this->flashBag->add(self::MSG_HTML_BOX, $msg);
    }

    /**
     * Get messages, clear the session store
     *
     * @return string[]
     */
    public function getMessages()
    {
        return $this->flashBag->all();
    }

    public function mapMessages($result, $map): void
    {
        foreach ($map as $val => $info) {
            if ($result == $val) {
                $this->flashBag->add($info[1], $info[0]);

                return;
            }
        }
    }
}
