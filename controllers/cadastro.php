<?php

function db_insert_teste($codigo, $nome, $senha, $email) {
	global $conn;
	$sql = "INSERT INTO pizzaria.tb_usuario (id_usuario, nm_usuario, sn_senha, nm_email)
	VALUES ($codigo,'$nome', '$senha', '$email');";
    $conn->query($sql);
	//return $conn->insert_id;
	return null;
}

require_once("banco.php");

// verificação da chegada de dados
var_dump($_REQUEST);

// atribuição dos campos para variáveis
$cod = $cod + 4;
$usuario = $_REQUEST['nome'];
$senha = $_REQUEST['senha'];
$email = $_REQUEST['email'];



// chamada da função
db_insert_teste($cod, $usuario , $senha, $email);

?>