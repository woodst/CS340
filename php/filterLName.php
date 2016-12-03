<?php
//Turn on error reporting
ini_set('display_errors', 'On');
//Connects to the database
$mysqli = new mysqli("oniddb.cws.oregonstate.edu", <!-- INSERT REST OF STUFF HERE!!! -->);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<body>
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
if(!($stmt = $mysqli->prepare(<!-- INSERT QUERY HERE!!! -->))){
	echo "Prepare failed. error no. "  . $stmt->errno . ", " . $stmt->error;
}

if(!($stmt->bind_param("i",$_POST['Homeworld']))){
	echo "Bind failed. error no. "  . $stmt->errno . ", " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed. error no. "  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}
if(!$stmt->bind_result($firstName, $lastName)){
	echo "Bind failed. error no. "  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $name . "\n</td>\n<td>\n" . $lastName . "\n</td>\n</tr>";
}
$stmt->close();
?>
	</table>
</div>

</body>
</html>