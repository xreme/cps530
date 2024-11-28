<?php
require("db_connection.php");
echo "<a href='https://webdev.cs.torontomu.ca/~osibazeb/cps530/lab09/'>INDEX<a/><br>";
$image1 = ["Toad from Mario Kart", "Toronto, Ontario, Canada", "2024-11-24", "./images/toad.JPG"];
$image2 = ["Awesome connect 4 win", "Toronto, Ontario, Canada", "2023-10-31","./images/connect4.PNG"];
$image3 = ["A House!", "Toronto, Ontario, Canada", "2022-10-7","./images/house.JPG"];
$image4 = ["Some good food I ate", "Montreal, Quebec, Canada", "2024-09-20","./images/food1.jpg"];
$image5 = ["A nice steak which I ate", "Toronto, Ontario, Canada", "2024-09-01","./images/food2.jpg"];
$image6 = ["Some good food I ate on the trunk of my car","Toronto, Ontario, Canada", "2023-07-26", "./images/food3.JPG"];
$image7 = ["Some cool art from the AGO", "Toronto, Ontario, Canada", "2024-05-17", "./images/art.JPG"];
$image8 = ["A photo of the the Rapper Babytron","Toronto, Ontario, Canada", "2024-03-05", "./images/babytron.JPG"];
$image9 = ["An image of me at Blue Mountain", "Blue Mountain, Ontario, Canada", "2024-02-18", "./images/snowboarding.JPG"];
$image10 = ["Some good garlic bread", "Toronto, Ontario, Canada", "2022-01-05","./images/food4.JPG"];

$images = [$image1,$image2,$image3,$image4,$image5,$image6,$image7,$image8,$image9,$image10];

for ($x = 0; $x < count($images); $x++){

	$sql_insert = "INSERT INTO Lab09Pictures (subject, location, date_taken, picture_url)
		VALUES ('".$images[$x][0]."',
			'".$images[$x][1]."',
			'".$images[$x][2]."',
			'".$images[$x][3]."');";

	if (mysqli_query($connect, $sql_insert)){
		echo "record created: <br>";
	}
	else {
		echo "Error: " . mysqli_error($connect) . "<br>";
	}


	for ($y = 0; $y < 4; $y++){
		echo $images[$x][$y];
		echo "<br>";
	}
	echo "<hr>";
}
mysqli_close($connect);
?>
