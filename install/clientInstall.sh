#!/bin/bash

echo "CREATE DATABASE IF NOT EXISTS centralizer;" |  mysql -uroot -p
mysql -uroot -p centralizer < /etc/centralizer/sql/clientScript.sql

(crontab -l; echo "00 00 * * * /etc/centralizer/index.php") | crontab -