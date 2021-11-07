<?php

include ("./system/Exceptions/SystemException.class.php");


class RequestHandler {


    public function __construct ($className)
    {
        $className = $className.'Page';

        $classPath = "D:/XAMPP/htdocs/Zvonaric/Avioni/system/pages/".$className. ".class.php";
        

        try{

        if (!preg_match('/^[a-z0-9_]+$/i', $className) && !file_exists($classPath)) {

            throw new IllegalLinkException();
        }

        
       

        }

         catch(IllegalLinkException $e){

         }

       
         
        require_once($classPath);
       
     
        try{

        if(!class_exists ($className)) {

            throw new SystemException("Class '".$className."' not found");
        }

        new $className();

        }

        catch(SystemException $e){
            
        }



    }

    public static function handle () {

        if (!empty($_GET['page']) || !empty($_POST['page'])) {

            new RequestHandler((!empty($_GET['page']) ? $_GET['page'] : $_POST['page']));
        
        } else {
            
            new RequestHandler('Index');
        }
    }

}

?>