<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/projeto/pii-2/controllers/banco.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM pizzaria.tb_usuario WHERE nm_usuario = '$username' AND sn_senha = '$password'";

$result = pg_query($conn, $query) or die('A consulta falhou: ' . pg_last_error());

if (pg_num_rows($result) > 0) {
  $_SESSION['logged_in'] = true;
  $_SESSION['username'] = $username;
  
  header("Location: protected_page.php");
  exit;
} else {
  echo "Nome de usuário ou senha inválido";
}
?>