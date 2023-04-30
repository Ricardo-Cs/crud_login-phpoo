<?php
include '../../vendor/autoload.php';

session_start();

use App\Controllers\AdminController;

$admin = new AdminController();
$loginMensagem = false;


// Verifica se o email e senha enviados pelo POST existem na table admin, se existir redireciona para a home.
if (isset($_POST['email'])) {
  $adminInfo = [$_POST['email'], md5($_POST['senha'])];

  $verifica = $admin->validLogin($adminInfo);
  if ($verifica == true) {
    $_SESSION['logado'] = true;
    header('Location: ./home.php');
    exit;
  } else {
    $loginMensagem = true;
  }
}


?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>

  <main class="container pt-3">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2 class="text-center">Login</h2>
        <form method="post">
          <div class=" form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu e-mail">
          </div>
          <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha">
          </div>
          <?php if ($loginMensagem == true) { ?>
            <span>Login inválido</span>
          <?php } ?>


          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </div>
    </div>
  </main>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>