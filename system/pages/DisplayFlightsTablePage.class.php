<script>

      // timer za reload

      setTimeout(function(){

        window.location.reload(1);

      }, 30000);

</script>

<style>

    table{
        border-style: solid;
    }

    td{
        border-bottom: 1px solid;
        border-left:1px solid;
    }



</style>


<?php

require_once ("./system/util/fetchStatesDb.class.php");
require_once ("./system/util/fetchApi.php");


class DisplayFlightsTablePage
{

    //poziv na glavnog buildera

    public function __construct()
    {

        $this->buildTable();


    }

    //spajanje na opensky api

    public function initApi(){

        $api = new API();
        $api->url = "https://opensky-network.org/api/states/all";
        $result = $api->getFormatedData();

        return $result;


    }

    //dohvat drzava iz trackera

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

    //na temelju podataka iz apija i drzava iz trackera gradimo table koji prikazuje podatke svakog leta iz pracenih drzava

    public function buildTable(){

        $result = $this->initApi();
        $trackedStates = $this->fetchTrackedStates();

        echo "<table>";
        echo "<tr> <td>icao24</td> <td>callsign</td> <td>origin_country</td> <td>time_position</td> <td>last_contact</td> <td>longitude</td> <td>latitude</td> <td>baro_altitude</td> <td>on_ground</td> <td>velocity</td> <td>true_track</td> <td>vertical_rate</td> <td>sensors</td> <td>geo_altitude</td> <td>squawk</td> <td>spi</td> <td>position_source</td>";
        foreach($result['states'] as $state){


            foreach($trackedStates as $localstate){
                
               

                if($state[2] == $localstate){

                     echo "<tr>";


                    foreach($state as $value){

                            echo "<td>". $value. "</td>";
                        
                        
                    }
                    echo "</tr>";
                }
                    
            }
        }

    }
   
}

?>


