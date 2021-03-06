<html>
    <!--This page will be useable with buying and selling-->
    <?php 
        require_once 'header.php';

        session_start();

        require_once 'Dao.php';
        $dao = new Dao();  

        if(!isset($_SESSION['user_id'])){
            $_SESSION['login_messages'][] = " id=bad_message> Please login before browsing";
            header('Location: index.php');
            exit();
        }

        if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
            header('Location: market.php');
            exit();
        }

        $imgId = $_GET['id'];
        if(!($img = $dao->getImage($imgId))){
            header('Location: market.php');
            exit();
        }
        $img = json_decode(json_encode($img), true);
    ?>
    
    <body>
        <div id="purchase">
            <div id="purchase_img">
                <?php echo '<img src="' . $img['rel_path'] . '">' ?>
            </div>

            <div id="purchase_txt">
                <h1><?php echo $img['title']?></h1>
                <h1>Price: $<?php echo $img['price']?></h1>
            </div>

            <div>
                <form for="register" action="handlers/purchase_buy_handler.php?id=<?php echo $imgId ?>" method="POST">
                        <input type="submit" id="purchase_button" value="Buy">
                </form>
                <form for="register" action="handlers/purchase_sell_handler.php?id=<?php echo $imgId ?>" method="POST">
                        <input type="submit" id="purchase_button" value="Sell">
                </form>
            </div>
        </div>

        <div class="post_action_message">
            <?php 
                //Print out whatever message comes across from the handler
                if(isset($_SESSION['purchase_messages'])){
                    foreach($_SESSION['purchase_messages'] as $message){
                        echo '<p ' . $message . " </p>";
                    }
                }

                unset($_SESSION['purchase_messages']);
            ?>
        </div>
    </body>
    <?php 
        require_once 'footer.php';
    ?>
</html>