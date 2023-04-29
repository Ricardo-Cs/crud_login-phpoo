<?php
include '../../vendor/autoload.php';

use App\Controllers\UsuarioController;

$usuario = new UsuarioController();
$usuarios = $usuario->get();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listagem de Usuários</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="../../assets/js/script.js" defer></script>
</head>

<body>
  <main class="container pt-3 table-responsive">
    <h1 class="text-center">Listagem de Usuários</h1>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>E-mail</th>
          <th>Senha (MD5)</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($usuarios as $usuario) { ?>
          <tr>
            <td><?= $usuario['id']; ?></td>
            <td><?= $usuario['nome']; ?></td>
            <td><?= $usuario['email']; ?></td>
            <td><?= $usuario['senha']; ?></td>
            <td>
              <a href="./homeForm.php?id=<?= $usuario['id'] ?>" class="btn btn-success btn-sm">Editar</a>
              <a href="./homeForm.php?excluir&id=<?= $usuario['id'] ?>" class="btn btn-danger btn-sm">Excluir</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

    <a href="homeForm.php" class="btn btn-success">Adicionar Cliente</a>


  </main>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>