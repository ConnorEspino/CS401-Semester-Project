<html lang="en">
    <?php 
        require_once 'header.php';
        session_start();

        require_once 'Dao.php';
        $dao = new Dao();    
    ?>    

    <body>
        <div id="sort">
            <label>
                Sort by:
            </label>
            <select>
                <option value="PriceHL">Price (High to Low)</option>
                <option value="PriceLH">Price (Low to High)</option> 
                <option value="Most Recent">Most Recent</option>
            </select>
        </div>

        <div id="marketplace">
            <ol>
                <?php 
                    $images = $dao->getAllImages();
                    foreach($images->fetchAll() as $img){
                        if($img[3] != 1){
                            echo '<li>
                            <div class="container">
                                <a href="purchase.php?id=' . $img[0] . '"><img alt="' . $img[1] . '" src="' . $img[4] . '">
                                    <div class="content">
                                        <h1>Price: $' . $img[2] .'</h1>
                                    </div>
                                </a>
                            </div>
                        </li>';
                        }
                    }
                ?>
            </ol>
        </div>
    </body>
    <?php 
        require_once 'footer.php';
    ?>
</html>