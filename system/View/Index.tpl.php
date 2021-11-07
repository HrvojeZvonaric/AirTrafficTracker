<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<title>Page Title</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="">
<style>
</style>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
    $(document).ready(function(){
        setInterval(function() {
            <?php require_once ("./Core.functions.php"); $api1 = new API();
        $api1->url = "https://opensky-network.org/api/states/all"; echo "donezo"; ?>
	   
        }, 2000);
    });

</script>
<body>



<div class="root">

 <h1>Odaberite Drzavu</h1>

    <?php


    require_once ("./Core.functions.php");

    echo "tu san";

   

       
        echo '<script type="text/javascript">',
        'setInterval($api1->getFormatedData());',
        '</script>'
   ;
        
        

    
    $states = $data['states'];
    var_dump($states[0]);

       /* echo "<table id = 'tableIspis'>"; // start a table tag in the HTML
        echo "<tr> <td id = 'ghost'> </td></tr>";
        echo "<tr id = 'head'> <td > Id </td>  <td > Naziv </td> <td > Adresa </td> <td > Grad </td> <td > Zupanija </td> <td > Kapacitet </td> <td > Broj Soba </td> <td > Broj Gostiju </td> <td > Slobodno </td> </tr>";

        while($row = $result->fetch_array()){   //Creates a loop to loop through results
        echo "<tr id = 'red'><td>" . $row['id'] . "</td><td>" . $row['naziv'] . "</td><td>" . $row['adresa']. "</td><td>" . $row['grad'] . "</td><td>" . $row['zupanija'] . "</td><td>" . $row['kapacitet'] . '</td><td>' . $row['brojSoba'] . "</td><td>" . $row['brojGostiju'] . "</td><td>" . $row['slobodno'] . '</td>'




        ;  //$row['index'] the index here is a field name
        }

        echo "</table>"; //Close the table in HTML*/


    ?>
 
</div>

</body>
</html>