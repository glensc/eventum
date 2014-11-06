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
class Setup2
{
    /**
     * Method used to load the setup options for the application.
     *
     * TODO: obsolete reload, reload automatically on save?
     *
     * @param bool $reload if the data should be forced to be loaded again
     * @return ConfigStore
     */
    public static function getInstance($reload = false)
    {
        static $setup;
        if (!$setup || $reload == true) {
            $setup = new ConfigStore(APP_SETUP_FILE, self::getDefaults());
        }

        return $setup;
    }

    /**
     * @param bool $force
     * @return ConfigStore
     * @deprecated use getInstance
     */
    public static function load($force = false)
    {
        return self::getInstance($force);
    }

    /**
     * Method used to save the setup options for the application.
     *
     * @param   array $options The system-wide preferences
     * @return  int 1 if the update worked, -1 or -2 otherwise
     * @deprecated use $setup->save() cant catch exceptions
     */
    public static function save($options)
    {
        $setup = self::getInstance();

        if ($options) {
            // overwrite options
            $setup->setConfig($options);
        }

        try {
            $setup->save();
        } catch (Exception $e) {
            $code = $e->getCode();
            error_log($e->getMessage());
            error_log($e->getTraceAsString());

            return $code ?: -1;
        }
    }

    /**
     * Method used to get the system-wide defaults.
     *
     * @return array of the default preferences
     */
    public static function getDefaults()
    {
        $defaults = [
            'monitor' => [
                'diskcheck' => [
                    'status' => 'enabled',
                    'partition' => APP_PATH,
                ],
                'paths' => [
                    'status' => 'enabled',
                ],
                'ircbot' => [
                    'status' => 'enabled',
                ],
            ],
            'handle_clock_in' => 'enabled',

            // default expiry: 5 minutes
            'issue_lock' => 300,
        ];

        return $defaults;
    }
}
