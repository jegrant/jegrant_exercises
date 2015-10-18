<!DOCTYPE HTML> 
<!-- Jed Grant 10/17/15 -->
<html>
<head>
</head>
<body> 

<?php
session_start();

if(!isset($_SESSION['index'])){
	$_SESSION['index'] = 0;
}

if(!isset($_SESSION['storing_array'])){
	$_SESSION['storing_array'] = array();
}

function clean($input) {
	$input = trim($input);
	$input = stripslashes($input);
	$input = htmlspecialchars($input);
	return $input;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if(isset($_POST['submit_val'])){
		$_SESSION['index']++;
	}

	if(isset($_POST['data']) && $_POST['data'] != ""){
		$_SESSION['storing_array'][$_SESSION['index']] = str_rot13(clean($_POST["data"]));
	}

	if(isset($_POST['sorta'])){
		asort($_SESSION['storing_array']);
	}

	if(isset($_POST['sortn'])){
		ksort($_SESSION['storing_array']);
	}

	if(isset($_POST['delete_val'])){
		unset($_SESSION['storing_array'][$_POST['delete_val']]);
	}
	
}

echo "<table border=\"1\" style=\"width:50%\">";

foreach($_SESSION['storing_array'] as $key=>$value){

	echo "<tr>";
	echo "<td>";
	echo $key;
	echo "</td>";
	echo "<td>" ;
	echo $value;
	echo "</td>";
	echo "<td>" ;

	echo "<form method=\"post\" action=";
	echo htmlspecialchars($_SERVER["PHP_SELF"]);
	echo ">";
	echo "<button type=\"submit\" name=\"delete_val\" value=\"";
	echo $key;
	echo "\">Delete</button>";
	echo "</form>";

	echo "</td>";
	echo "</tr>";

}

echo "</table>";

?>

<p></p>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
	Please input something to be Rot 13 shifted: <input type="text" name="data" value="">
	<p></p>
	<input type="submit" name="submit_val" value="Submit"> 
	<p></p>
	<input type="submit" name="sorta" value="Sort Alphabetically">
	<p></p>
	<input type="submit" name="sortn" value="Sort by Index"> 
</form>

</body>
</html>
