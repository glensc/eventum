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

namespace Eventum\Controller\Traits;

use Access;
use Eventum\Model\Entity\User;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

trait AccessTrait
{
    protected function requireAccess(Security $security, string $facility): void
    {
        // https://symfony.com/doc/current/security.html#a-configuring-how-your-users-will-authenticate
        /** @var User $user */
        $user = $security->getUser();
        if (!$user instanceof UserInterface) {
            throw new AccessDeniedException();
        }

        $callable = [
            Access::class,
            sprintf('canAccess%s', ucfirst($facility)),
        ];

        if (!is_callable($callable)) {
            throw new AccessDeniedException();
        }

        $result = $callable($user->getId());

        if (!$result) {
            throw new AccessDeniedException();
        }
    }
}
