<html>
    <?php 
        require_once 'header.php';
        session_start();
        if(isset($_SESSION['user_id'])){
            // unset($_SESSION['user_id']);
            header('Location: mining.php');
            exit();
        }

    ?>
    
    <body>
        <div id="login">
            
            <form for="login" action="handlers/login_handler.php" method="POST">

                <div id="login_form">
                    <h1>Login</h1>
                    <input for="Username Login" type="text" id="login_info" name="username" placeholder="Username">
                    <input for="Password Login" type="password" id="login_info" name="password" placeholder="Password">
                    <input type="submit" id="mine_button" value=" Enter ">
                </div>
            </form>

            <form for="register" action="handlers/register_handler.php" method="POST">

                <div id="login_form">
                    <h1>Register</h1>
                    <input for="Username Register" type="text" id="login_info" name="username" placeholder="Username">
                    <input for="Password Register" type="password" id="login_info" name="password" placeholder="Password">
                    <input type="submit" id="mine_button" value=" Enter ">
                </div>
            </form>
            
        </div>  

        <div class="post_action_message">
            <?php 
            
                //Print out whatever message comes across from the handler
                if(isset($_SESSION['register_messages'])){
                    foreach($_SESSION['register_messages'] as $message){
                        echo '<p ' . $message . " </p>";
                    }
                }

                if(isset($_SESSION['login_messages'])){
                    foreach($_SESSION['login_messages'] as $message){
                        echo '<p ' . $message . " </p>";
                    }
                }

                unset($_SESSION['register_messages']);
                unset($_SESSION['login_messages']);
            ?>
        </div>
            
    </body>
    <?php 
        require_once 'footer.php';
    ?>
</html>