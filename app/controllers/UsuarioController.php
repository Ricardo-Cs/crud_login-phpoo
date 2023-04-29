<?php

namespace App\Controllers;

use App\Dao\UsuarioDao;
use App\Models\UsuarioModel;

class UsuarioController {
  public function insert($dados) {
    // Recebe os dados do formulário via POST
    $nome = $dados[0];
    $email = $dados[1];
    $senha = md5($dados[2]);

    // Cria uma instância do modelo com os dados recebidos
    $usuarioModel = new UsuarioModel();
    $usuarioModel->setNome($nome);
    $usuarioModel->setEmail($email);
    $usuarioModel->setSenha($senha);

    // Passa a instância do modelo para o DAO inserir no banco de dados
    $usuarioDao = new UsuarioDao();
    $usuarioDao->insert($usuarioModel);
  }

  public function get() {
    $dao = new UsuarioDao();
    $usuarios = $dao->get();
    return $usuarios;
  }

  public function getById($id) {
    $dao = new UsuarioDao();
    $usuario = $dao->getById($id);
    return $usuario;
  }

  public function update($dados) {
    $nome = $dados[0];
    $email = $dados[1];
    $senha = $dados[2];
    $id = $dados[3];

    $usuarioModel = new UsuarioModel();
    $usuarioModel->setNome($nome);
    $usuarioModel->setEmail($email);
    $usuarioModel->setSenha($senha);
    $usuarioModel->setId($id);

    $usuarioDao = new UsuarioDao();
    $usuarioDao->update($usuarioModel);
  }

  public function delete($id) {
    $usuarioDao = new UsuarioDao();
    $usuarioDao->delete($id);
  }
}
