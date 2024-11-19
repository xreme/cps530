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
                    echo "<h1>Good Night</h1>";
                }
                elseif ($hour > 17){
                    echo "<h1>Good Evening</h1>";
                }
                elseif ($hour > 11){
                    echo "<h1>Good Afternoon</h1>";
                }
                elseif ($hour > 4){
                    echo "<h1>Good Morning</h1>";
                }

            ?>
           </div> 
        </div>
    </body>

</html>



