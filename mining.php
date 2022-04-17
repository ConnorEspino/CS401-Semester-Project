<html>
    <?php 
        session_start();
        // if(isset($_SESSION['message'])){
        //     unset($_SESSION['message']);
        // }

        if(isset($_SESSION['correct'])){
            unset($_SESSION['correct']);
        }

        if(!isset($_SESSION['user_id'])){
            $_SESSION['login_messages'][] = " id=bad_message> Please login before browsing";
            header('Location: index.php');
            exit();
        }

        require_once 'header.php';
        $operands = array("+", "-", "*");
    ?>
    
    <body>
        <div id="mine">
            <h1 id="mine_problem">
                <?php
                    
                    //Generate a random problem
                    $num1 = rand(-20, 20);
                    $num2 = rand(-20, 20);
                    $oper = rand(0,2);

                    switch($oper){
                        case 0:
                            $ans = $num1 + $num2;
                            break;
                        case 1:
                            $ans = $num1 - $num2;
                            break;
                        case 2:
                            $ans = $num1 * $num2;
                            break;
                    }

                    //Add the correct answer to the session variable 
                    //and print out the problem on the screen
                    $_SESSION['correct'] = $ans;
                    echo $num1 . '  ' . $operands[$oper] . '  ' . $num2;
                ?>
            </h1>

            <div>
                <form for="answer" action="handlers/mining_handler.php" method="POST">
                    <div id="mine_form">
                        <input for="Enter your answer" type="text" id="answer" name="answer" placeholder="Enter your answer...">
                        <input for="Submit button" type="submit" id="mine_button" value=" Enter ">
                    </div>
                </form>
            </div>

            <div class="post_action_message">
                <?php 
                    //Print out whatever message comes across
                    if(isset($_SESSION['mine_message'])){
                        echo '<p ' . $_SESSION['mine_message'] . " </p>";
                    }

                    unset($_SESSION['mine_message']);
                ?>
            </div>
        </div>
    </body>
    <?php 
        require_once 'footer.php';
    ?>
</html>