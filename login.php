<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Página de Login</title>
  </head>
<body>

    <div id="login">
        <h1>Faça seu Login</h1>
        <form id="formulario" action="login.php" method="POST">
          <label for="name">Digite seu Usuário:</label>
          <input type="text" name="username" required>

          
          <label for="name">Digite a Senha:</label>
          <input type="password" name="password" required>
          
          <button type="submit">Entrar</button>
        </form>
    </div>
    <div class="box">
</body>
</html>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/projeto/pii-2/controllers/banco.php";

  if(isset( $_POST['username']) AND isset( $_POST['password'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $query = "SELECT nm_usuario FROM pizzaria.tb_usuario WHERE nm_usuario = '$username' AND sn_senha = '$password'";

  $result = $conn->prepare($query);
  $result->execute();
  if ($result->rowCount() > 0) {
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $username;
  
    header("Location: main.php");
    exit;
    } else {
  echo "Nome de usuário ou senha inválido";
  echo "<br>",$username;
  }
}

?>