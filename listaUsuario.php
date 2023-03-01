<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . "/projeto/pii-2/controllers/banco.php";

    session_start();
    if(empty($_SESSION)){
        header("Location: login.php");
        exit;
    }
    $usuario = array();
    $sql = "select * from pizzaria.tb_usuario";
    try{
        $stmt = $conn->prepare($sql);
        if($stmt -> execute()){
            $usuario = $stmt ->fetchAll();
        }else{
            die("Falha ao executar a SQL...");
        }
    } catch(PDOException $e){
        die($e->getMessage());
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/lista.css">
    <link rel="icon" href="assets/capa.png">
    <title>Lista de Usuário</title>
</head>
<body>
    <?php if(!empty($usuario)) { ?>
    <table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nome do Usuário</th>
        <th>Senha</th>
        <th>Email</th>
        <th>Editar</th>
        <th>Deletar</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($usuario as $a) { ?> 
        <tr>
            <th><?php echo $a['id_usuario']; ?></th>
            <td><?php echo $a['nm_usuario']; ?></td>
            <td><?php echo $a['sn_senha']; ?></td>
            <td><?php echo $a['nm_email']; ?></td>
            <td>
                <button>Editar</button>
            </td>
            <td>
                <button>Deletar</button>
            </td>
        </tr>
    <?php }  ?>
    </tbody>
    </table>
    <?php }?>
</body>
</html>