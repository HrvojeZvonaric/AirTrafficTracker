<?php

require ("Core.functions.php");




class AppCore 
{
    public static $dbObj;

    public function __construct () 
    {
        $this->initDB();

        $this->initOptions();

        $this->autoload();

        RequestHandler::handle();
    }

    public function handleException (SystemException $e)
    {
        $e->show();
    }

    //spajanje na bazu podataka

    public function initDB ()
    {
        require ("Config.inc.php");

        require ("Model/MySQLiDatabase.class.php");

        self::$dbObj = new MySQLiDatabase($host, $user, $pass, $database); 
        

    }

    public function initOptions () {

        include ("options.inc.php");
       
        
    }
    public static final function getDB ()
    {
        return self::$dbObj;
    }

    
    public function autoload () {

        foreach (glob("system/util/*.php") as $filename){

            

                require_once $filename;

        }
    }
}



?>

