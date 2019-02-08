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

require 'bootstrap.php';

$em = $entityManager;
$driver = new \Doctrine\ORM\Mapping\Driver\DatabaseDriver($em->getConnection()->getSchemaManager());
$driver->setNamespace('Eventum\\Model\\Entities\\');
//$em->getConfiguration()->setMetadataDriverImpl($driver);

// http://stackoverflow.com/a/13417494/2314626
$cmf = new Doctrine\ORM\Tools\DisconnectedClassMetadataFactory();
$cmf->setEntityManager($entityManager); // $em is EntityManager instance
$metadata = $cmf->getAllMetadata();
$generator = new \Doctrine\ORM\Tools\EntityGenerator();
$generator->setGenerateAnnotations(true);
$generator->setGenerateStubMethods(true);
$generator->setRegenerateEntityIfExists(true);
$generator->setUpdateEntityIfExists(false);
$generator->generate($metadata, 'entities');
