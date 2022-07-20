<?php
class Database {
  //DB Params
  private $host = 'localhost';
  private $db_name = 'visio_sfc';
  private $username = 'root';
  private $password = '';
  private $conn;

  // methode de connxexion 
  public function connect() {
    $this->conn = null;
    try{
      $this->conn = new PDO('mysql:host=' . $this->host . ';dbname =' . $this->db_name, $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e) {
      echo 'Problème la connexion à la DB à échoué' . $e->getMessage();
    }
    return $this->conn;
  }

}