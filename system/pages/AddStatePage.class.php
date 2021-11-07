<?php

require_once("./system/util/addStateDb.class.php");


class AddStatePage
{

     //funkcija koja dohvaca parametar iz URLa te ga proslijedjuje funkciji za izradu querya

    public function __construct()
    {

        if(isset($_GET['state'])){

            $state = $_GET['state'];

 
            addStateDb::addState($state);
            echo "Drzava dodana u tracker";
        }
       
    }
   
}

?>