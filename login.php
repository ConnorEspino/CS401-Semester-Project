<html>
    <?php require_once 'header.php';?>
    
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

            <form for="register" action="login_handler.php" method="POST">

                <div id="login_form">
                    <h1>Register</h1>
                    <input type="text" id="login_info" name="username_reg" placeholder="Username">
                    <input type="password" id="login_info" name="password_reg" placeholder="Password">
                    <input type="submit" id="mine_button" value=" Enter ">
                </div>
            </form>
        </div>  
            
    </body>
</html>