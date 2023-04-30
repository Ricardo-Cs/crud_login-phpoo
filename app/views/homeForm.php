<?php

include '../../vendor/autoload.php';

use App\Controllers\UsuarioController;

$usuario = new UsuarioController();

// Verifica se existe um id no GET(url), se existir armazena na variável e usa o método getById. 
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $usuarioInfo = $usuario->getById($id);
}

// Verifica se existe um excluir no GET(url), se sim deleta o usuário que tem o ID de acordo com o passado na url pelo GET.
if (isset($_GET['excluir'])) {
  $id = $_GET['id'];
  $usuarioDel = $usuario->delete($id);
  header('Location: ./home.php');
}

// Caso os valores enviados pelo POST não existam no banco de dados, insere eles, se já existir ele faz o update.
if (isset($_POST['nome'])) {
  if (empty($_POST['id'])) {
    $usuario->insert([$_POST['nome'], $_POST['email'], $_POST['senha']]);
  } else {
    $usuario->update([$_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['id']]);
  }
  header('Location: ./home.php');
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adicionar Usuário</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body style="background-color: #F2F2F2;">

  <main class="container pt-3">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form method="post">
          <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" name="nome" id="name" placeholder="Digite seu nome" value="<?= isset($usuarioInfo['nome']) ? $usuarioInfo['nome'] : null ?>">
          </div>
          <div class=" form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu e-mail" value="<?= isset($usuarioInfo['email']) ? $usuarioInfo['email'] : null  ?>">
          </div>
          <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha" value="<?= isset($usuarioInfo['senha']) ? $usuarioInfo['senha'] : null  ?>">
          </div>

          <!-- Campo invisível para enviar o id pelo método POST, utilizo ele no php no começo do código -->
          <input type="hidden" name="id" value="<?= isset($usuarioInfo['id']) ? $usuarioInfo['id'] : null ?>">

          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </div>
    </div>
  </main>



  <!-- Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>