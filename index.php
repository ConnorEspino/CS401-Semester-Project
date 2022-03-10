<html>
    <?php 
        require_once 'header.php';
        $operands = array("+", "-", "/", "*");
    ?>
    
    <body>
        <div id="mine">
            <h1 id="mine_problem">
                <?php
                    $num1 = rand(-100, 100);
                    $num2 = rand(-100, 100);
                    $oper = rand(0,3);
                    echo num1 . operands[oper] . num2;
                ?>
            </h1>

            <div id="mine_textbox">
                <form for="answer">
                    <input type="text" id="answer" name="answer" value="Enter your answer...">
                </form>
                <button id="mine_button"> Enter </button>
            </div>
        </div>
    </body>
</html>