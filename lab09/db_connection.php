<?php
$hostname = "localhost";
$username = "";
$password = "";
$database = "";
// create a connection
$connect = mysqli_connect($hostname, $username, $password, $database);
// check connection
if($connect){
//  print("Connection Established Successfully");
 // print "<hr>";
}else{
  print("Connection Failed ");
  print "<hr>";
  echo "<br>";
}
?>
