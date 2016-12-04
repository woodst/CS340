<?php
ini_set('display_errors', 'On');
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", <!--- INSERT OTHER PARTS HERE!!! -->);
if($mysqli->connect_errno){
	echo "Connection Error no. " . $mysqli->connect_errno . ", " . $mysqli->connect_error;
	}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<body>
<div>
	<table>
		<tr>
			<td>Galleries</td>
		</tr>
		<tr>
			<td>Name</td>
			<td>Total Sales</td>
		</tr>
<?php
if(!($stmt = $mysqli->prepare(<!--INSERT QUERY HERE!!!!!! -->))){
	echo "Prepare failed. Error no. "  . $stmt->errno . ", " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed. Error no. "  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}
if(!$stmt->bind_result($name, $totalSales)){
	echo "Bind failed.  Error no."  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $name . "\n</td>\n<td>\n" . $totalSales . "\n</td>\n</tr>";
}
$stmt->close();
?>
	</table>
</div>


<div>
	<table>
		<tr>
			<td>Sections</td>
		</tr>
		<tr>
			<td>Gallery Name</td>
			<td>Section Name</td>
		</tr>
<?php
if(!($stmt = $mysqli->prepare(<!--INSERT QUERY HERE!!!!!! -->))){
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


<div>
	<table>
		<tr>
			<td>Artwork</td>
		</tr>
		<tr>
			<td>Gallery</td>
			<td>Artwork Name</td>
			<td>Artist</td>
			<td>Price</td>
		</tr>
<?php
if(!($stmt = $mysqli->prepare(<!--INSERT QUERY HERE!!!!!! -->))){
	echo "Prepare failed. Error no. "  . $stmt->errno . ", " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed. Error no. "  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}
if(!$stmt->bind_result($galName,$artName, $artistName, $price)){
	echo "Bind failed.  Error no."  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $galName . "\n</td>\n<td>\n". $artName . "\n</td>\n<td>\n". $artistName . "\n</td>\n<td>\n" . $price . "\n</td>\n</tr>";
}
$stmt->close();
?>
	</table>
</div>


<div>
	<table>
		<tr>
			<td>Customers</td>
		</tr>
		<tr>
			<td>First Name</td>
			<td>Last Name</td>
		</tr>
<?php
if(!($stmt = $mysqli->prepare(<!--INSERT QUERY HERE!!!!!! -->))){
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

<div>
	<table>
		<tr>
			<td>Artists</td>
		</tr>
		<tr>
			<td>First Name</td>
			<td>Last Name</td>
		</tr>
<?php
if(!($stmt = $mysqli->prepare(<!--INSERT QUERY HERE!!!!!! -->))){
	echo "Prepare failed. Error no. "  . $stmt->errno . ", " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed. Error no. "  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}
if(!$stmt->bind_result($firstName, $lastName)){
	echo "Bind failed.  Error no."  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $firstName . "\n</td>\n<td>\n" . $lastName . "\n</td>\n</tr>";
}

$stmt->close();
?>
	</table>
</div>

<div>
	<table>
		<tr>
			<td>Sales</td>
		</tr>
		<tr>
			<td>Customer First Name</td>
			<td>Customer Last Name</td>
			<td>Gallery</td>
			<td>Section</td>
			<td>Title of Artwork</td>
			<td>Artist First Name</td>
			<td>Artist Last Name</td>
			<td>Description of Sale</td>
			<td>Price</td>
		</tr>
<?php
if(!($stmt = $mysqli->prepare(SELECT c.customerFirstName, c.customerLastName, g.galleryName, se.sectionName, a.artworkTitle, ar.artistFirstName, ar.artistLastName, sa.saleDescription, sa.amount
FROM CS340.customer c JOIN CS340.sales sa on c.customerID = sa.customerID JOIN CS340.artwork a on sa.artworkID = a.artworkID JOIN CS340.section se on sa.sectionID = se.sectionID JOIN CS340.gallery g on se.galleryID = g.galleryID JOIN CS340.artist ar on a.artworkArtistID = ar.artistID 
ORDER BY a.artworkTitle))){
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

<div>
	<table>
		<tr>
			<td>Customer Count</td>
		</tr>
		<tr>
			<td>Gallery</td>
			<td>Number of Customers</td>
		</tr>
<?php
if(!($stmt = $mysqli->prepare("select galleryName as 'gallery name', count(distinct(c.customerID)) as 'customer count'")){
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

<div>
	<form method="post" action="addArt.php"> 
		<legend>Add Artwork</legend>
		<fieldset>
			<legend>Artwork Info </legend>
			<p>Art Name: <input type="text" name="artName" /></p>
			<p>Price: $<input type="number" name="price" /></p>
		</fieldset>

		<fieldset>
			<legend>Painted By</legend>
			<select name="Artist">
<?php
if(!($stmt = $mysqli->prepare("SELECT galID, galName FROM Gallery"))){
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

<div>
	<form method="post" action="addSect.php"> 
		<legend>Add Section</legend>
		<fieldset>
			<legend>Section </legend>
			<p>Section Name: <input type="text" name="sectName" /></p>
		</fieldset>

		<fieldset>
			<legend>Gallery</legend>
			<select name="Gallery">
<?php
if(!($stmt = $mysqli->prepare("SELECT galleryID, galleryName from gallery order by galleryName"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($galID, $galName)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
	echo '<option value=" '. $galID . ' "> ' . $galName . '</option>\n';
}
$stmt->close();
?>
			</select>
		</fieldset>
		<p><input type="submit" /></p>
	</form>
</div>

<div>
	<form method="post" action="visitSection.php"> 
	<legend>Visit a Section</legend>

		<fieldset>
			<legend>Customer</legend>
			<select name="Customers">
<?php
if(!($stmt = $mysqli->prepare("SELECT custID, custFName, custLName FROM Customers"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($custID, $custFName, $custLName)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
	echo '<option value=" '. $custID . ' "> ' . $custFName . ' ' . $custLName '</option>\n';
}
$stmt->close();
?>
			</select>
		</fieldset>
				<fieldset>
			<legend>Section</legend>
			<select name="Sections">
<?php
if(!($stmt = $mysqli->prepare("SELECT sectID, sectName, galName FROM Section" <!-- INSERT REST OF QUERY HERE!! -->))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($sectID, $sectName, $galName)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
	echo '<option value=" '. $sectID . ' "> ' . $galName . ', ' . $sectName '</option>\n';
}
$stmt->close();
?>
			</select>
		</fieldset>
		<p><input type="submit" /></p>
	</form>
</div>

<div>
	<form method="post" action="purchaseArt.php"> 
	<legend>Purchase Artwork</legend>

		<fieldset>
			<legend>Customer</legend>
			<select name="Customers">
<?php
if(!($stmt = $mysqli->prepare("SELECT custID, custFName, custLName FROM Customers"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($custID, $custFName, $custLName)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
	echo '<option value=" '. $custID . ' "> ' . $custFName . ' ' . $custLName '</option>\n';
}
$stmt->close();
?>
			</select>
		</fieldset>
				<fieldset>
			<legend>Artwork</legend>
			<select name="Sections">
<?php
if(!($stmt = $mysqli->prepare("SELECT artID, artName, price, isSold FROM Artwork" <!-- INSERT REST OF QUERY HERE!! -->))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($artID, $artName, $price, $isSold)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
	echo '<option value=" '. $artID . ' "> $' . $price . ', ' . $artname . ' ';
	$available = $isSold ? 'Available' : 'Sold';
	echo	$available . '</option>\n';
}
$stmt->close();
?>
			</select>
		</fieldset>
		<p><input type="submit" /></p>
	</form>
</div>



<div>
	<form method="post" action="displayPurchaseList.php"> 
		<fieldset>
			<legend>Display List Of Purchases for Customer</legend>
				<select>
<?php
if(!($stmt = $mysqli->prepare("SELECT custID, firstName, lastName FROM Customers"))){
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

<div>
	<form method="post" action="visitedSects.php"> 
		<fieldset>
			<legend>Display Sections Visited By Customer</legend>
				<select>
<?php
if(!($stmt = $mysqli->prepare("SELECT custID, firstName, lastName FROM Customers"))){
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

<div>
	<form method="post" action="visitedCustomers.php"> 
		<fieldset>
			<legend>Display Customer Sign In List By Section</legend>
				<select>
<?php
if(!($stmt = $mysqli->prepare("SELECT galName, sectionName FROM Section" <!-- INSERT JOIN WITH GALLERY HERE!!!! -->))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($galName, $sectionName)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
	echo '<option value=" '. $galName . ' "> ' . $sectionName . '</option>\n';
}
$stmt->close();
?>
				</select>
		</fieldset>
		<p><input type="submit" /></p>
	</form>
</div>


<div>
	<form method="post" action="filterLName.php">
		<fieldset>
			<legend>Filter By Last Name</legend>
				<select name="Customers">
					<?php
					if(!($stmt = $mysqli->prepare("SELECT lastName FROM Customers"))){
						echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
					}

					if(!$stmt->execute()){
						echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					if(!$stmt->bind_result($custID, $lastName)){
						echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					while($stmt->fetch()){
					 echo '<option value=" '. $custID . ' "> ' . $lastName . '</option>\n';
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