<!-- Jed Grant 10/17/15 -->

<?php

$log_file = "log.txt";
$file_contents = file_get_contents($log_file);

echo "<p></p>";
echo "Now in external script";
echo "<p></p>";

if(isset($_POST['rot_cyph'])){
	echo "After processing: ";
	echo str_rot13($_POST["data"]);
	$_POST["data"] = str_rot13($_POST["data"]);
	echo "<p></p>";
	echo "Recording processed input in log file.";
	echo "<p></p>";
	$file_contents .= $_POST["data"] . "\n";
	file_put_contents($log_file,$file_contents);	
}

if(isset($_POST['upper'])){
	echo "After processing: ";
	echo strtoupper($_POST["data"]);
	$_POST["data"] = strtoupper($_POST["data"]);
	echo "<p></p>";
	echo "Recording processed input in log file.";
	echo "<p></p>";
	$file_contents .= $_POST["data"] . "\n";
	file_put_contents($log_file,$file_contents);	
}

?>
