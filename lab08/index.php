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

                if ($hour > 21 || $hour < 5){
                    $message = "<h1>GOOD NIGHT</h1>";
                }
                elseif ($hour > 17){
                    $message = "<h1>GOOD EVENING</h1>";
                }
                elseif ($hour > 11){
                    $message = "<h1>GOOD AFTERNOON</h1>";
                }
                elseif ($hour > 4){
                    $message = "<h1>GOOD MORNING</h1>";
                }
                print <<<T1
                <div>
                THE MESSAGE IS
                <br>
                $message
                T1;

            ?>
           </div> 
        </div>
    </body>

</html>



