<?php
require("db_connection.php");
echo "<a href='https://webdev.cs.torontomu.ca/~osibazeb/cps530/lab09/'>INDEX<a/><br>";
$sql = "CREATE TABLE Lab09Pictures(
		picture_number INT AUTO_INCREMENT PRIMARY KEY,
		subject VARCHAR(255) NOT NULL,
		location VARCHAR(255) NOT NULL,
		date_taken DATE NOT NULL,
		picture_url VARCHAR(255) NOT NULL
	);";
$created_table = mysqli_query($connect, $sql);
if ($created_table){
	echo "Table Created";
}
else{
	echo "Error creating the table: ";
	echo "Table likely already exisits";
}
?>
