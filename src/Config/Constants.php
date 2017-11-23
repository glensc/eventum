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

use Setup;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Constants
{
    public function __construct(array $options = [])
    {
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);

        $this->options = $resolver->resolve($options);
    }

    public function getOptions()
    {
        return $this->options;
    }

    public static function initialize()
    {
        $constants = (new static(Setup::get()['app']->toArray()))->getOptions();

        foreach ($constants as $name => $value) {
            if (!defined($name)) {
                define($name, $value);
            }
        }
    }

    private function configureOptions(OptionsResolver $resolver)
    {
        $defaults = [
            'APP_PATH' => dirname(__DIR__, 2),
            'APP_CONFIG_PATH' => function (Options $options) {
                return $options['APP_PATH'] . '/config';
            },
            'APP_INC_PATH' => function (Options $options) {
                return $options['APP_PATH'] . '/lib/eventum';
            },
            'APP_SETUP_FILE' => function (Options $options) {
                return $options['APP_CONFIG_PATH'] . '/setup.php';
            },
            'APP_VAR_PATH' => function (Options $options) {
                return $options['APP_PATH'] . '/var';
            },
            'APP_TPL_PATH' => function (Options $options) {
                return $options['APP_PATH'] . '/templates';
            },
            'APP_TPL_COMPILE_PATH' => function (Options $options) {
                return $options['APP_VAR_PATH'] . '/cache';
            },
            'APP_LOCKS_PATH' => function (Options $options) {
                return $options['APP_VAR_PATH'] . '/lock';
            },
            'APP_LOG_PATH' => function (Options $options) {
                return $options['APP_VAR_PATH'] . '/log';
            },
            'APP_ERROR_LOG' => function (Options $options) {
                return $options['APP_LOG_PATH'] . '/errors.log';
            },
        ];

        $resolver->setDefaults($defaults);
    }
}
