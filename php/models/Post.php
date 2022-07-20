<?php
  class Post{
    //DB stuff
    private $conn;
    private $table = 'users';

    // Post Poroperties
    public $id_users;
    public $email;
    public $password;
    public $lastname;
    public $firstname;
    public $level;

    // Création d'un constructeur
    public function __construct($db) {
      $this->conn = $db;
    }

    // Method GET les users et les lires
    public function read() {
      // Create query
      $query = 'SELECT 
                c.users as id_users,
                p.email,
                p.password,
                p.lastname,
                p.firstname,
                p.level,
                FROM
                ' . $this->table . ' p
                LEFT JOIN
                  info un ON p.lastname = c.firstname
                ORDER BY
                p.level DESC';

      // Prepare statement
      $stmt = $this->conn->prepare($query);
      // Execution de la query
      $stmt = execute();
      return $stmt;
    }
  }