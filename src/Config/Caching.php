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

use Symfony\Component\Config\ConfigCache;
use Symfony\Component\Config\Resource\FileResource;

class Caching
{
    public function getCache()
    {
        $cachePath = __DIR__ . '/cache/appUserMatcher.php';

        // the second argument indicates whether or not you want to use debug mode
        $userMatcherCache = new ConfigCache($cachePath, true);

        if (!$userMatcherCache->isFresh()) {
            // fill this with an array of 'users.yaml' file paths
            $yamlUserFiles = 1;//1..1;

            $resources = [];

            foreach ($yamlUserFiles as $yamlUserFile) {
                // see the article "Loading resources" to
                // know where $delegatingLoader comes from
                $delegatingLoader->load($yamlUserFile);
                $resources[] = new FileResource($yamlUserFile);
            }

            // the code for the UserMatcher is generated elsewhere
            $code = 1;//...;

            $userMatcherCache->write($code, $resources);
        }

        // you may want to require the cached code:
        require $cachePath;
    }
}
