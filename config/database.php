<?php 
  class Database {
 
    private $host = 'localhost';
    private $db_name = 'lapodrom';
    private $username = 'root';
    private $password = '';
    private $conn;
 
    public function connect() {
      $this->conn = null;
      try { 
          //zbog nasih slova ide [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password, [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]);  
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }
      return $this->conn;      
    }
   
  }
  
  ?>