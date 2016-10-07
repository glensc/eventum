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

use Abstract_Workflow_Backend;
use Eventum\Event\WorkflowEvent;
use Eventum\Event\WorkflowEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class Listening for Event Dispatcher event and proxying them to legacy workflow class
 *
 * @package Eventum\EventListener
 */
class LegacyWorkflowListener implements EventSubscriberInterface
{
    /** @var Abstract_Workflow_Backend */
    private $workflow;

    public function __construct($workflow)
    {
        $this->workflow = $workflow;
    }

    public function handleBlockedEmail($event)
    {
        return $this->handleEvent(__FUNCTION__, $event);
    }

    /**
     * Get indexed arguments from event
     *
     * @param WorkflowEvent $event
     * @return array
     */
    private function getArguments($event)
    {
        $args = [];
        foreach ($event->getParams() as $param) {
            $args[] = $param;
        }

        return $args;
    }

    /*
     * Call method named $methodName on workflow class.
     * Note: this method works as long caller interface does not change
     * But could use phpdoc comments to match arguments (does Symfony2 can do DI based on this?)
     */
    private function handleEvent($methodName, WorkflowEvent $event)
    {
        $function = [$this->workflow, $methodName];
        $args = $this->getArguments($event);

        return call_user_func_array($function, $args);
    }

    public static function getSubscribedEvents()
    {
        return [
            WorkflowEvents::EMAIL_BLOCKED => 'handleBlockedEmail',
        ];
    }
}
