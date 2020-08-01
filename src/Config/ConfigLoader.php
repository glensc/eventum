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

namespace Eventum\Config;

class ConfigLoader
{
    /** @var string */
    private $path;
    /** @var ConfigPersistence */
    private $loader;

    public function __construct(string $path)
    {
        $this->loader = new ConfigPersistence();
        $this->path = $path;
    }

    /**
     * Initialize config object, load it from setup files, merge defaults.
     */
    public function load(): Config
    {
        $config = new Config($this->getDefaults(), true);
        $config->merge(new Config($this->loader->load($this->path)));

        return $config;
    }

    /**
     * Method used to get the system-wide defaults.
     *
     * @return array of the default preferences
     */
    private function getDefaults(): array
    {
        $appPath = Paths::APP_PATH;

        // at minimum should define top level array elements
        // so that fluent access works without errors and notices
        $defaults = [
            'relative_url' => '/',
            'monitor' => [
                'diskcheck' => [
                    'status' => 'enabled',
                    'partition' => $appPath,
                ],
                'paths' => [
                    'status' => 'enabled',
                ],
                'ircbot' => [
                    'status' => 'enabled',
                ],
            ],

            'scm' => [],
            'smtp' => [],
            'ldap' => [],

            'email_error' => [
                'subject' => '%extra.short_name%: %message%',
            ],

            'email_routing' => [
                'warning' => [],
            ],
            'note_routing' => [],
            'draft_routing' => [],

            'subject_based_routing' => [],

            'email_reminder' => [],

            'extensions' => [],

            'xhgui' => [
                // https://github.com/eventum/eventum/pull/519
                'status' => 'disabled',
            ],

            'sentry' => [
                'status' => 'disabled',
                // dsn consists of: 'https://<key>@<domain>/<project>'
                'key' => '',
                'project' => '',
                'domain' => '',
            ],

            'handle_clock_in' => 'enabled',

            // default expiry: 5 minutes
            'issue_lock' => 300,

            'relative_date' => 'enabled',
            'audit_trail' => 'disabled',

            'attachments' => [
                'default_adapter' => 'pdo',
                'adapters' => [],
            ],
        ];

        return $defaults;
    }
}
