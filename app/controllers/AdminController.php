<?php

namespace App\Controllers;

use App\Dao\AdminDao;

class AdminController {
  public function validLogin($dados) {
    $dao = new AdminDao();
    $verifica = $dao->validLogin($dados);
    return $verifica;
  }
}
