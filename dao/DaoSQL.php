<?php

require_once('classes.php');
require_once('system.php');

class DaoSQL extends DaoUpdates {
    public function run($obj) {
        if (!empty($obj)) {
            $obj["id_global"] = $obj["id"];
            $obj["tabela"] = "sql_updates";

            actionLog("Running SQL Update...");

            if ($this->executeSQL($obj["command"])) {
                $this->saveUpdate($obj);
            }
        }
    }

    public function executeSQL($command) {
        if ($command != '') {
            $query = mysqli_query($this->openConn(), $command);
            actionLog("Running SQL Command...");
            actionLog($command);
            if (!$query) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
    
}