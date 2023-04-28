<!DOCTYPE html>
<html>

<head>
  <title>Listagem de Usuários</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <h1>Listagem de Usuários</h1>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>E-mail</th>
          <th>Senha</th>
        </tr>
      </thead>
      <tbody>
        <?php var_dump($usuarios); ?>
      </tbody>
    </table>
    <a href="" class="btn btn-success">Adicionar Cliente</a>
  </div>

</body>

</html>