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

use Eventum\Templating\TwigTemplate;

class TwigTemplateTest extends TestCase
{
    public function testClose()
    {
        $twig = $this->getTwig();
        $twig->render('close.tpl.html');
    }

    /**
     * test that explressions like this:
     * {% if resolutions|@count > 0 %}
     * {% if incident_details|default('') != '' and incident_details|@count > 0 %}
     * can be replaced with simple condition:
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

    /**
     * test filters
     */
    public function testRot13()
    {
        $res = $this->renderInline("{{ 'Twig'|rot13 }}");
        $this->assertEquals('Gjvt', $res);
    }

    /**
     * test is_array():
     * {% if is_array(selected_cfo_ids) and in_array(key, selected_cfo_ids) %}checked{% endif %} />{{ display }}</label></li>
     */
    public function testIsArray()
    {
        $template = "{% if is_array(selected_cfo_ids) and in_array(key, selected_cfo_ids) %}checked{% endif %}";
        $params = [];

        // undefined
        $res = $this->renderInline($template, $params);
        $this->assertEquals('', $res);

        $params = [
            'selected_cfo_ids' => ['ff'],
            'key' => 'ff',
        ];
        $res = $this->renderInline($template, $params);
        $this->assertEquals('checked', $res);
    }

    /**
     * Helper to get template with params processed without template file
     *
     * @param string $template
     * @param array $params
     * @return string
     */
    private function renderInline($template, $params = [])
    {
        $filename = 'test.html';
        $loader = new Twig_Loader_Array([$filename => $template]);
        $twig = new Twig_Environment($loader);

        TwigTemplate::addFilters($twig);
        TwigTemplate::addFunctions($twig);

        return $twig->render($filename, $params);
    }

    /**
     * Get Eventum TwigTemplate
     *
     * @return TwigTemplate
     */
    private function getTwig()
    {
        $twig = new TwigTemplate();

        /** @var Twig_Loader_Filesystem $loader */
        $loader = $twig->getLoader();
        $loader->prependPath(APP_PATH . '/tests/data/templates/twig');

        return $twig;
    }
}
