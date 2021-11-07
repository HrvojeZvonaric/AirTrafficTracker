<?php



// klasa koja komunicira s APIjem s funkcijama za output podataka

class API{

    private $url;
    private $response;

    // setter

    public function __set($property, $url){

        switch ($property){
            case('url'):
                $this->url = $url;
            }


    }

    // koristeci URL koji smo proslijedili ovoj klasi, iduca funkcija dohvaca sirovi i neformatirani odgovor APIja

    private function getAPIData(){
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $this->response = curl_exec($ch);

        return $this->response;
    }

    // formatiranje podataka u zeljeni oblik

    public function getFormatedData(){

        $formatedData = json_decode($this->getAPIData());
        return json_decode(json_encode($formatedData), true);
    }

    
   
}








?>
