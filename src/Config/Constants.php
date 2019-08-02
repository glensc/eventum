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
use Zend\Config\Config;

class Constants
{
    /** @var array */
    private $options;

    public function __construct()
    {
        /** @var Config $paths */
        $paths = Setup::get()['app']['paths'];
        $options = $paths->toArray();

        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);

        $this->options = $resolver->resolve($options);
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public static function initialize(): void
    {
        $constants = (new static())->getOptions();

        foreach ($constants as $name => $value) {
            if (!defined($name)) {
                define($name, $value);
            }
        }
    }

    private function configureOptions(OptionsResolver $resolver): void
    {
        $defaults = [
            'APP_PATH' => dirname(__DIR__, 2),
            'APP_CONFIG_PATH' => static function (Options $options) {
                return $options['APP_PATH'] . '/config';
            },
            'APP_INC_PATH' => static function (Options $options) {
                return $options['APP_PATH'] . '/lib/eventum';
            },
            'APP_SETUP_FILE' => static function (Options $options) {
                return $options['APP_CONFIG_PATH'] . '/setup.php';
            },
            'APP_VAR_PATH' => static function (Options $options) {
                return $options['APP_PATH'] . '/var';
            },
            'APP_TPL_PATH' => static function (Options $options) {
                return $options['APP_PATH'] . '/templates';
            },
            'APP_TPL_COMPILE_PATH' => static function (Options $options) {
                return $options['APP_VAR_PATH'] . '/cache';
            },
            'APP_LOCKS_PATH' => static function (Options $options) {
                return $options['APP_VAR_PATH'] . '/lock';
            },
            'APP_LOG_PATH' => static function (Options $options) {
                return $options['APP_VAR_PATH'] . '/log';
            },
            'APP_ERROR_LOG' => static function (Options $options) {
                return $options['APP_LOG_PATH'] . '/errors.log';
            },
        ];

        $resolver->setDefaults($defaults);
    }
}
