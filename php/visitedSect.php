<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<header>
<style type="text/css">
th.borderme  { border: thick solid black; }
td.borderme  { border: thin solid black; }
</style>
</header>
<table>
	<h1>Visited Sections</h1>
	<table border=1>
	<tr>
	<th>Gallery</th>
	<th>Section</th>
	</tr>
<?php
ini_set('display_errors', 'On');
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","woodsth-db","jDJ3RibroohRXZkT","woodsth-db");
if($mysqli->connect_errno){
	echo "Connection Error no. " . $mysqli->connect_errno . ", " . $mysqli->connect_error;
	}
	
if(!($stmt = $mysqli->prepare("SELECT sectionName, galleryName FROM customer JOIN visitorLog ON customer.customerID = visitorLog.customerID JOIN section ON section.sectionID = visitorLog.sectionID JOIN gallery on section.galleryID = gallery.galleryID WHERE customer.customerID = ?"))){
	echo "Prepare failed. Error no. "  . $stmt->errno . ", " . $stmt->error;
}
if(!($stmt->bind_param("i",$_POST['visitedSections']))){
	echo "Bind failed. Error no. "  . $stmt->errno . ", " . $stmt->error;
}
if(!$stmt->execute()){
	echo "Execute failed. Error no. "  . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->bind_result($sectionName, $galleryName)){
	echo "Bind failed.  Error no."  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}

while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $galleryName . "\n</td>\n<td>\n" . $sectionName . "\n</td>\n</tr>";
}

$stmt->close();
?>

</table>
</html>