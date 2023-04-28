<?php

namespace App\Dao;

use PDO;
use PDOException;

class DBconnection {
  public static function connect() {
    try {
      $conn = new PDO("mysql:host=localhost;dbname=crud/login;charset=utf8mb4", "root", "");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // define o modo de erro para exceções
      return $conn;
    } catch (PDOException $e) {
      echo "Erro de conexão: " . $e->getMessage();
    }
  }
}
