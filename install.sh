#!/bin/bash

###
# 1406216411s : tested on ubuntu trusty tahr
##

PACKAGE_LIST="
mysql-client
mysql-server
nginx
php5-fpm
php5-mysql
"

for pak in $PACKAGE_LIST ; do
  if ! dpkg -s $pak > /dev/null; then
      sudo apt-get install -y $pak
  fi
done


cd /tmp
rm -rf master.zip* enki-master*

wget https://github.com/enkinunki/enki/archive/master.zip
unzip master.zip

sudo mv enki-master/etc/nginx/sites-available/default /etc/nginx/sites-available/default
sudo rm -rf enki-master/etc/nginx/sites-available
sudo cp -rf enki-master/* /usr/share/nginx/html

sudo chmod 755 -R /usr/share/nginx/html

mysql -u root -p blog < /usr/share/nginx/html/db.sql