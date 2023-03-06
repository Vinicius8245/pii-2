<?php
require_once("banco.php");
function db_insert_teste($nome, $senha, $email) {
	global $conn;
	$sql = "INSERT INTO pizzaria.tb_usuario (nm_usuario, sn_senha, nm_email)
	VALUES ('$nome', '$senha', '$email');";
    $conn->query($sql);
	//return $conn->insert_id;
	return null;
}
echo "<script> alert('Usuário Excluído com Sucesso!'); </script>";
header("Location: /projeto/pii-2/main.php");
$usuario = $_REQUEST['nome'];
$senha = $_REQUEST['senha'];
$email = $_REQUEST['email'];

db_insert_teste($usuario , $senha, $email);
?>