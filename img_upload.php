<html>
    <?php 
        require_once 'header.php';
        session_start();
        if(!isset($_SESSION['user_id'])){
            // unset($_SESSION['user_id']);
            header('Location: login.php');
            exit();
        }

        if($_SESSION['user_id'] != 64){
            header('Location: login.php');
            exit();
        }

    ?>
    <body>
        <h1>Image Upload</h1>
        <p>Price</p>
        <form for="image" action="image_handler.php" method="POST" enctype="multipart/form-data">
            <div id="mine_form">
                <input type="number" id="price" name="price" placeholder="Price">
                <input type="file" id="img" name="img">
                <input type="submit" id="mine_button" value=" Enter ">
            </div>
        </form>
    </body>
</html>
