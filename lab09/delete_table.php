<?php
require("db_connection.php");
echo "<a href='https://webdev.cs.torontomu.ca/~osibazeb/cps530/lab09/'>INDEX<a/><br>";
$sql = "DROP TABLE Lab09Pictures;";
$created_table = mysqli_query($connect, $sql);
if ($created_table){
        echo "Table Dropped";
}
else{
        echo "Error deleting the table: ";
}
?>
