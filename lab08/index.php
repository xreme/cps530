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
                    echo "Good Night";
                }
                elseif ($hour > 17){
                    echo "Good Evening"
                }
                elseif ($hour > 11){
                    echo "Good Afternoon"
                }
                elseif ($hour > 4){
                    echo "Good Morning"
                }


                echo 'the hour is ' . $hour ;
            ?>
           </div> 
        </div>
    </body>

</html>



