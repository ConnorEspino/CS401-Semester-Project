<?php 
    session_start();

    $price = $_POST['price'];

    require_once 'Dao.php';
    $dao = new Dao();
    

    if (count($_FILES) > 0) {
        if ($_FILES["img"]["error"] > 0) {
        } else {
            $imagePath = "/images/" . uniqid() . ".png";
            if (!move_uploaded_file($_FILES["img"]["tmp_name"], getcwd() . $imagePath)) {
                throw new Exception("File move failed");
            }
            
            //Database implementation
            
        }
    }
?>