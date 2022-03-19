<html>
    <?php
        require_once 'header.php';
        session_start();
        
        if(!isset($_SESSION['user_id'])){
            $_SESSION['login_messages'] = " id=bad_message> Please login before browsing";
            header('Location: index.php');
            exit();
        }

        require_once 'Dao.php';
        $dao = new Dao();
    ?>    

    <body>
        <div id="leaderboard">
            <table id="lead_table">
                <tr>
                    <th>Position</th>
                    <th> Name</th>
                    <th>Money</th>
                </tr>

                <?php
                    $count = 1;
                    //TODO: work on validating usernames
                    $users = $dao->getUsers();
                    foreach($users->fetchAll() as $user){
                        echo '<tr>';
                        echo '<td>' . $count . '.</td>';
                        echo '<td>' . htmlspecialchars($user[1]) . '</td>';
                        echo '<td>$' . $user[3] . '</td>';
                        echo '</tr>';
                        $count++;
                    }
                    

                ?>
                
                <!-- <tr>
                    <td>1.</td>
                    <td>Connor Espino</td>
                    <td>$999999</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Conrad Kennington</td>
                    <td>$5</td>
                </tr> -->
            </table>
        </div>
    </body>
</html>