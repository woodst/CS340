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
			<th>City</th>
		</tr>
<?php
if(!($stmt = $mysqli->prepare("SELECT galleryName, galleryCity FROM gallery"))){
	echo "Prepare failed. Error no. "  . $stmt->errno . ", " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed. Error no. "  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}
if(!$stmt->bind_result($name, $city)){
	echo "Bind failed.  Error no."  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $name . "\n</td>\n<td>\n" . $city . "\n</td>\n</tr>";
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
if(!($stmt = $mysqli->prepare("SELECT c.customerFirstName, c.customerLastName, g.galleryName, se.sectionName, a.artworkTitle, ar.artistFirstName, ar.artistLastName, sa.saleDescription, a.artworkPrice
FROM customer c JOIN sales sa on c.customerID = sa.customerID JOIN artwork a on sa.artworkID = a.artworkID JOIN section se on a.artWorkSectionID = se.sectionID JOIN gallery g on se.galleryID = g.galleryID JOIN artist ar on a.artworkArtistID = ar.artistID 
ORDER BY c.CustomerLastName"))){
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

if(!($stmt = $mysqli->prepare("SELECT g.galleryName, count(c.customerID) from gallery g 
JOIN section s ON s.galleryID = g.galleryID JOIN artwork a ON s.sectionID = a.artworkSectionID JOIN sales sa ON a.artworkID = sa.artworkID JOIN customer c ON sa.customerID = c.customerID
GROUP BY g.galleryName ORDER BY galleryName"))){
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
<br>
<div>
	<form method="post" action="addArtist.php"> 

		<fieldset>
			<legend>Add Artist</legend>
			<p>First Name: <input type="text" name="firstName" /></p>
			<p>Last Name: <input type="text" name="lastName" /></p>
			<p>Movement: <input type="text" name="movement" /></p>
		</fieldset>
		<p><input type="submit" /></p>
	</form>
</div>
<br>
<div>
	<form method="post" action="addCustomer.php"> 

		<fieldset>
			<legend>Add Customer</legend>
			<p>First Name: <input type="text" name="custFName" /></p>
			<p>Last Name: <input type="text" name="custLName" /></p>
		</fieldset>
		<p><input type="submit" /></p>
	</form>
</div>
<br>
<div>
	<form method="post" action="addSect.php"> 

		<fieldset>
			<legend>Add Section</legend>
			<p>Section Name: <input type="text" name="sectName" /></p>
		</fieldset>
						<fieldset>
			<legend>Gallery</legend>
			<select name="Gallery">
<?php
if(!($stmt = $mysqli->prepare("SELECT galleryID, galleryName FROM gallery"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($galleryID, $galName)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
	echo '<option value=" '. $galleryID . ' "> ' . $galName . '</option>\n';
}
$stmt->close();
?>
			</select>
		</fieldset>
		<p><input type="submit" /></p>
	</form>
</div>
<br>
<div>
	<form method="post" action="addArt.php"> 
		<legend>Add Artwork</legend>
		<fieldset>
			<legend>Artwork Info </legend>
			<p>Art Name: <input type="text" name="artName" /></p>
			<p>Year CreateD:<input type="number" name="yearCreated" /></p>
			<p>Price: $<input type="number" name="price" /></p>
		</fieldset>
		<fieldset>
		<legend>Section</legend>
			<select name="addSection">
			<?php

if(!($stmt = $mysqli->prepare("SELECT sectionID, sectionName, galleryName FROM section JOIN gallery on section.galleryID = gallery.galleryID"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($sectID, $sectName, $galName)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
	echo '<option value=" '. $sectID . ' "> Gallery:' . $galName . ' Section:' . $sectName . '</option>\n';
}
$stmt->close();

?>
			</select>
		</fieldset>
		<fieldset>
			<legend>Painted By</legend>
			<select name="Artist">
<?php

if(!($stmt = $mysqli->prepare("SELECT artistID, artistFirstName, artistLastName FROM artist"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($artistID, $firstName, $lastName)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
	echo '<option value=" '. $artistID . ' "> ' . $firstName . ' ' . $lastName . '</option>\n';
}
$stmt->close();

?>
			</select>
		</fieldset>
		<p><input type="submit" /></p>
	</form>
</div>
<br><br><br>
<div>
	<form method="post" action="visitSection.php"> 
	<legend>Visit a Section</legend>

		<fieldset>
			<legend>Customer</legend>
			<select name="Customers">
<?php
if(!($stmt = $mysqli->prepare("SELECT customerID, customerFirstName, customerLastName FROM customer"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($custID, $custFName, $custLName)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
	echo '<option value=" '. $custID . ' "> ' . $custFName . ' ' . $custLName . '</option>\n';
}
$stmt->close();

?>
			</select>
		</fieldset>
				<fieldset>
			<legend>Section</legend>
			<select name="Sections">
<?php

if(!($stmt = $mysqli->prepare("SELECT sectionID, sectionName, galleryName FROM section JOIN gallery on section.galleryID = gallery.galleryID"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($sectID, $sectName, $galName)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
	echo '<option value=" '. $sectID . ' "> Gallery:' . $galName . ' Section:' . $sectName . '</option>\n';
}
$stmt->close();

?>
			</select>
		</fieldset>
		<p><input type="submit" /></p>
	</form>
</div>
<br>
<div>
	<form method="post" action="purchaseArt.php"> 
	<legend>Purchase Artwork</legend>

		<fieldset>
			<legend>Customer</legend>
			<select name="Customers">
<?php

if(!($stmt = $mysqli->prepare("SELECT customerID, customerFirstName, customerLastName FROM customer"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($custID, $custFName, $custLName)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
	echo '<option value=" '. $custID . ' "> ' . $custFName . ' ' . $custLName . '</option>\n';
}
$stmt->close();
?>
			</select>
		</fieldset>
				<fieldset>
			<legend>Artwork</legend>
			<select name="Sections">
<?php
/*
if(!($stmt = $mysqli->prepare("SELECT artworkID, artworkTitle, artworkPrice, isSold FROM artwork"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($artID, $artName, $price, $isSold)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
	$available = $isSold ? 'Available' : 'Sold';
	echo '<option value=" '. $artID . ' "> $' . $price . ', ' . $artname . ' ' .$available . '</option>\n';
}
$stmt->close();
*/
?>
			</select>
		</fieldset>
		<p><input type="submit" /></p>
	</form>
</div>
<br>
<div>
	<form method="post" action="displayPurchaseList.php"> 
		<fieldset>
			<legend>Display List Of Purchases for Customer</legend>
				<select name=purchList>
<?php
if(!($stmt = $mysqli->prepare("SELECT customerID, customerFirstName, customerLastName FROM customer"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($custID, $firstName, $lastName)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
	echo '<option value=" '. $custID . ' "> ' . $firstName . ' ' . $lastName . '</option>\n';
}
$stmt->close();
?>
				</select>
		</fieldset>
		<p><input type="submit" /></p>
	</form>
</div>
<br>
<div>
	<form method="post" action="visitedSect.php"> 
		<fieldset>
			<legend>Display Sections Visited By Customer</legend>
				<select name=visitedSections>
<?php

if(!($stmt = $mysqli->prepare("SELECT customerID, customerFirstName, customerLastName FROM customer"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($custID, $firstName, $lastName)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
	echo '<option value=" '. $custID . ' "> ' . $firstName . ' ' . $lastName . '</option>\n';
}
$stmt->close();

?>
				</select>
		</fieldset>
		<p><input type="submit" /></p>
	</form>
</div>
</br>
<div>
	<form method="post" action="filterLName.php">
		<fieldset>
			<legend>Filter Customers By Last Name</legend>
				<select name="Customers">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT customerLastName FROM customer"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}

					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($lastName)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value="'. $lastName . '"> ' . $lastName . '</option>\n';
					}
					$stmt->close();
					?>
				</select>
		</fieldset>
		<input type="submit" value="Run Filter" />
	</form>
</div>



</body>
</html>