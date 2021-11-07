<?php

include ("./system/Exceptions/DBException.class.php");

class MySQLiDatabase {

    public $MySQLi;

    protected $LinkID;
    protected $host;
    protected $user;
    protected $password;
    protected $db;
    protected $charset;
    protected $queryCount = 0;


    public function __construct($host,$user,$password,$database)
    {

       
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->db = $database;
       

        try{
            $this->MySQLi = new MySQLi($this->host, $this->user, $this->password, $this->db);
            
        }

        catch (DatabaseException $e){
            
            $e->show();
        }
}

   

    public function selectDatabase()
    {
        if ($this->MySQLi->select_db($this->database) === false) {
            throw new DatabaseException("Cannot use database ".$this->database, $this);
        }
    }

    public function sendQuery($query, $errorReporting = true)
    {
        
        $this->queryCount++;
        $this->result = $this->MySQLi->query($query);

        if ($this->result === false && $errorReporting === true) {

            throw new DatabaseException("Invalid SQL: " . $query);
        }

        return $this->result;
    }

    public function getErrorDesc(){

        if (! ($errorDesc = $this->MySQLi->error)){
            
            $errorDesc = $this->MySQLi->error;
        }

        return $errorDesc;
    }

}