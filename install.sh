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


sudo cp etc/nginx/sites-available/default /etc/nginx/sites-available/default
cd /tmp
wget https://github.com/enkinunki/enki/archive/master.zip
unzip master.zip
sudo cp -rf enki-master/* /usr/share/nginx/html
sudo chmod 755 -R /usr/share/nginx/html
