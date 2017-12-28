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

	   $sql = "UPDATE start SET value=0 WHERE id=1";
    $result = $conn->query($sql);

	/*$conn->close(); */
?> 
