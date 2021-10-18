<?php
class dbConfig {
    protected $serverName;
    protected $userName;
    protected $password;
    protected $dbName;
    function __construct() {
        $this -> serverName = 'localhost';
        $this -> userName = 'root';
        $this -> password = '';
        $this -> dbName = 'clinic_management';
    }
}
?>