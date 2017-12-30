<!DOCTYPE html>
<html lang="vi">
	<head>
		<title>Mini game Thiên Tú</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	  <script type="text/javascript" src="js/jquery.slotmachine.js"></script>
	  <script>
			$(document).ready(function(){
				$("#textMachine").slotMachine({
					active	: 1,
					delay	: 450,
					auto	: 1500
				});

			});
		</script>
	
	</head>
<body>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mini_game";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
  header("refresh: 17;");
    $sql = "SELECT id, name, value FROM start";
    $result = $conn->query($sql);


        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<br> id: ". $row["id"]. " - Name: ". $row["name"]. " value" . $row["value"] . "<br>";
                $_REQUEST = array('value' =>  $row["value"]);

                	if($row["value"] =="1") {
                		<script>
							$("#btn").click();
                		</script>
                		//header('Location: result.html #header');
                	}     
    
                    return $row; 
            }
        } else {
            echo "0 results";

        }
  
$conn->close();
?> 
<section>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-xs-12 col-sm-12">
				<div class="col-md-2 col-sm-2 col-xs-12">
					<div id="slotMachineButton1" class="slotMachineButton"><p>START</p></div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row result">
			<div class="col-md-4 col-sm-4 col-xs-4">
				<ul id="machine1" class="slotMachine">
				    <li class="slot parent"><p class="slot0">0</p></li>
					<li class="slot  parent" ><p class="slot1">1</p></li>
					<li class="slot  parent"><p class="slot2">2</p></li>
					<li class="slot  parent"><p class="slot3">3</p></li>
					<li class="slot  parent"><p class="slot4">4</p></li>
					<li class="slot  parent"><p class="slot5">5</p></li>
					<li class="slot  parent"><p class="slot6">6</p></li>
					<li class="slot  parent"><p class="slot7">7</p></li>
					<li class="slot  parent"><p class="slot8">8</p></li>
					<li class="slot  parent"><p class="slot9">9</p></li>
				</ul>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-4">
				<ul id="machine2" class="slotMachine">
				    <li class="slot parent"><p class="slot0">0</p></li>
					<li class="slot parent" ><p class="slot1">1</p></li>
					<li class="slot parent"><p class="slot2">2</p></li>
					<li class="slot parent"><p class="slot3">3</p></li>
					<li class="slot parent"><p class="slot4">4</p></li>
					<li class="slot parent"><p class="slot5">5</p></li>
					<li class="slot parent"><p class="slot6">6</p></li>
					<li class="slot parent"><p class="slot7">7</p></li>
					<li class="slot parent"><p class="slot8">8</p></li>
					<li class="slot parent"><p class="slot9">9</p></li>
				</ul>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-4">
				<ul id="machine3" class="slotMachine">
				    <li class="slot parent"><p class="slot0">0</p></li>
					<li class="slot parent" ><p class="slot1">1</p></li>
					<li class="slot parent"><p class="slot2">2</p></li>
					<li class="slot parent"><p class="slot3">3</p></li>
					<li class="slot parent"><p class="slot4">4</p></li>
					<li class="slot parent"><p class="slot5">5</p></li>
					<li class="slot parent"><p class="slot6">6</p></li>
					<li class="slot parent"><p class="slot7">7</p></li>
					<li class="slot parent"><p class="slot8">8</p></li>
					<li class="slot parent"><p class="slot9">9</p></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-xs-12 col-sm-12 midd-div">
				
				<div class="col-md-4 col-sm-4 col-xs-12 "><h2 class="title">Lucky Number: </h2></div>
				<div class="col-md-8 col-sm-8 col-xs-12 show-result">
					<h2><span id="machineResult"></span></h2>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
		$(document).ready(function(){
			var machine1 = $("#machine1").slotMachine({
				active	: 0,
				delay	: 1000
			});
			
			var machine2 = $("#machine2").slotMachine({
				active	: 1,
				delay	: 1000
			});
			
			var machine3 = $("#machine3").slotMachine({
				active	: 2,
				delay	: 1000
			});
			var str = "  "; 
			
			function onComplete(active){
				switch(this.element[0].id){
					case 'machine1':						
						$("#machine1Result").text("First Number: "+this.active);	
						str = str + this.active ; 
						$("#machineResult").text(str);
						break;
					case 'machine2':
						$("#machine2Result").text("Second Number: "+this.active);
						str = str + this.active ; 
						$("#machineResult").text(str);
						break;
					case 'machine3':
						$("#machine3Result").text("Third Number: "+this.active);
						str = str + this.active + "/ "; 
						$("#machineResult").text(str);
						break;

					$("#machineResult").text(str);
				}
			}
			
			$("#slotMachineButton1").click(function(){
				
				$("#machineResult").text(" ");
				machine1.shuffle(5, onComplete);
				
				setTimeout(function(){
					machine2.shuffle(5, onComplete);
				}, 500);
				
				setTimeout(function(){
					machine3.shuffle(5, onComplete);
				}, 1000);
				
                event.preventDefault();
			})
		});
	</script>
</body>
</html>
