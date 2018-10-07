<?php 
$check = new SessionController();
$check->restricLogin();
?> 

    <div style="text-align: center">
        <h1>Year Planning</h1>
        <h2>Weeks List</h2>
    </div>

    <table class="table table-striped" style="margin: 0 auto; text-align: center; border:1px solid lightgrey; padding:2px; margin-bottom:5px; border-radius:3px; background-color:rgba(255, 255, 255, 0.45)">


        <?php
        // Recup des num de semaines deja dans la base
        $ctrl = new WeekMealsController();
        $numbers = $ctrl->getweekNumbers();

        //Generation de la liste des semaines (lundi au dimanche)
        for ($i = 1; $i < 53; $i++) {

            $weeknumber = ($i < 10) ? '0'.$i : $i;
            $str = '2016W'.$weeknumber;
            echo "<tr style='line-height: 25px; font-size: 15px'>
                  <td><strong>Semaine ".$weeknumber."</strong></td>";
            echo "<td>Du ".date("d M", strtotime($str))." au ";
            echo "".date("d M", strtotime($str.' + 6 days'))."</td>";

            if(in_array($weeknumber, $numbers)){

                echo '<td><a style="color: brown; font-weight: bold" href="index.php?p=mealsmodify&id='.$weeknumber.'">Modify</a></td></tr>';

            } else {

                echo '<td><a href="index.php?p=mealscreate&id='.$weeknumber.'">Create</a></td></tr>';
            }
        }
        ?>
    </table>