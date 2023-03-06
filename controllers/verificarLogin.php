<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/projeto/pii-2/controllers/banco.php";
    session_start();
    $current_session_id = session_id();
    
    if(isset( $_POST['username']) AND isset( $_POST['password'])){
      $_SESSION['username'] = $_POST['username'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $query = "SELECT nm_usuario FROM pizzaria.tb_usuario WHERE nm_usuario = '$username' AND sn_senha = '$password'";
      echo"$password";
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
