<?php
ini_set('display_errors', 'On');
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","woodsth-db","jDJ3RibroohRXZkT","woodsth-db");
if($mysqli->connect_errno){
	echo "Connection Error no. " . $mysqli->connect_errno . ", " . $mysqli->connect_error;
	}
	
if(!($stmt = $mysqli->prepare("INSERT INTO artist (artistFirstName, artistLastName, artistMovement) VALUES (?,?,?)"))){
	echo "Prepare failed. Error no. "  . $stmt->errno . ", " . $stmt->error;
}
if(!($stmt->bind_param("sss",$_POST['firstName'],$_POST['lastName'],$_POST['movement']))){
	echo "Bind failed. Error no. "  . $stmt->errno . ", " . $stmt->error;
}
if(!$stmt->execute()){
	echo "Execute failed. Error no. "  . $stmt->errno . " " . $stmt->error;
} else {
	echo "Added " . $stmt->affected_rows . " rows to artist";
}
?>