<html>
    <?php require_once 'header.php';?>
    
    <body>
        <div id="login">
            
            <form for="login" action="login_handler.php" method="POST">

                <div id="login_form">
                    <h1>Login</h1>
                    <input type="text" id="login_info" name="username" placeholder="Username">
                    <input type="text" id="login_info" name="password" placeholder="Password">
                    <input type="submit" id="mine_button" value=" Enter ">
                </div>
            </form>

            <form for="register" action="register_handler.php" method="POST">

                <div id="login_form">
                    <h1>Register</h1>
                    <input type="text" id="login_info" name="username" placeholder="Username">
                    <input type="text" id="login_info" name="password" placeholder="Password">
                    <input type="submit" id="mine_button" value=" Enter ">
                </div>
            </form>
        </div>  
            
    </body>
</html>