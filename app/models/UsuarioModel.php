<?php

namespace App\Models;

class UsuarioModel {
  private $id;
  private $nome;
  private $email;
  private $senha;

  public function getId(): string {
    return $this->id;
  }

  public function setId(String $id): void {
    $this->id = $id;
  }

  public function getNome(): string {
    return $this->nome;
  }

  public function setNome(String $nome): void {
    $this->nome = $nome;
  }

  public function getEmail(): string {
    return $this->email;
  }

  public function setEmail(String $email): void {
    $this->email = $email;
  }

  public function getSenha(): string {
    return $this->senha;
  }

  public function setSenha(String $senha): void {
    $this->senha = $senha;
  }
}
