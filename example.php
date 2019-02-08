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

function getDbConfig()
{
    //An example configuration
    return [
         'driver' => 'pdo_mysql',
         'user' => 'mysql',
         'password' => '',
         'dbname' => 'eventum',
         'host' => 'localhost',
         'charset' => 'utf8',
               'driverOptions' => [
                  1002 => 'SET NAMES utf8',
               ],
      ];
}

   function bootstrapDoctrine()
   {
       require_once $this->_libDir . DS . 'Doctrine/ORM/Tools/Setup.php';
       Doctrine\ORM\Tools\Setup::registerAutoloadDirectory('/full/path/to/lib');//So that Doctrine is in /full/path/to/lib/Doctrine
   }

   function getEntityFolders()
   {
       //An example configuration of two entity folders
       return [
         '/full/path/to/App/Module1/Entities/yml' => '\\App\\Module1\\Entities',
         '/full/path/to/App/Module2/Entities/yml' => '\\App\\Module2\\Entities',
      ];
   }

   function setupDoctrine()
   {
       $config = Doctrine\ORM\Tools\Setup::createConfiguration();
       $driver = new \Doctrine\ORM\Mapping\Driver\SimplifiedYamlDriver(getEntityFolders());
       $driver->setGlobalBasename('schema');
       $config->setMetadataDriverImpl($driver);

       $entityManager = \Doctrine\ORM\EntityManager::create($dbConfig, $config);

       return $entityManager;
   }

   function getEntitiesMetaData($em)
   {
       $cmf = new Doctrine\ORM\Tools\DisconnectedClassMetadataFactory();
       $cmf->setEntityManager($em);  // we must set the EntityManager

       $driver = $em->getConfiguration()->getMetadataDriverImpl();

       $classes = $driver->getAllClassNames();
       $metadata = [];
       foreach ($classes as $class) {
           //any unsupported table/schema could be handled here to exclude some classes
           if (true) {
               $metadata[] = $cmf->getMetadataFor($class);
           }
       }

       return $metadata;
   }

   function generateEntities($rootDir, $metadata)
   {
       $generator = new Doctrine\ORM\Tools\EntityGenerator();
       $generator->setUpdateEntityIfExists(true);    // only update if class already exists
       //$generator->setRegenerateEntityIfExists(true);  // this will overwrite the existing classes
       $generator->setGenerateStubMethods(true);
       $generator->setGenerateAnnotations(true);
       $generator->generate($metadata, $rootDir);
   }

   function generateDatabase()
   {
       $schema = new Doctrine\ORM\Tools\SchemaTool($em);
       $schema->createSchema($metadata);
   }

   //Sets up the Doctrine classes autoloader
   bootstrapDoctrine();
   //Sets up database connection, schema files (yml) and returns the EntityManager
   $em = setupDoctrine();
   //Returns the metadata specified by the two schema.orm.yml files
   $metadata = getEntitiesMetaData($em);
   /* Generates the classes based on the yml schema. Using the yml files in the example
    * the result will be the following files:
    *    /full/path/to/App/Module1/Entities/User.php
    *    /full/path/to/App/Module2/Entities/Comment.php
    *    /full/path/to/App/Module2/Entities/Page.php
    */
   generateEntities('/full/path/to', $metadata);
   //Now generate database tables:
   generateDatabase($metadata);
