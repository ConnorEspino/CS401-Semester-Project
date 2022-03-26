<?php
// Dao.php
// class for saving and getting comments from MySQL
require_once 'KLogger.php';
class Dao {

  private $logger = null;

  private $host = "us-cdbr-east-05.cleardb.net";
  private $db = "heroku_d2986c11f876e40";
  private $user = "b966e0630c55e7";
  private $pass = "9e728f00";

  public function __construct() {
    $this->logger = new KLogger ( "log.txt" , KLogger::INFO );
  }

  public function getConnection () {
    $this->logger->LogDebug("getting a connection...");
    try {
      return
        new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
    } catch (Exception $e) {
       $this->logger->LogFatal("The database exploded " . print_r($e,1));
       exit;
    }
  }

  public function registerUser($username, $password){
    $conn = $this->getConnection();
    $saveQuery =
        "INSERT INTO user
        (username, password)
        VALUES
        (:username, :password)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":username", $username);
    $q->bindParam(":password", $password);
    $this->logger->LogInfo("Registering user: {$username} with password: {$password}");
    $q->execute();
  }

  public function login($user, $pass){
    $conn = $this->getConnection();
    $selectQuery = "SELECT * FROM user WHERE username = :username AND password = :password";
    $q = $conn->prepare($selectQuery);
    $q->bindParam(":username", $user);
    $q->bindParam(":password", $pass);
    $q->execute();
    return $q->rowCount() > 0;
  }

  public function isUser($username) {
    $conn = $this->getConnection();
    $selectQuery = "SELECT * FROM user WHERE username = :username";
    $q = $conn->prepare($selectQuery);
    $q->bindParam(":username", $username);
    $q->execute();
    return $q->rowCount() > 0;
  }

  public function getId($username) {
    $conn = $this->getConnection();
    $selectQuery = "SELECT user_id FROM user WHERE username = :username";
    $q = $conn->prepare($selectQuery);
    $q->bindParam(":username", $username);
    $q->execute();
    return $q->fetchColumn(0);
  }

  public function getUser($id) {
    $conn = $this->getConnection();
    $selectQuery = "SELECT username FROM user WHERE user_id = :id";
    $q = $conn->prepare($selectQuery);
    $q->bindParam(":id", $id);
    $q->execute();
    return $q->fetchColumn(0);
  }

  public function getPass($id) {
    $conn = $this->getConnection();
    $selectQuery = "SELECT password FROM user WHERE user_id = :id";
    $q = $conn->prepare($selectQuery);
    $q->bindParam(":id", $id);
    $q->execute();
    return $q->fetchColumn(0);
  }

  public function getBalance($id) {
    $conn = $this->getConnection();
    $selectQuery = "SELECT balance FROM user WHERE user_id = :id";
    $q = $conn->prepare($selectQuery);
    $q->bindParam(":id", $id);
    $q->execute();
    return $q->fetchColumn(0);
  }

  //Increments the balance of a user by 5
  public function incrementBal($id) {
    $conn = $this->getConnection();
    $insertQuery = "UPDATE user SET balance=balance+5 WHERE user_id = :id";
    $q = $conn->prepare($insertQuery);
    $q->bindParam(":id", $id);
    $q->execute();
  }

  //Returns an array of every user
  public function getUsers(){
    $conn = $this->getConnection();
    return $conn->query('SELECT * FROM user ORDER BY balance DESC;');
  }

  //Adds a new image into the database
  public function addImage($title, $price, $rel_path){
    $conn = $this->getConnection();
    $saveQuery =
        "INSERT INTO image
        (title, price, rel_path)
        VALUES
        (:title, :price, :rel_path)";
    $q = $conn->prepare($saveQuery);
    $q->bindParam(":title", $title);
    $q->bindParam(":price", $price);
    $q->bindParam(":rel_path", $rel_path);
    $q->execute();
  }

  //Removes an image from the database
  public function deleteImage($id){
    $conn = $this->getConnection();
    $deleteQuery = "DELETE FROM image WHERE img_id = :id";
    $q = $conn->prepare($deleteQuery);
    $q->bindParam(":id", $id);
    $q->execute();
  }

  //Returns the relative path of the image from the database
  public function getImgPath($id){
    $conn = $this->getConnection();
    $selectQuery = "SELECT rel_path FROM image WHERE img_id = :id";
    $q = $conn->prepare($selectQuery);
    $q->bindParam(":id", $id);
    $q->execute();
    return $q->fetchColumn(0);
  }

  //Returns an array of all images in the database
  public function getAllImages(){
    $conn = $this->getConnection();
    return $conn->query('SELECT * FROM image ORDER BY price DESC;');
  }

  //Returns an array of all images that the given user_id owns
  public function getAllOwnedImages($id){
    $conn = $this->getConnection();
    return $conn->query('SELECT * 
    FROM image 
    RIGHT JOIN owned_img ON image.img_id = owned_img.img_id
    ORDER BY price DESC;');
  }

  //Returns the image with the given ID
  public function getImage($id){
    $conn = $this->getConnection();
    $selectQuery = "SELECT * FROM image WHERE img_id = :id";
    $q = $conn->prepare($selectQuery);
    $q->bindParam(":id", $id);
    $q->execute();
    return $q->fetchObject();
  }

  //Sets the status of an image to 1
  public function setImageStatusBought($id){
    $conn = $this->getConnection();
    $updateQuery = "UPDATE image SET status = 1 WHERE img_id = :id";
    $q = $conn->prepare($updateQuery);
    $q->bindParam(":id", $id);
    $q->execute();
  }

  //Inserts a new row into the owned_image table which sells the image
  public function buyImage($userId, $imgId){
    $conn = $this->getConnection();
    $insertQuery = "INSERT INTO owned_img (user_id, img_id) VALUES (:userId, :imgId)";
    $q = $conn->prepare($insertQuery);
    $q->bindParam(":userId", $userId);
    $q->bindParam(":imgId", $imgId);
    $q->execute();
  }

  //Decrements the balance of the given user by the given amount
  public function subtractBalance($userId, $sub){
    $conn = $this->getConnection();
    $updateQuery = "UPDATE user SET balance = balance - :sub WHERE user_id = :id";
    $q = $conn->prepare($updateQuery);
    $q->bindParam(":sub", $sub);
    $q->bindParam(":id", $userId);
    $q->execute();
  }

} // end Dao