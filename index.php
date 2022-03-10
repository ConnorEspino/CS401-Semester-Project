<html>
    <?php 
        require_once 'header.php';
        $operands = array("+", "-", "/", "*");
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
                            $ans = $num1 / $num2;
                            break;
                        case 3:
                            $ans = $num1 * $num2;
                            break;
                    }
                    echo $num1 . '  ' . $operands[$oper] . '  ' . $num2;
                ?>
            </h1>

            <div id="mine_textbox">
                <form for="answer">
                    <input type="text" id="answer" name="answer" value="Enter your answer...">
                </form>
                <button id="mine_button"> Enter </button>
            </div>
            <?php 
                echo $ans;
            ?>
        </div>
    </body>
</html>