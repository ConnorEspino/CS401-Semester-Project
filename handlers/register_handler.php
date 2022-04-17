<?php 
    session_start();

    if(isset($_SESSION['register_messages'])){
        unset($_SESSION['register_messages']);
    }

    if(isset($_SESSION['login_messages'])){
        unset($_SESSION['login_messages']);
    }

    $user = $_POST['username'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    require_once '../Dao.php';
    $dao = new Dao();


    if($user != NULL && $dao->isUser($user)){
        $_SESSION['register_messages'][] = " id=bad_message> Username already exists, please choose another";
    }

    if($user == NULL){
        $_SESSION['register_messages'][] = " id=bad_message> Please enter a username";
    }

    if($pass == NULL){
        $_SESSION['register_messages'][] = " id=bad_message> Please enter a password";
    }
    

    if(isset($_SESSION['register_messages'])){
        header('Location: ../index.php');
        exit;
    }
    
    $dao->registerUser($user, $pass);
    $_SESSION['mine_message'] = " id=good_message> Registered and signed in successfully!";
    $_SESSION['user_id'] = $dao->getId($user);
    header('Location: ../index.php');
    exit;
?>