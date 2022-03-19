<?php 
    session_start();

    if(isset($_SESSION['register_messages'])){
        unset($_SESSION['register_messages']);
    }

    if(isset($_SESSION['login_messages'])){
        unset($_SESSION['login_messages']);
    }

    $user = $_POST['username'];
    $pass = $_POST['password'];

    require_once 'Dao.php';
    $dao = new Dao();

    if($user == NULL){
        $_SESSION['login_messages'][] = " id=bad_message> Please enter a username";
    }

    if($pass == NULL){
        $_SESSION['login_messages'][] = " id=bad_message> Please enter a password";
    }

    if($user != NULL && $pass != NULL && !$dao->login($user, $pass)){
        $_SESSION['login_messages'][] = " id=bad_message> Incorrect Login information, please try again";
    }
    

    if(isset($_SESSION['login_messages'])){
        header('Location: index.php');
        exit;
    }
    
    $_SESSION['mine_message'] = " id=good_message> Signed in successfully!";
    $_SESSION['user_id'] = $dao->getId($user);
    header('Location: index.php');
    exit;
?>