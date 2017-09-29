<html>
<head>
<form method="post" action='intro.php?suchen=true'>
		

		<div class="input-group">
			<label>Flugnummer</label>
			<input type="text" name="flightnr" >
		</div>

		<div class="input-group">
			<button type="submit" class="btn" name="suchen">Suchen</button>
		</div>
		
	</form>
</head>
<body>
	<div class="header">
		<h2>Fluginfo</h2>
	</div>

		</div>
	</form>
</body>
</html>
<?php

function flnr(){
$flightnr='';
require_once("connect.php");

if(isset($_POST["delete"])){
	$querydel = "Delete FROM passengers WHERE id= ".$POST["id"]; 
	$connect->query($querydel);
}

	
	if(isset($_POST['flightnr'])){
		$flightnr= $_POST['flightnr'];
	}
	
	$flugdaten ="SELECT * FROM flights where flightnr = ". $flightnr ; 
	$passdata ="SELECT * FROM passengers where flightnr = ". $flightnr ." Order by rownr ASC , seatposition ASC";
	
	
	
	$result = $connect->query($flugdaten);
	
	if ($result->rowCount() > 0) {
    // output data of each row
	
    while($row = $result->fetchObject()) {
        echo "Flugnummer: " . $row->flightnr . "<br> Abflugort: " . $row->departure_airport . "<br> Abflugzeit: " . $row->departure_time . "<br> Airline: " . $row->airline ."<br>". " Ankunftsflughafen: " . $row->destination_airport
		." Ankunftszeit: " . $row->destination_time ."<br>";
    }
} else {
    echo "0 results";
}

    $result2 = $connect->query($passdata);
	
	if ($result2->rowCount() > 0) {
    // output data of each row
    while($row2 = $result2->fetchObject()) {
        echo "<br><table>"."<tr>". "<th style='text-align:left;'><form method='POST'>"."Lastname:  " . $row2->lastname ." <br> First name:  ". $row2->firstname. 
		" <br> Row:  ". $row2->rownr . " <br> Seat:  " . $row2->seatposition ."</td>"."<br><input type='show' value='echo  $row2->id; ' name='id'><button type='submit' name='delete' value='delete'>Delete</form></tr>"."</table>"."<br>";
		
	}
	
} else {
    echo "0 results";
}
	
//$connect->close();
	
}
  if (isset($_GET['suchen'])) {
    flnr();
  }
	
?>

