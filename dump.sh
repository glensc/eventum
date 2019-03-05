#!/bin/sh
set -xeu

# prefer mysql 5.6 on brew enabled systems
PATH="/usr/local/opt/mysql@5.6/bin:$PATH"

mysqldump -d ${1:-eventum} > schema.sql

sed -i -re 's# AUTO_INCREMENT=[0-9]+##' schema.sql

mysqladmin drop -f e || :
mysqladmin create e
mysql e < schema.sql
