<!DOCTYPE html>
<html>
    <head> 
        <title>
            LAB 08
        </title>
    </head> 
    <body>
        <div>
            <H1>
                TASK 1
            </H1>
           <div>
            <?php 
                $hour= date("H");

                if ($hour >= 21 || $hour < 5){
                    $message = "<h1>GOOD NIGHT</h1>";
                }
                elseif ($hour >= 18){
                    $message = "<h1>GOOD EVENING</h1>";
                }
                elseif ($hour >= 12){
                    $message = "<h1>GOOD AFTERNOON</h1>";
                }
                else{
                    $message = "<h1>GOOD MORNING</h1>";
                }
echo <<<T1
<div>
THE MESSAGE IS
<br>
$message
</div>
T1;
            ?>
           </div> 
        </div>
    </body>

</html>



