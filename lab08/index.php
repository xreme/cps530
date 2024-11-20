<!DOCTYPE html>
<html>
    <head> 
        <title>
            LAB 08
        </title>
        <link rel="stylesheet" href="./styles.css">
    </head> 
    <body>
    <div>
        <img src="images/corn.gif" id="hoverGif">
    </div>
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
}
?>
<?php
if(isset($_COOKIE['setGif']))
{
   $thanksgivingGif= $_COOKIE['setGif'];
   echo "The set Gif is ". $thanksgivingGif;
}
else
	   echo "Cookie not set or expired";
?>

    <div>
        <form action="https://www.cs.torontomu.ca/~osibazeb/cps530/lab08/index.php" method="post" id="thanksgiving">
            <h3>
                Select a GIF
            </h3>
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
        </div>
    </body>

</html>



