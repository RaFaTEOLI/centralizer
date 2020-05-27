<?php

/*
    -----------------------------------------------
    -----------------Centralizer-------------------
    ----------Program to look for updates----------
    -----------------------------------------------
    ------------Author: Rafael Tessarolo-----------
    ----------------Version: 0.01------------------

*/

include 'dao/DaoSQL.php';
include 'dao/DaoSSH.php';

$daoSQL = new DaoSQL();
$daoSSH = new DaoSSH();

// Método para buscar atualização SQL
$daoSQL->run($daoSQL->getUpdates("sql_updates", $daoSQL->getLastUpdate("sql_updates")));

// Método para buscar atualização SSH
$daoSSH->run($daoSSH->getUpdates("ssh_updates", $daoSSH->getLastUpdate("ssh_updates")));