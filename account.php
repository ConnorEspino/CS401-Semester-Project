<html>
    <?php
        session_start();
        require_once 'header.php';

        if(!isset($_SESSION['user_id'])){
            $_SESSION['login_messages'] = " id=bad_message> Please login before browsing";
            header('Location: index.php');
            exit();
        }

        require_once 'Dao.php';
        $dao = new Dao();
    ?>
    
    <body>
        <div id="account">
            <h1><?php echo htmlspecialchars($dao->getUser($_SESSION['user_id'])) ?>'s Balance: $<?php echo $dao->getBalance($_SESSION['user_id'])?></h1>
            <h1>Your Purchases</h1>
            <div id="purchases">
                <ol>
                    <li>
                        <div class="container">
                            <a href="monkee.png"><img src="monkee.png">
                                <div class="content">
                                    <h1>Value: $6969</h1>
                                </div>
                            </a>
                        </div>
                    </li>
                        
                    <li>
                        <div class="container">
                            <a href="monkee2.png"><img src="monkee2.png">
                                <div class="content">
                                    <h1>Value: $6969</h1>
                                </div>
                            </a>
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </body>
</html>