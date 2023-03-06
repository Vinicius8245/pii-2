<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/projeto/pii-2/controllers/banco.php";

    session_start();
    if(empty($_SESSION)){
        header("Location: login.php");
        exit;
    }

    // Obter o ID do usuário a ser editado a partir dos parâmetros da URL
    $id_usuario = $_GET['id'];

    // Obter os dados atuais do usuário a partir do ID
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
                // Redirecionar de volta para a lista de usuários com uma mensagem de sucesso
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
    <link rel="stylesheet" href="css/editar.css">
    <link rel="icon" href="assets/capa.png">
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário</h1>
    <form action="" method="post">
        <label for="nome">Nome do Usuário:</label>
        <input type="text" name="nome_usuario" id="nome" value="<?php echo $usuario['nm_usuario']; ?>" required>
        <br><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>
        <br><br>
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" value="<?php echo $usuario['nm_email']; ?>" required>
        <br><br>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>