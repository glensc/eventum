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

namespace Eventum\EventListener;

use Eventum\Event\WorkflowEvent;
use Eventum\Event\WorkflowEvents;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class WorkflowListener implements EventSubscriberInterface
{
    public function __construct()
    {
    }

    public function onEmailBlocked(WorkflowEvent $event, $eventName, EventDispatcher $eventDispatcher)
    {
        echo __FUNCTION__, ' got ', get_class($event), ' ' . $eventName, "\n";
        printf('prj_id: %s', $event->prj_id);
    }

    public static function getSubscribedEvents()
    {
        return [
            WorkflowEvents::EMAIL_BLOCKED => 'onEmailBlocked',
        ];
    }
}
