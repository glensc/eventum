<?php

// http://stackoverflow.com/a/13084958/2314626
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
