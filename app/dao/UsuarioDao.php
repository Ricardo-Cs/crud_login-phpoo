<?php

namespace App\Dao;

use App\Models\UsuarioModel;
use PDOException;

class UsuarioDao {
  private $conexao;

  public function __construct() {
    $this->conexao = DBconnection::connect();
  }

  public function get() {
    $sql = 'SELECT * FROM usuarios';
    $stmt = $this->conexao->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
      return $resultado;
    } else {
      return [];
    }
  }

  public function getById($id) {
    $sql = 'SELECT * FROM usuarios WHERE id = ?';
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(1, $id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);
      return $resultado;
    } else {
      return [];
    }
  }

  public function insert(UsuarioModel $usuarioModel) {
    $sql = 'INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)';

    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(1, $usuarioModel->getNome());
    $stmt->bindValue(2, $usuarioModel->getEmail());
    $stmt->bindValue(3, $usuarioModel->getSenha());

    try {
      $stmt->execute();
    } catch (PDOException $e) {
      echo "Erro ao inserir usuário: " . $e->getMessage();
    }
  }

  public function update(UsuarioModel $usuarioModel) {
    $sql = 'UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE id = ?';

    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(1, $usuarioModel->getNome());
    $stmt->bindValue(2, $usuarioModel->getEmail());
    $stmt->bindValue(3, $usuarioModel->getSenha());
    $stmt->bindValue(4, $usuarioModel->getId());

    try {
      $stmt->execute();
    } catch (PDOException $e) {
      echo "Erro ao editar usuário: " . $e->getMessage();
    }
  }

  public function delete($id) {
    $sql = 'DELETE FROM usuarios WHERE id = ?';

    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(1, $id);

    try {
      $stmt->execute();
    } catch (PDOException $e) {
      echo "Erro ao deletar usuário: " . $e->getMessage();
    }
  }
}
