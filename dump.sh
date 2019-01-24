#!/bin/sh
set -xeu
exec mysqldump -d eventum > schema.sql
