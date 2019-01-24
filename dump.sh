#!/bin/sh
set -xeu

# prefer mysql 5.6 on brew enabled systems
PATH="/usr/local/opt/mysql@5.6/bin:$PATH"

exec mysqldump -d eventum > schema.sql
