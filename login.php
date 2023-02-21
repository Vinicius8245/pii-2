<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="icon" href="assets/capa.png">
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
          
          <button type="submit" name="login">Entrar</button>
        </form>
    </div>
    <div class="box">
</body>
</html>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/projeto/pii-2/controllers/banco.php";

  session_start();

  if(isset( $_POST['username']) AND isset( $_POST['password'])){
    $_SESSION['username'] = $_POST['username'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT nm_usuario FROM pizzaria.tb_usuario WHERE nm_usuario = '$username' AND sn_senha = '$password'";



    $result = $conn->prepare($query);
    $result->execute();
    if ($result->rowCount() > 0) {
      $_SESSION['logged_in'] = true;
      $_SESSION['username'] = $username;
    
      header("Location: main.php");
      if(isset($_GET['erro'])){
        $erro = 'É necessário logar para acessar o sistema!';
      }
      exit;
      } else {
    echo "<script> alert('Usuário ou Senha incorretos!'); </script>";
    }
  }

?>