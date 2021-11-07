<?php

require_once("./system/util/deleteStateDb.class.php");


class DeleteStatePage
{

    //funkcija koja dohvaca parametar iz URLa te ga proslijedjuje funkciji za izradu querya

    public function __construct()
    {

        if(isset($_GET['state'])){

            $state = $_GET['state'];

            deleteStateDb::deleteState($state);
            echo "Drzava izbrisana iz trackera";
        }
       
    }
   
}

?>