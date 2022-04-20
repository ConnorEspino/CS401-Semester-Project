<?php 
    session_start();

    require_once '../Dao.php';
    $dao = new Dao();  

    if(!isset($_SESSION['user_id'])){
        $_SESSION['login_messages'] = " id=bad_message> Please login before browsing";
        header('Location: ../index.php');
        exit();
    }

    if(isset($_SESSION['purchase_messages'])){
        unset($_SESSION['purchase_messages']);
    }

    if(!isset($_GET['id'])){
        header('Location: ../market.php');
        exit();
    }

    $imgId = $_GET['id'];
    $img = $dao->getImage($imgId);
    $img = json_decode(json_encode($img), true);


    if($img['status'] == 1){
        $_SESSION['purchase_messages'][] = ' id=bad_message> Image is already owned by someone';
    }

    if($dao->getBalance($_SESSION['user_id']) < $img['price']){
        $_SESSION['purchase_messages'][] = ' id=bad_message> You do not have sufficient balance to buy this image';
    }

    if(isset($_SESSION['purchase_messages'])){
        header('Location: ../purchase.php?id=' . $imgId);
        exit();
    }

    //Buy image and set as sold
    $dao->setImageStatusBought($imgId);
    $dao->buyImage($_SESSION['user_id'], $imgId);
    $dao->subtractBalance($_SESSION['user_id'], $img['price']);

    $_SESSION['purchase_messages'][] = ' id=good_message> Image bought successfully!';

    header('Location: ../purchase.php?id=' . $imgId);
    exit();
?>
