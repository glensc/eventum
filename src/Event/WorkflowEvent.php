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

namespace Eventum\Event;

use InvalidArgumentException;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcher;

class WorkflowEvent extends Event
{
    /**
     * Event parameters.
     * Access to event parameters is controlled by magic get/set to protect access to wrong parameters.
     *
     * @var array
     */
    private $params;

    /**
     * Place to store result, if any
     *
     * @var mixed
     */
    private $result;

    public function __construct($params)
    {
        $this->params = $params;
    }

    /**
     * Get all parameters
     *
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    public function setResult($result)
    {
        $this->result = $result;
    }

    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        if (!isset($this->params[$name])) {
            throw new InvalidArgumentException("Invalid parameter: $name");
        }

        return $this->params[$name];
    }

    public function __set($name, $value)
    {
        if (!isset($this->params[$name])) {
            throw new InvalidArgumentException("Invalid parameter: $name");
        }
        $this->params[$name] = $value;
    }

    public function __isset($name)
    {
        return isset($this->params[$name]);
    }

    public static function dispatchEvent(EventDispatcher $dispatcher, $eventName, $parameters)
    {
        $event = new self($parameters);
        $dispatcher->dispatch($eventName, $event);
    }
}
