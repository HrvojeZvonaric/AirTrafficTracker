<script>

      //timer za reload

      setTimeout(function(){

        window.location.reload(true);

      }, 10000);

</script>


<?php

require_once ("./system/util/fetchStatesDb.class.php");
require_once ("./system/util/fetchApi.php");


class DisplayFlightsMapPage
{

    //poziv na glavnu builder funkciju te slanje dobivenog requesta na api

    public function __construct()
    {

        $trackedCoords = $this->filterCoords();

        $request = $this->buildRequest($trackedCoords);

        echo $request;

   
       
    }

    //na temelju dobivenih podataka iz baze i apija gradimo niz pin elemenata za mapu

    public function filterCoords(){

        $trackedStates = $this->fetchTrackedStates();
        $trackedCoords= array();
        $resultFlight = $this->initFlightApi();

        $pinBase = "pin-s-l+000(";

        foreach($resultFlight['states'] as $state){


            foreach($trackedStates as $localstate){
                
               

                if($state[2] == $localstate){

                    $request = $pinBase. $state[5]. ",". $state[6]. "),";
                    array_push($trackedCoords, $request);
                  


                    
                   
                }
                    
            }
        }

        return $trackedCoords;

    }

    //na temelju niza pinova gradimo kompletni request za mapu sa svakom trenutnom pozicijom leta prikazanom kao jedan pin

    public function buildRequest($trackedCoords){

       

        $firstHalf = "<img src=https://api.mapbox.com/styles/v1/mapbox/light-v10/static/";
        $secondHalf = "/-87.0186,32.4055,0/1280x950?access_token=pk.eyJ1IjoiaHJ2b2plMSIsImEiOiJja3A4ODRlMW4wNmQyMnJvZ2k5a2s4ZnI1In0.qq98pmbA_oY25Hi3SEKbpA>";
    
  
        foreach($trackedCoords as $coords){

            
            $firstHalf = $firstHalf.$coords;

        }

        $filteredFirstHalf = substr($firstHalf, 0, -1);

        $fullRequest = $filteredFirstHalf.$secondHalf;

        

        return $fullRequest;
    }

    //spajanje na opensky api

    public function initFlightApi(){

        $api = new API();
        $api->url = "https://opensky-network.org/api/states/all";
        $result = $api->getFormatedData();

        return $result;


    }

    //spajanje na tracker i dohvat pracenih drzava
   
    public function fetchTrackedStates(){

        $trackedStates = array();
       
        $rows = fetchStatesDb::fetchStates();

        foreach($rows as $row){

           foreach($row as $item){

              array_push($trackedStates, $item);
              
           }
        }

        return $trackedStates;


    }
   
}

?>


