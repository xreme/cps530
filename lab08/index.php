<!DOCTYPE html>
<html>
    <head> 
        <title>
            LAB 08
        </title>
        <link rel="stylesheet" href="./styles.css">
    </head> 
    <body>
<?php
	if(isset($_COOKIE['setGif']))
{
   $thanksgivingGif= $_COOKIE['setGif'];
   echo "<div> <img src='images/".$thanksgivingGif.".gif' id='hoverGif'> </div>";
}
?>

<?php 
    $hour= date("H");

    if ($hour >= 21 || $hour < 5){
        $message = "<h1>GOOD NIGHT</h1>";
        $image = "night";
    }
    elseif ($hour >= 18){
        $message = "<h1>GOOD EVENING</h1>";
        $image = "evening";
    }
    elseif ($hour >= 12){
        $message = "<h1>GOOD AFTERNOON</h1>";
        $image = "afternoon";
    }
    else{
        $message = "<h1>GOOD MORNING</h1>";
        $image = "morning";
    }

echo <<<T1
<div class="$image">
<center><h1>$message</h1></center>
</div>
T1;
?>
<?php
$chosenGif = $_POST['gif'];
if ($chosenGif){
	echo "posed:" . $chosenGif . "<br>";
	$inADay = 60 * 60 * 24 + time();
	setcookie('setGif', $chosenGif, $inADay);
	header("Location: index.php");
}
?>
    <div id="task2">
        <form action="lab08b.php"  method="post" id="multiplication" target="result">
            <h3>
            Multiplication tables
            </h3>
            <p>
                Please enter two integers between 3 and 12. 
            </p>
	    <p id="error"></p>
            <div class="multiplication">
                <div>
                    <h3>
                        INTEGER 1
                    </h3>
                    <input type="number" name="integer1">
                </div>
                <div>
                <h2>x</h2> 
                </div>
                <div>
                    <h3>
                        INTEGER 2
                    </h3>
                    <input type="number" name="integer2">
                </div>
                <div>
                    <input type="submit" class="submit">
                </div>
            </div>
        </form>

	<script>
		document.getElementById("multiplication").addEventListener("submit", function (event) {
		    const integer1Element = document.querySelector("input[name='integer1']");
		    const integer2Element = document.querySelector("input[name='integer2']");
		    const integer1 = integer1Element.value;
		    const integer2 = integer2Element.value;
		    const num1 = parseInt(integer1, 10);
		    const num2 = parseInt(integer2, 10);
		    let isValid = true;
		    let errorMessage = "";

		    if (isNaN(num1) || num1 < 3 || num1 > 12) {
			isValid = false;
			errorMessage += "INTEGER 1 must be an integer between 3 and 12.<br>";
		    }
		    if (isNaN(num2) || num2 < 3 || num2 > 12) {
			isValid = false;
			errorMessage += "INTEGER 2 must be an integer between 3 and 12.<br>";
		    }
		    const errorElement = document.getElementById("error");
		    if (!isValid) {
			errorElement.innerHTML = errorMessage;
			integer2Element.value = ""; 
			integer1Element.value = "";
			event.preventDefault(); 
		    } else {
			errorElement.innerHTML = "";
		    }
		});

	</script>

	<iframe src="lab08b.php" name="result"></iframe> 

    <div>
        <form action="https://www.cs.torontomu.ca/~osibazeb/cps530/lab08/index.php" method="post" id="thanksgiving">
            <h3> Select a GIF </h3>
            <input type="radio" name="gif" id="corn" value="corn">
            <label for="corn">Thanksgiving Corn</label><br>
            <input type="radio" name="gif" id="pie" value="pie">
            <label for="pie">Thanksgiving Pie</label><br>
            <input type="radio" name="gif" id="wreath" value="wreath">
            <label for="wreath">Thanksgiving Wreath</label><br>
            <input type="radio" name="gif" id="turkey1" value="turkey1">
            <label for="turkey1">Thanksgiving Turkey 1</label><br>
            <input type="radio" name="gif" id="turkey2" value="turkey2">
            <label for="turkey2">Thanksgiving Turkey 2</label><br>
            <br>
            <input type="submit">
        </form>
    </div>
    </div>
	<?php
	if(isset($_COOKIE['setGif']))
	{
	   $thanksgivingGif= $_COOKIE['setGif'];
	   echo "<center><h2>THE SET GIF IS <mark>". $thanksgivingGif.".gif</mark></h2></center>";
	}
	else
		   echo "<center><h2>GIF NOT SET</h2></center>";
	?>
           </div> 
        </div>
    </body>

</html>
