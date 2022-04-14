<html>
    <?php 
        require_once 'header.php';
        session_start();
        if(!isset($_SESSION['user_id'])){
            // unset($_SESSION['user_id']);
            header('Location: index.php');
            exit();
        }

        if($_SESSION['user_id'] != 174){
            header('Location: index.php');
            exit();
        }

    ?>
    <body>
        <div>
            <h1>Image Upload</h1>
            <form for="image" action="image_handler.php" method="POST" enctype="multipart/form-data">
                <div id="mine_form">
                    <input type="number" id="price" name="price" placeholder="Price">
                    <input type="text" id="title" name="title" placeholder="Title">
                    <input type="file" id="img" name="img">
                    <input type="submit" id="mine_button" value=" Enter ">
                </div>
            </form>
        </div>
        <div>
            <h1>Image Delete</h1>

            <form for="image" action="image_delete.php" method="POST">
                <div id="mine_form">
                    <input type="number" id="id" name="id" placeholder="Image Id">
                    <input type="submit" id="mine_button" value=" Enter ">
                </div>
            </form>
        </div>

        <div class="post_action_message">
                <?php 
                    //Print out whatever message comes across
                    if(isset($_SESSION['img_message'])){
                        echo '<p ' . $_SESSION['img_message'] . " </p>";
                    }

                    unset($_SESSION['img_message']);
                ?>
            </div>
    </body>
</html>
