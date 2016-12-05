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
<header>
<style type="text/css">
th.borderme  { border: thick solid black; }
td.borderme  { border: thin solid black; }
</style>
</header>
<body>
<div>
	<h1>Customers</h1>
	<table border=1>

		<tr>
			<th>First Name</th>
			<th>Last Name</th>
		</tr>
<?php
if(!($stmt = $mysqli->prepare("SELECT customerFirstName, customerLastName FROM customer where customerLastName like ? order by customerFirstName"))){
	echo "Prepare failed. error no. "  . $stmt->errno . ", " . $stmt->error;
}

if(!($stmt->bind_param("s",$_POST['Customers']))){
	echo "Bind failed. error no. "  . $stmt->errno . ", " . $stmt->error;
}

if(!$stmt->execute()){
	echo "Execute failed. error no. "  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}
if(!$stmt->bind_result($firstName, $lastName)){
	echo "Bind failed. error no. "  . $mysqli->connect_errno . ", " . $mysqli->connect_error;
}
while($stmt->fetch()){
 echo "<tr>\n<td>\n" . $firstName . "\n</td>\n<td>\n" . $lastName . "\n</td>\n</tr>";
}
$stmt->close();
?>
	</table>
</div>

</body>
</html>