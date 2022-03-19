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
    $this->logger = new KLogger ( "log.txt" , KLogger::WARN );
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
  public function deleteComment ($id) {
     $this->logger->LogInfo("comment deleted, id=[{$id}]");
    
    $conn = $this->getConnection();
    $deleteQuery = "DELETE FROM comment WHERE comment_id = :id";
    $q = $conn->prepare($deleteQuery);
    $q->bindParam(":id", $id);
    $q->execute();
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
    $q->execute();
  }


  public function getComments () {
    $conn = $this->getConnection();
    return $conn->query("SELECT * FROM comment ORDER BY date_entered DESC");
  }
} // end Dao