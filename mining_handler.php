<?php 
    session_start();

    $answer = $_POST['answer'];
    if(!is_numeric($answer)){
        $_SESSION['message'] = "Please enter a number";
    }

    if($_SESSION['correct'] == $_POST['answer']){
        $_SESSION['message'] = "Correct! +$5";
    }

    // require_once 'Dao.php';
    // $dao = new Dao();

    #Do some DB stuff here
    // header('Location: index.php');
    // exit;

    echo $_SESSION;
?>