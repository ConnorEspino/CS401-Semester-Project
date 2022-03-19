<html>
    <?php
        require_once 'header.php';
        if(!isset($_SESSION['user_id'])){
            header('Location: login.php');
            exit();
        }    
    ?>
    
    <body>
        <div id="account">
            <h1>Balance: $50000</h1>
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