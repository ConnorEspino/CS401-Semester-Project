<?php 
    session_start();

    $id = $_POST['id'];

    require_once 'Dao.php';
    $dao = new Dao();
    

    $dao->deleteImage($id);
    if(!unlink($dao->getImgPath($id))){
        $_SESSION['img_message'] = " id=bag_message> Error: Could not delete";
        header('Location: img_upload.php');
        exit;
    }
            
    $_SESSION['img_message'] = " id=good_message> Image #" . $id . " deleted!";

    header('Location: img_upload.php');
    exit;
?>