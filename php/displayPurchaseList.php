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
	<h1>Purchases</h1>
	<table border=1>
		<tr>
			<th>Customer First Name</th>
			<th>Customer Last Name</th>
			<th>Gallery</th>
			<th>Section</th>
			<th>Title of Artwork</th>
			<th>Artist First Name</th>
			<th>Artist Last Name</th>
			<th>Description of Sale</th>
			<th>Price</th>
		</tr>
<?php
ini_set('display_errors', 'On');
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","woodsth-db","jDJ3RibroohRXZkT","woodsth-db");
if($mysqli->connect_errno){
	echo "Connection Error no. " . $mysqli->connect_errno . ", " . $mysqli->connect_error;
	}
	
if(!($stmt = $mysqli->prepare("SELECT c.customerFirstName, c.customerLastName, g.galleryName, se.sectionName, a.artworkTitle, ar.artistFirstName, ar.artistLastName, sa.saleDescription, a.artworkPrice
FROM customer c JOIN sales sa on c.customerID = sa.customerID JOIN artwork a on sa.artworkID = a.artworkID JOIN section se on a.artWorkSectionID = se.sectionID JOIN gallery g on se.galleryID = g.galleryID JOIN artist ar on a.artworkArtistID = ar.artistID 
WHERE c.customerID = ?"))){
	echo "Prepare failed. Error no. "  . $stmt->errno . ", " . $stmt->error;
}
if(!($stmt->bind_param("i",$_POST['purchList']))){
	echo "Bind failed. Error no. "  . $stmt->errno . ", " . $stmt->error;
}
if(!$stmt->execute()){
	echo "Execute failed. Error no. "  . $stmt->errno . " " . $stmt->error;
}
if(!$stmt->bind_result($customerFirstName, $customerLastName, $galleryName, $sectionName, $artworkTitle, $artistFirstName, $artistLastName, $saleDescription, $amount)){
	echo "Bind failed.  Error no."  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}

while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $customerFirstName . "\n</td>\n<td>\n" . $customerLastName . "\n</td>\n<td>\n" . $galleryName . "\n</td>\n<td>\n" . $sectionName . "\n</td>\n<td>\n" . $artworkTitle . "\n</td>\n<td>\n" . $artistFirstName . "\n</td>\n<td>\n" . $artistLastName . "\n</td>\n<td>\n" . $saleDescription . "\n</td>\n<td>\n$" . $amount . "\n</td>\n</tr>";
}

$stmt->close();
?>

</table>
</html>