#!/bin/sh
set -xe

cat 54_scm_tables.sql |sed -e 's,eventum_,,'|mysql e
rm -rf src/Eventum/Model/Entity/
php doctrine.entity.generator.php
