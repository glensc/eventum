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

namespace Eventum\Test\Event;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class StoreSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            'response' => [
                ['onKernelResponsePre', 10],
                ['onKernelResponsePost', -10],
            ],
            'name' => 'onStoreOrder',
        ];
    }

    public function onKernelResponsePre(Event $event)
    {
        // ...
    }

    public function onKernelResponsePost(Event $event)
    {
        // ...
    }

    public function onStoreOrder(Event $event)
    {
        // ...
    }
}
