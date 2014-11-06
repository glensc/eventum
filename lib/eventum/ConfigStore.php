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

/**
 * Class to handle the business logic related to setting and updating
 * the setup information of the system.
 */
class ConfigStore implements ArrayAccess
{
    /**
     * @var string
     */
    protected $path;

    /**
     * @var array
     */
    protected $config;

    /**
     * @var array
     */
    protected $detaults;

    /**
     * @param string $path path to config file to load
     * @param array $defaults defaults to merge with loaded from config file
     */
    public function __construct($path, $defaults = [])
    {
        $this->path = $path;
        $this->defaults = $defaults;
        $this->config = $this->load();
    }

    private function load()
    {
        $this->readable($this->path);

        $eventum_setup_string = $eventum_setup = null;
        $config = require $this->path;

        // fall back to old modes:
        // 1. $eventum_setup string
        // 2. base64 encoded $eventum_setup_string
        // TODO: save it over so the support could be removed soon
        if (isset($eventum_setup)) {
            $config = $eventum_setup;
        } elseif (isset($eventum_setup_string)) {
            $config = unserialize(base64_decode($eventum_setup_string));
        }

        // merge with defaults
        if ($this->defaults) {
            $config = Setup::array_extend($this->defaults, $config);
        }

        return $config;
    }

    /**
     * return true if config is modified
     */
    private function modified()
    {
        $current = $this->dump($this->config);
        $stored = $this->dump($this->load());

        return $current == $stored;
    }

    /**
     * Save config to filesystem
     */
    public function save()
    {
        $this->writable($this->path);
        $contents = $this->dump($this->config);
        $res = file_put_contents($this->path, $contents);
        if ($res === false) {
            throw new RuntimeException("Can't write {$this->path}", -2);
        }
        clearstatcache(true, $this->path);
    }

    private function dump($config)
    {
        return '<' . "?php\nreturn " . var_export($config, 1) . ";\n";
    }

    private function readable($path)
    {
        if (!file_exists($path)) {
            throw new RuntimeException("File '$path' does not exist'", -1);
        }
        if (!is_readable($path)) {
            throw new RuntimeException("File '$path' is not readable", -2);
        }
    }

    /**
     * Check if the file can be created or not
     *
     * @param string $path
     * @throws RuntimeException
     */
    private function writable($path)
    {
        // if file exists, the file must be writable
        if (file_exists($path)) {
            if (!is_writable($path)) {
                throw new RuntimeException("File '$path' is not writable'", -2);
            }

            return;
        }

        // if file does not exist, it's parent dir must be writable
        $dir = dirname($path);
        if (!is_writable($dir)) {
            throw new RuntimeException("Directory '$dir' is not writable'", -1);
        }
    }

    /**
     * save config if modified
     */
    public function __destruct()
    {
        if ($this->modified()) {
            $this->save();
        }
    }

    public function __isset($key)
    {
        return isset($this->config[$key]);
    }

    /*
     * ArrayAccess methods
     */

    /**
     * Whether a offset exists
     * @param mixed $offset an offset to check for
     * @return bool true on success or false on failure.
     * The return value will be casted to boolean if non-boolean was returned
     * @see http://php.net/manual/en/arrayaccess.offsetexists.php
     */
    public function offsetExists($offset)
    {
        return isset($this->config[$offset]);
    }

    /**
     * Offset to retrieve
     *
     * @param mixed $offset the offset to retrieve
     * @return mixed can return all value types
     * @see http://php.net/manual/en/arrayaccess.offsetget.php
     */
    public function offsetGet($offset)
    {
        return $this->config[$offset];
    }

    /**
     * Offset to set
     *
     * @param mixed $offset the offset to assign the value to
     * @param mixed $value the value to set
     * @see http://php.net/manual/en/arrayaccess.offsetset.php
     */
    public function offsetSet($offset, $value)
    {
        return $this->config[$offset] = $value;
    }

    /**
     * Offset to unset
     *
     * @param mixed $offset the offset to unset
     * @see http://php.net/manual/en/arrayaccess.offsetunset.php
     */
    public function offsetUnset($offset)
    {
        unset($this->config[$offset]);
    }
}
