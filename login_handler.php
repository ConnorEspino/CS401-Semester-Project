<?php 
    session_start();

    $userLogin = $_POST['username_login'];
    $passLogin = $_POST['password_login'];

    $userReg = $_POST['username_reg'];
    $passReg = $_POST['password_reg'];

    require_once 'Dao.php';
    $dao = new Dao();

    if(isset($userReg)){
        $dao->registerUser($userReg, $passReg);
    }

    header('Location: index.php');
    exit;
?>