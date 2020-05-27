<?php

require_once('system.php');

class DaoUpdates {

    private $id;
    private $command;
    private $description;
    private $created_at;

    private $server = "your_host";
    private $user = "your_user";
    private $password = "your_password";
    private $db = "";
    private $port = "3306";

    private $global_server = "your_host";
    private $global_user = "your_user";
    private $global_password = "your_password";
    private $global_db = "centralizer";
    private $global_port = "3306";

    protected function openConnGlobal() {
        return mysqli_connect($this->global_server, $this->global_user, $this->global_password, $this->global_db, $this->global_port);
    }

    protected function openConn() {
        return mysqli_connect($this->server, $this->user, $this->password, $this->db, $this->port);
    }

    public function getUpdates($tabela, $last) {
        $sql = "SELECT * FROM {$tabela}_global";
        $sql .= " WHERE created_at > '$last'";
        $query = mysqli_query($this->openConnGlobal(), $sql);

        return mysqli_fetch_assoc($query);
    }

    public function getLastUpdate($tabela) {
        $sql = "SELECT MAX(created_at) AS last FROM centralizer.$tabela";

        $query = mysqli_query($this->openConn(), $sql);

        $return = mysqli_fetch_assoc($query);
        return $return["last"];
    }

    public function saveUpdate($obj) {
        $id_global = $obj["id_global"];
        $command = $this->openConn()->real_escape_string($obj["command"]);
        $description = $obj["description"];
        $created_at = $obj["created_at"];
        $tabela = $obj["tabela"];

        $sql = "INSERT INTO centralizer.".$tabela." (id_global, command, description, created_at)";
        $sql .= " VALUES ($id_global, '$command', '$description', '$created_at')";

        actionLog("Saving Update...");
        actionLog($sql);

        $query = mysqli_query($this->openConn(), $sql);
        if ($query === TRUE) {
            actionLog("Update Saved!");
        } else {
            actionLog("There was an error while trying to save the update!");
        }
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getCommand() {
        return $this->command;
    }

    public function setCommand($command) {
        $this->command = $command;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }
}