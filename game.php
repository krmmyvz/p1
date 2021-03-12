<!DOCTYPE html>
<?php
// Start the session
session_start();
?>
<html>
    <head>
        <title>
        Rock-Paper-Scissors
        </title>
        <link rel="stylesheet" href="stylesheet.css">
    </head>

    <body  class="wholesite">
        <div class="header">
            Rock - Paper - Scissors Game!
            
        </div>
        <div class=selection>
            <h2>Let's play a game!</h2>
            <h4>10 Rounds... Can you win? Make your choice!</h4>
            

            <form name="input" action="game.php" method="post">
            <table>

            <tr>
                <td>            
                    <label>
                    <input type="radio" name="test" value="Rock">
                    <img src="img/rock.png">
                    </label>
                </td>
                <td>
                    <label>
                    <input type="radio" name="test" value="Paper">
                    <img src="img/paper.png">
                    </label>                   
                </td>
                <td>
                    <label>
                    <input type="radio" name="test" value="Scissors">
                    <img src="img/scissors.png">
                    </label>               
                </td>
            </tr>
            <tr>
                <td>Rock</td>
                <td>Paper</td>
                <td>Scissors</td>
            </tr>
            </table>
            <tr>
                <input type="submit" name="submit" value="Submit" class="btn" />
            </tr>
            </form>
            <?php
                if(empty($_SESSION['wins'])  && empty($_SESSION['loses'])  && empty($_SESSION['draws'])  && empty($_SESSION['counter'])    ){
                $_SESSION['wins'] = 0;
                $_SESSION['loses'] = 0;
                $_SESSION['draws'] = 0;
                $_SESSION['counter'] = 1;
                }
                

                if (isset($_POST['submit'])) {
                    $choice = $_POST['test'];
                    $computer = rand(0,2);

                    if ($choice == "") {
                        echo "<div class=\"alert-red\" role=\"alert\" >Please make a choice!</div>";
                    }
                    elseif ($choice == "Rock" || $choice == "Paper" || $choice == "Scissors"){
                        echo "<div class=\"player player-a\" role=\"alert\">Player A: $choice</div>";
                        switch ($computer) {
                            case 0:
                                echo "<div class=\"player player-b\" role=\"alert\">Player B: Rock</div>";
                                break;
                            case 1:
                                echo "<div class=\"player player-b\" role=\"alert\">Player B: Paper</div>";
                                break;
                            case 2:
                                echo "<div class=\"player player-b\" role=\"alert\">Player B: Scissors</div>";
                                break;
                            default:
                                break;
                        }
                        if (($choice == "Rock" && $computer == 0) || ($choice == "Paper" && $computer == 1) || ($choice == "Scissors" && $computer == 2)) {
                            echo "<div class=\"alert-draw\" role=\"alert\">Same choice: It is a draw...</div>";

                            $_SESSION['draws']+=1;
                            //Printing the initiation of session variables for your reference
                            echo '<div class="alert alert-first" > Wins: '.$_SESSION["wins"].'</div>'; 
                            echo '<div class="alert" > Loses: '.$_SESSION["loses"].'</div>'; 
                            echo '<div class="alert" > Draws: '.$_SESSION["draws"].'</div>';
                            echo '<div class="alert alert-last" > Round: '.$_SESSION["counter"].'</div>';  

                        } elseif (($choice == "Rock" && $computer == 2)) {
                            echo "<div class=\"alert-round\" role=\"alert\">Rock crushers Scissors: Player A wins...</div>";
                            $_SESSION['wins']+=1;
                            //Printing the initiation of session variables for your reference
                            echo '<div class="alert alert-first" > Wins: '.$_SESSION["wins"].'</div>'; 
                            echo '<div class="alert" > Loses: '.$_SESSION["loses"].'</div>'; 
                            echo '<div class="alert" > Draws: '.$_SESSION["draws"].'</div>';
                            echo '<div class="alert alert-last" > Round: '.$_SESSION["counter"].'</div>';   
    
                        } elseif (($choice == "Paper" && $computer == 0)) {
                            echo "<div class=\"alert-round\" role=\"alert\">Paper covers Rock: Player A wins...</div>";
                            $_SESSION['wins']+=1;
                            //Printing the initiation of session variables for your reference
                            echo '<div class="alert alert-first" > Wins: '.$_SESSION["wins"].'</div>'; 
                            echo '<div class="alert" > Loses: '.$_SESSION["loses"].'</div>'; 
                            echo '<div class="alert" > Draws: '.$_SESSION["draws"].'</div>';
                            echo '<div class="alert alert-last" > Round: '.$_SESSION["counter"].'</div>';  
                            
                        } elseif (($choice == "Scissors" && $computer == 1)) {
                            echo "<div class=\"alert-round\" role=\"alert\">Scissors cut Paper: Player A wins...</div>";
                            $_SESSION['wins']+=1;
                            //Printing the initiation of session variables for your reference
                            echo '<div class="alert alert-first" > Wins: '.$_SESSION["wins"].'</div>'; 
                            echo '<div class="alert" > Loses: '.$_SESSION["loses"].'</div>'; 
                            echo '<div class="alert" > Draws: '.$_SESSION["draws"].'</div>';
                            echo '<div class="alert alert-last" > Round: '.$_SESSION["counter"].'</div>';  

                        } else {
                            echo "<div class=\"alert-round\" role=\"alert\">Player B wins...</div>";
                            $_SESSION['loses']+=1;
                            //Printing the initiation of session variables for your reference
                            echo '<div class="alert alert-first" > Wins: '.$_SESSION["wins"].'</div>'; 
                            echo '<div class="alert" > Loses: '.$_SESSION["loses"].'</div>'; 
                            echo '<div class="alert" > Draws: '.$_SESSION["draws"].'</div>';
                            echo '<div class="alert alert-last" > Round: '.$_SESSION["counter"].'</div>';   

                        }

                        if($_SESSION['counter'] >= 10){
                            session_destroy();
                            if($_SESSION['wins'] > $_SESSION['loses']){
                                echo '<div class="alert-over">YOU WON!</div>'; 
                            }
                            elseif($_SESSION['loses'] > $_SESSION['wins']){
                                echo '<div class="alert-over">YOU LOSE!</div>'; 
                            }
                            else{
                                echo '<div class="alert-over">DRAW!</div>'; 
                            }
                        }
                        else{
                            $_SESSION['counter']+=1;
                        }
                    }
                }
                
            ?>
        </div>
        <div class="footer">
                Kerem Yavuz - 1700002885
                Istanbul Kultur University
        </div>
    </body>

</html>
