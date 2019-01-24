#!/bin/sh
set -xeu

# PHP Fatal error:  Uncaught exception 'Doctrine\ORM\Mapping\MappingException' with message 'Table round_robin_user has no primary key. Doctrine does not support reverse engineering from tables that don't have a primary key.' in /home/glen/scm/eventum/doctrine2/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DatabaseDriver.php:288
#mysql -s -e 'drop table if exists issue_association' e
mysql -s -e 'drop table if exists reminder_action_list' e
mysql -s -e 'drop table if exists round_robin_user' e
mysql -s -e 'drop table if exists user_alias' e
mysql -s -e 'drop table if exists version' e

rm -rf src/Eventum/Model/Entity
php doctrine.entity.generator.php
