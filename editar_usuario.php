<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/projeto/pii-2/controllers/banco.php";

    session_start();
    if(empty($_SESSION)){
        header("Location: login.php");
        exit;
    }
    $id_usuario = $_GET['id'];
    $sql = "SELECT * FROM pizzaria.tb_usuario WHERE id_usuario = :id_usuario";
    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id_usuario', $id_usuario);
        if($stmt->execute()) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            die("Falha ao executar a SQL...");
        }
    } catch(PDOException $e) {
        die($e->getMessage());
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['nome_usuario'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $sql = "UPDATE pizzaria.tb_usuario SET nm_usuario = :nome, nm_email = :email, sn_senha = :senha WHERE id_usuario = :id_usuario";
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':senha', $senha);
            $stmt->bindValue(':id_usuario', $id_usuario);
            if($stmt->execute()) {
                header("Location: listaUsuario.php?mensagem=Usuário atualizado com sucesso");
                exit;
            } else {
                die("Falha ao executar a SQL...");
            }
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="icon" href="assets/capa.png">
    <title>Editar Usuário</title>
</head>
<body>
<div class="container mt-5">
        <h1>Editar Usuário</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="nome">Nome do Usuário:</label>
                <input type="text" name="nome_usuario" id="nome" value="<?php echo $usuario['nm_usuario']; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" value="<?php echo $usuario['nm_email']; ?>" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</html>