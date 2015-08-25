<?php 
class connection {
    private $server='localhost';
    // private $user='root';
    private $user='u886684279_pf';
    private $pasw='proyectofinal';
    //private $bbdd='simplecrm';
    private $bbdd='u886684279_pf';
    private $conn;
    public $res;
    
    function __construct() {
        $this->connect();
    }
    
    private function connect() {
        try {
            $this->conn=mysql_connect($this->server,  $this->user, $this->pasw);
            mysql_select_db($this->bbdd,  $this->conn);
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function query ($q) {
        try {
            $this->res=mysql_query($q,  $this->conn);
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function getNumRows () {
        return mysql_num_rows($this->res);
    }
    
    public function getResult () {
        try {
            if($row = mysql_fetch_array($this->res))
                return $row;
            else
                return false;
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function next($row) {
        $row = mysql_fetch_array($this->res);
    }


    public function getResultByTag ($tag) {
        try {
            if($row = mysql_fetch_array($this->res))
                return $row[$tag];
            else
                return false;
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    
    public function close() {
        $this->conn=null;
    }
}
?>