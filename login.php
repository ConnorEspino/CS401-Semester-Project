<html>
    <?php 
        require_once 'header.php';
        session_start();
        if(isset($_SESSION['user_id'])){
            // unset($_SESSION['user_id']);
            header('Location: index.php');
            exit();
        }

    ?>
    
    <body>
        <div id="login">
            
            <form for="login" action="login_handler.php" method="POST">

                <div id="login_form">
                    <h1>Login</h1>
                    <input type="text" id="login_info" name="username_login" placeholder="Username">
                    <input type="password" id="login_info" name="password_login" placeholder="Password">
                    <input type="submit" id="mine_button" value=" Enter ">
                </div>
            </form>

            <form for="register" action="register_handler.php" method="POST">

                <div id="login_form">
                    <h1>Register</h1>
                    <input type="text" id="login_info" name="username" placeholder="Username">
                    <input type="password" id="login_info" name="password" placeholder="Password">
                    <input type="submit" id="mine_button" value=" Enter ">
                </div>
            </form>
            
        </div>  

        <div class="post_action_message">
                <?php 
                    //Print out whatever message comes across
                    if(isset($_SESSION['register_messages'])){
                        foreach($_SESSION['register_messages'] as $message){
                            echo '<p ' . $message . " </p>";
                        }
                    }

                    unset($_SESSION['register_messages']);
                ?>
            </div>
            
    </body>
</html>