<?php

require_once('classes.php');
require_once('system.php');

class DaoSSH extends DaoUpdates {
    
    public function run($obj) {
        if (!empty($obj)) {
            $obj["id_global"] = $obj["id"];
            $obj["tabela"] = "ssh_updates";

            actionLog("Running SSH Update...");

            if ($this->executeSSH($obj["command"])) {
                $this->saveUpdate($obj);
            }
        }
    }

    public function executeSSH($command) {
        if ($command != '') {
            actionLog("Running SSH Command...");
            actionLog($command);
            return shell_exec($command);
        } else {
            return false;
        }
    }
    
}