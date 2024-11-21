<html>
 <head> 
        <title>
            LAB 08
        </title>
        <link rel="stylesheet" href="./styles.css">
</head> 
<body>

<?php
$int1 = $_POST['integer1'];
$int2 = $_POST['integer2'];
$res = '';
if ($int1 >= 3 && $int1 <= 12 && $int2 >= 3 && $int2 <= 12){
        echo '<table class="table">';
    for($i = 0; $i < $int1; $i += 1){
            for($j = 0; $j < $int2; $j += 1){
                    $res .= '<td>' . ($i+1)*($j+1) . '</td>';
            }
            echo '<tr>'.$res.'</tr>';
            $res = '';
    }
        echo '</table>';
}
else if($int1 && $int2){
        echo '<p> PLEASE ENTER A VALID INPUT </p>';
}

?>

</body>

</html>
