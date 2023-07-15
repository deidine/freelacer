<?php
class dbConnetion{
    public $conn ;
    private $hostname ="localhost";
    private $dbusername ="root";
    private $dbpassword = "";
    private $db = "futlead";
    
    // private $hostname = $host;
    // private $dbusername = $user;
    // private $dbpassword = $pswd;
    // private $db = $dbnm;
    
    function __construct() {
        $this->conn = new mysqli(
        $this->hostname,
        $this->dbusername,
        $this->dbpassword,
        $this->db
                );
        if(!$this->conn->connect_error)
        {
         $GLOBALS["con"]=$this->conn;    
        }
    else{
            echo "Not Success";
            $GLOBALS["conn"]= $this->conn;
        
        }
    }
    
    
}
