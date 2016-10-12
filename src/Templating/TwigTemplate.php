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

namespace Eventum\Templating;

use Twig_Environment;
use Twig_Loader_Filesystem;

/**
 * twig template engine base class used by rembi
 *
 * Class TwigTemplate
 *
 * @package Rembi\Service
 */
class TwigTemplate extends Twig_Environment
{
    public function __construct()
    {
        /**
         * twig template engine options
         *
         * @link http://twig.sensiolabs.org/doc/api.html#environment-options
         */
        $options = [
            'charset' => APP_CHARSET,
            'cache' => false,
            'auto_reload' => false
        ];
        $loader = new Twig_Loader_Filesystem([APP_LOCAL_PATH . '/templates', APP_TPL_PATH]);

        parent::__construct($loader, $options);
    }
}
