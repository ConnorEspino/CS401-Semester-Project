<?php 
    session_start();

    $id = $_POST['id'];

    require_once 'Dao.php';
    $dao = new Dao();
    

    if(!unlink(getcwd() . $dao->getImgPath($id))){
        $_SESSION['img_message'] = " id=bag_message> Error: Could not delete" . getcwd() . $dao->getImgPath($id);
        header('Location: img_upload.php');
        exit;
    }

    $dao->deleteImage($id);
    
    $_SESSION['img_message'] = " id=good_message> Image #" . $id . " deleted!";

    header('Location: img_upload.php');
    exit;
?>