#!/bin/sh
set -xe

mysqladmin drop -f e
mysqladmin create e
mysql e < schema.sql
# PHP Fatal error:  Uncaught exception 'Doctrine\ORM\Mapping\MappingException' with message 'Table round_robin_user has no primary key. Doctrine does not support reverse engineering from tables that don't have a primary key.' in /home/glen/scm/eventum/doctrine2/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DatabaseDriver.php:288
#mysql -s -e 'drop table issue_association' e
mysql -s -e 'drop table reminder_action_list' e
mysql -s -e 'drop table round_robin_user' e
mysql -s -e 'drop table user_alias' e
mysql -s -e 'drop table version' e

rm -rf src/Eventum/Model/Entity/
php doctrine.entity.generator.php
