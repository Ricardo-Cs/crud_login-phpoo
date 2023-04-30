<?php

namespace App\Dao;

use App\Models\AdminModel;
use PDO;

class AdminDao {
  private $conexao;

  public function __construct() {
    $this->conexao = DBconnection::connect();
  }


  public function validLogin($dados) {
    $email = $dados[0];
    $senha = $dados[1];

    $sql = 'SELECT * FROM admin WHERE email = ? and senha = ?';
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(1, $email);
    $stmt->bindValue(2, $senha);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      $resultado = true;
      return $resultado;
    } else {
      $resultado = false;
      return $resultado;
    }
  }
}
