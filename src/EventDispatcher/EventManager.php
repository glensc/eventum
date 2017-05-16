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

namespace Eventum\EventDispatcher;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcher as SymfonyEventDispatcher;

class EventManager
{
    /**
     * Singleton for Event Dispatcher
     *
     * @return SymfonyEventDispatcher
     */
    public static function getEventDispatcher()
    {
        static $dispatcher;
        if (!$dispatcher) {
            $dispatcher = new SymfonyEventDispatcher();
        }

        return $dispatcher;
    }

    /**
     * Helper to dispatch events
     *
     * @param string $eventName
     * @param Event $event
     */
    public static function dispatch($eventName, Event $event = null)
    {
        self::getEventDispatcher()->dispatch($eventName, $event);
    }
}
