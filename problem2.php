<!DOCTYPE HTML> 
<!-- Jed Grant 10/17/15 -->
<html>
<head>
</head>
<body> 


<?php
function clean($input) {
	$input = trim($input);
	$input = stripslashes($input);
	$input = htmlspecialchars($input);
	return $input;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if(isset($_POST['data']) && $_POST['data'] != ""){
		echo "Before processing: ";
		echo clean($_POST["data"]);
		$_POST["data"] = clean($_POST["data"]);
	}	

	include 'problem2extern.php';

	echo "<p></p>";
	echo "Now back in main script.";
	echo "<p></p>";
	echo "Input has been processed by external script: ";
	echo $_POST["data"];
	echo "<p></p>";
	
}

?>


<p></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
	Please input text to process: <input type="text" name="data" value="">
	<p></p>
	<button type="submit" name="rot_cyph" value="chg_to_rot_13">Rot 13</button>
	<p></p>
	<button type="submit" name="upper" value="chg_to_up">Change to Uppercase</button>
</form>



</body>
</html>
