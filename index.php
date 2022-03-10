<html>
    <?php 
        session_start();
        if(isset($_SESSION['message'])){
            unset($_SESSION['message']);
        }

        if(isset($_SESSION['correct'])){
            unset($_SESSION['correct']);
        }

        require_once 'header.php';
        $operands = array("+", "-", "*");
    ?>
    
    <body>
        <div id="mine">
            <h1 id="mine_problem">
                <?php
                    
                    $num1 = rand(-20, 20);
                    $num2 = rand(-20, 20);
                    $oper = rand(0,3);

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

                    $_SESSION['correct'] = $ans;
                    echo $num1 . '  ' . $operands[$oper] . '  ' . $num2;
                ?>
            </h1>

            <div id="mine_textbox">
                <form for="answer" action="mining_handler.php" method="POST">
                    <input type="text" id="answer" name="answer" placeholder="Enter your answer...">
                </form>
                <input type="submit" id="mine_button" value=" Enter ">
            </div>
            <?php 
                echo $_SESSION['correct'];
                echo $_SESSION['message'];
            ?>
        </div>
    </body>
</html>