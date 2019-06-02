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

use Eventum\Controller\Traits\AccessTrait;
use Eventum\Controller\Traits\RedirectResponseTrait;
use Eventum\Controller\Traits\SmartyResponseTrait;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Security;

class IndexController
{
    use RedirectResponseTrait;
    use SmartyResponseTrait;
    use AccessTrait;

    /** @var string */
    protected $tpl_name = 'reports/index.tpl.html';

    public function indexAction(Security $security): Response
    {
        try {
            $this->requireAccess($security, 'reports');
        } catch (AccessDeniedException $e) {
            return $this->redirect(APP_RELATIVE_URL . 'main.php');
        }

        return $this->render($this->tpl_name);
    }
}
