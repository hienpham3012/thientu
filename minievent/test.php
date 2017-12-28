<!DOCTYPE html>
<html>
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
        		
        		header('Location: result.html');
        	}     
    }
} else {
    echo "0 results";

}

$conn->close();
?> 

</body>
</html>