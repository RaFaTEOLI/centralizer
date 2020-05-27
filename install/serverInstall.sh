#!/bin/bash

echo "CREATE DATABASE IF NOT EXISTS centralizer;" |  mysql -uroot -p
mysql -uroot -p centralizer < /etc/centralizer/sql/serverScript.sql