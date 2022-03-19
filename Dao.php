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

  public function getUsers(){
    $conn = $this->getConnection();
    return $conn->query('SELECT * FROM user ORDER BY balance DESC;');
  }


} // end Dao