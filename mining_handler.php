<?php 
    session_start();

    if(isset($_SESSION['message'])){
        unset($_SESSION['message']);
    }

    $answer = $_POST['answer'];
    if(!is_numeric($answer)){
        $_SESSION['message'] = "Please enter a number";
    }

    if($_SESSION['correct'] == $_POST['answer']){
        $_SESSION['message'] = "Correct! +$5";
    }else{
        $_SESSION['message'] = "Incorrect, try again!";
    }

    // require_once 'Dao.php';
    // $dao = new Dao();

    #Do some DB stuff here
    
    echo $_POST['answer'];
    echo $_SESSION['message'];
    echo $_SESSION['correct'];

    header('Location: index.php');
    exit;
?>