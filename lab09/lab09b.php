<!DOCTYPE html>
<html>
<head> 
	<title> Lab 09B </title>
	<link rel="stylesheet" href="./styles1.css">
</head>
<body>

<?php
require("db_connection.php");
echo "<h1> LAB 9B: All images </h1>";
echo "<div class='photo-wrapper'>";
echo "<a href='https://webdev.cs.torontomu.ca/~osibazeb/cps530/lab09/'>INDEX<a/>";
$sql = "SELECT * FROM Lab09Pictures ORDER BY date_taken DESC";
$result = mysqli_query($connect, $sql);

if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		$number = $row['picture_number'];
		$subject = $row['subject'];
		$image = $row['picture_url'];
		$location = $row['location'];
		$date_taken = $row['date_taken'];


		echo "<div class='photo'>";
		echo "<img src='$image' class='photo-image'><hr>";
		echo "<div class='photo-caption'>$number. $subject<br>$location<br>$date_taken<br><a href=$image>$image</a></div>";
		echo "</div>";
	}
} 
else {
  echo "No results.";
}

echo "</div>";
mysqli_close($connect);
?>
</body>
</html>
