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
	<form method="post" action="addGallery.php"> 

		<fieldset>
			<legend>Name</legend>
		</fieldset>

		<p><input type="submit" /></p>
	</form>
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
if(!$stmt->bind_result($firstName, $lastName, $purchaseListNum)){
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
	<form method="post" action="displayPurchaseList.php"> 
		<fieldset>
			<legend>Display List Of Purchases</legend>
				<select>
<?php
if(!($stmt = $mysqli->prepare("SELECT custID, firstName, lastName FROM Customers"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($id, $pname)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
	echo '<option value=" '. $custID . ' "> ' . $firstName . ' ' . $lastName . '</option>\n';
}
$stmt->close();
?>
				</select>
		</fieldset>
	</form>
</div>

<div>
	<form method="post" action="visitedFloors.php"> 
		<fieldset>
			<legend>Display Floors Visited By Customer</legend>
				<select>
<?php
if(!($stmt = $mysqli->prepare("SELECT custID, firstName, lastName FROM Customers"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($id, $pname)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
	echo '<option value=" '. $custID . ' "> ' . $firstName . ' ' . $lastName . '</option>\n';
}
$stmt->close();
?>
				</select>
		</fieldset>
	</form>
</div>

<div>
	<form method="post" action="visitedCustomers.php"> 
		<fieldset>
			<legend>Display Customer Sign In List By Floor</legend>
				<select>
<?php
if(!($stmt = $mysqli->prepare("SELECT floorID, floorName FROM Floor"))){
	echo "Prepare failed: "  . $stmt->errno . " " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
if(!$stmt->bind_result($id, $pname)){
	echo "Bind failed: "  . $mysqli->connect_errno . " " . $mysqli->connect_error;
}
while($stmt->fetch()){
	echo '<option value=" '. $floorID . ' "> ' . $floorName . '</option>\n';
}
$stmt->close();
?>
				</select>
		</fieldset>
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