<?php
ini_set('display_errors', 'On');
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","woodsth-db","jDJ3RibroohRXZkT","woodsth-db");
if($mysqli->connect_errno){
	echo "Connection Error no. " . $mysqli->connect_errno . ", " . $mysqli->connect_error;
	}
	
if(!($stmt = $mysqli->prepare("DELETE from artwork where artworkID = ?"))){
	echo "Prepare failed. Error no. "  . $stmt->errno . ", " . $stmt->error;
}
if(!($stmt->bind_param("i",$_POST['delArtwork']))){
	echo "Bind failed. Error no. "  . $stmt->errno . ", " . $stmt->error;
}
if(!$stmt->execute()){
	echo "Execute failed. Error no. "  . $stmt->errno . " " . $stmt->error;
} else {
	echo "Deleted " . $stmt->affected_rows . " rows from artwork";
}
?>