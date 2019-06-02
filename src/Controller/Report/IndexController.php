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

namespace Eventum\Controller\Report;

use Access;
use Auth;
use Eventum\Controller\Traits\RedirectResponseTrait;
use Eventum\Controller\Traits\SmartyResponseTrait;
use Symfony\Component\HttpFoundation\Response;

class IndexController
{
    use RedirectResponseTrait;
    use SmartyResponseTrait;

    /** @var string */
    protected $tpl_name = 'reports/index.tpl.html';
    /** @var  int */
    private $usr_id;

    public function indexAction(): Response
    {
        Auth::checkAuthentication();

        $this->usr_id = Auth::getUserID();

        if (!Access::canAccessReports($this->usr_id)) {
            return $this->redirect(APP_RELATIVE_URL . 'main.php');
        }

        return $this->render($this->tpl_name);
    }
}
