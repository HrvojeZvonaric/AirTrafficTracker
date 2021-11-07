<?php

require_once("./system/util/DeleteAllStateDb.class.php");


class DeleteAllPage
{

    

    public function __construct()
    {

            deleteAllStateDb::deleteAll();
            echo "Sve izbrisano!";
        
       
    }
   
}

?>