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

class TwigTemplateTest extends TestCase
{
    /**
     * a @count like this:
     * {% if resolutions|@count > 0 %}
     * can be replaced with:
     * {% if resolutions %}
     */
    public function testAtCount()
    {
        $template = '{% if resolutions %}New Year Resolutions{% else %}No Resolutions{% endif %}';
        $params = [];

        // undefined
        $res = $this->renderInline($template, $params);
        $this->assertEquals('No Resolutions', $res);

        // empty array
        $params['resolutions'] = [];
        $res = $this->renderInline($template, $params);
        $this->assertEquals('No Resolutions', $res);

        // non-empty array
        $params['resolutions'] = [1];
        $res = $this->renderInline($template, $params);
        $this->assertEquals('New Year Resolutions', $res);
    }

    private function renderInline($template, $params)
    {
        $filename = 'test.html';
        $loader = new Twig_Loader_Array([$filename => $template]);
        $twig = new Twig_Environment($loader);

        return $twig->render($filename, $params);
    }
}
