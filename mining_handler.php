<?php 
    session_start();

    if(isset($_SESSION['mine_message'])){
        unset($_SESSION['mine_message']);
    }

    $answer = $_POST['answer'];

    if(!is_numeric($answer)){
        $_SESSION['mine_message'] = " id=bad_message> Please enter a number";
        header('Location: index.php');
        exit;
    }

    if($_SESSION['correct'] == $_POST['answer']){
        $_SESSION['mine_message'] = " id=good_message> Correct! +$5";
    }else{
        $_SESSION['mine_message'] = " id=bad_message> Incorrect, try again!";
    }

    // require_once 'Dao.php';
    // $dao = new Dao();

    #Do some DB stuff here once login is figured out

    #Art sourced from the finest right click saves
    header('Location: index.php');
    exit;
?>