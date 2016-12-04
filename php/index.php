<?php
ini_set('display_errors', 'On');
$mysqli = new mysqli("oniddb.cws.oregonstate.edu","woodsth-db","jDJ3RibroohRXZkT","woodsth-db");
if($mysqli->connect_errno){
	echo "Connection Error no. " . $mysqli->connect_errno . ", " . $mysqli->connect_error;
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<style type="text/css">
th.borderme  { border: thick solid black; }
td.borderme  { border: thin solid black; }
</style>
</head>
<body>
<div>
	<h1>Galleries</h1>
	<table border=1>
		<tr>
			<th>Name</th>
		</tr>
<?php
if(!($stmt = $mysqli->prepare("SELECT galleryName FROM gallery"))){
	echo "Prepare failed. Error no. "  . $stmt->errno . ", " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed. Error no. "  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}
if(!$stmt->bind_result($name)){
	echo "Bind failed.  Error no."  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $name . "\n</td>\n</tr>";
}
$stmt->close();
?>
	</table>
</div>
<br>
<div>


	<h1>Sections</h1>
	<table border=1>
		<tr>
			<th>Gallery Name</th>
			<th>Section Name</th>
		</tr>
<?php

if(!($stmt = $mysqli->prepare("SELECT gallery.galleryName, section.sectionName FROM section INNER JOIN gallery ON section.galleryID=gallery.galleryID"))){
	echo "Prepare failed. Error no. "  . $stmt->errno . ", " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed. Error no. "  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}
if(!$stmt->bind_result($galName, $sectionName)){
	echo "Bind failed.  Error no."  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $galName . "\n</td>\n<td>\n" . $sectionName . "\n</td>\n</tr>";
}
$stmt->close();

?>
	</table>
</div>
<br>

<div>
	<h1>Artwork</h1>
	<table border=1>


	
		<tr>
			<th>Gallery</th>
			<th>Section Name</th>
			<th>Artwork Name</th>
			<th>Artist</th>
			<th>Year Painted</th>
			<th>Price</th>
		</tr>
<?php
if(!($stmt = $mysqli->prepare("SELECT gallery.galleryName, artwork.artworkTitle, artist.artistFirstName, artist.artistLastName, artwork.artworkYearCreated, section.sectionName, artwork.artworkPrice FROM artwork INNER JOIN section ON artwork.artworkSectionID=section.sectionID INNER JOIN gallery ON section.galleryID=gallery.galleryID INNER JOIN artist ON artwork.artworkArtistID = artist.artistID"))){
	echo "Prepare failed. Error no. "  . $stmt->errno . ", " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed. Error no. "  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}
if(!$stmt->bind_result($gallery,$title, $firstName, $lastName, $creationYear, $sectionName, $price)){
	echo "Bind failed.  Error no."  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $gallery . "\n</td>\n<td>\n" . $sectionName . "\n</td>\n<td>\n" . $title . "\n</td>\n<td>\n" . $firstName . " " . $lastName . "\n</td>\n<td>\n" . $creationYear . "\n</td>\n<td>\n" . $price . "\n</td>\n</tr>";
}
$stmt->close();
?>
	</table>
</div>
<br>

<div>
	<h1>Customers</h1>
	<table border=1>

		<tr>
			<th>First Name</th>
			<th>Last Name</th>
		</tr>
<?php
if(!($stmt = $mysqli->prepare("SELECT customerFirstName, customerLastName FROM customer"))){
	echo "Prepare failed. Error no. "  . $stmt->errno . ", " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed. Error no. "  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}
if(!$stmt->bind_result($custFName, $custLName)){
	echo "Bind failed.  Error no."  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $custFName . "\n</td>\n<td>\n" . $custLName . "\n</td>\n</tr>";
}

$stmt->close();
?>
	</table>
</div>
<br>

<div>
	<h1>Artists</h1>
	<table border=1>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Movement</th>
		</tr>
<?php
if(!($stmt = $mysqli->prepare("SELECT artistFirstName, artistLastName, artistMovement FROM artist"))){
	echo "Prepare failed. Error no. "  . $stmt->errno . ", " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed. Error no. "  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}
if(!$stmt->bind_result($firstName, $lastName, $movement)){
	echo "Bind failed.  Error no."  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $firstName . "\n</td>\n<td>\n" . $lastName . "\n</td>\n<td>\n" . $movement . "\n</td>\n</tr>";
}

$stmt->close();
?>
	</table>
</div>
<br>
<div>
	<h1>Sales</h1>
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
/*
if(!($stmt = $mysqli->prepare("SELECT c.customerFirstName, c.customerLastName, g.galleryName, se.sectionName, a.artworkTitle, ar.artistFirstName, ar.artistLastName, sa.saleDescription, sa.amount FROM customer AS c JOIN sales AS sa on c.customerID=sa.customerID JOIN artwork AS a on sa.artworkID=a.artworkID JOIN section AS se on sa.sectionID=se.sectionID JOIN gallery AS g on se.galleryID=g.galleryID JOIN artist AS ar on a.artworkArtistID=ar.artistID ORDER BY a.artworkTitle"))){
	echo "Prepare failed. Error no. "  . $stmt->errno . ", " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed. Error no. "  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}
if(!$stmt->bind_result($customerFirstName, $customerLastName, $galleryName, $sectionName, $artworkTitle, $artistFirstName, $artistLastName, $saleDescription, $amount)){
	echo "Bind failed.  Error no."  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $customerFirstName . "\n</td>\n<td>\n" . $customerLastName . "\n</td>\n<td>\n" . $galleryName . "\n</td>\n<td>\n" . $sectionName . "\n</td>\n<td>\n" . $artworkTitle . "\n</td>\n<td>\n" . $artistFirstName . "\n</td>\n<td>\n" . $artistLastName . "\n</td>\n<td>\n" . $saleDescription . "\n</td>\n<td>\n$" . $amount . "\n</td>\n</tr>";
}

$stmt->close();
*/
?>
	</table>
</div>
<br>

<div>
	<h1>Customer Count</h1>
	<table border=1>
		<tr>
			<td>Gallery</td>
			<td>Number of Customers</td>
		</tr>
<?php
/*
if(!($stmt = $mysqli->prepare("select
galleryName as 'gallery name',
count(distinct(c.customerID)) as 'customer count'

from gallery g
join sales s on g.galleryID = s.galleryID
join customer c on s.customerID = c.customerID"))){
	echo "Prepare failed. Error no. "  . $stmt->errno . ", " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed. Error no. "  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}
if(!$stmt->bind_result($galName, $count)){
	echo "Bind failed.  Error no."  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $galName . "\n</td>\n<td>\n" . $count . "\n</td>\n</tr>";
}

$stmt->close();
*/
?>
	</table>
</div>
<br><br><br>

<div>
	<form method="post" action="addGallery.php"> 

		<fieldset>
			<legend>Add Gallery</legend>
			<p>Gallery Name: <input type="text" name="galName" /></p>
			<p>City: <input type="text" name="galCity" /></p>
		</fieldset>
		<p><input type="submit" /></p>
	</form>
</div>



</body>
</html>