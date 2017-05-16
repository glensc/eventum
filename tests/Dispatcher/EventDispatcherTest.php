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

use Eventum\Event\WorkflowEvent;
use Eventum\Event\WorkflowEvents;
use Eventum\EventListener\WorkflowListener;
use Eventum\Test\Event\StoreSubscriber;
use Eventum\Test\TestCase;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcher;

class EventDispatcherTest extends TestCase
{
    public function test1()
    {
        $dispatcher = new EventDispatcher();
        $listener = new WorkflowListener();
        $dispatcher->addListener(WorkflowEvents::EMAIL_BLOCKED, [$listener, 'onEmailBlocked']);
    }

    public function test2()
    {
        $dispatcher = new EventDispatcher();
        $dispatcher->addSubscriber(new WorkflowListener());

        // create the FilterOrderEvent and dispatch it
        $event = new WorkflowEvent(['prj_id' => 1]);
        $dispatcher->dispatch(WorkflowEvents::EMAIL_BLOCKED, $event);
    }

    public function test3()
    {
        $dispatcher = new EventDispatcher();
        $dispatcher->addSubscriber(new WorkflowListener());

        // create the FilterOrderEvent and dispatch it
        $params = [
            'prj_id' => 1,
            'issue_id' => 123,
            'email_details' => [],
            'type' => 'note',
        ];
        $event = new WorkflowEvent($params);
        $dispatcher->dispatch(WorkflowEvents::EMAIL_BLOCKED, $event);

        // check the parameter after event was dispatched
        $this->assertEquals($params['prj_id'], $event->prj_id);
    }

    public function test4()
    {
        $dispatcher = new EventDispatcher();
        $dispatcher->addSubscriber(new WorkflowListener());

        // create the FilterOrderEvent and dispatch it
        $params = [
            'prj_id' => 1,
            'issue_id' => 123,
            'email_details' => [],
            'type' => 'note',
        ];
        WorkflowEvent::dispatchEvent($dispatcher, WorkflowEvents::EMAIL_BLOCKED, $params);
    }

    public function test5()
    {
        $dispatcher = new EventDispatcher();
        $subscriber = new StoreSubscriber();
        $dispatcher->addSubscriber($subscriber);
    }
}
