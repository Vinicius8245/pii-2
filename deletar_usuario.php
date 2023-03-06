<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . "/projeto/pii-2/controllers/banco.php";
    $id_usuario = $_GET['id'];

    $sql = "DELETE FROM pizzaria.tb_usuario WHERE id_usuario = :id_usuario ";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        header("Location: listaUsuario.php");
        echo '<script>alert("Usuário deletado com sucesso!");</script>'; 
        exit;
    } catch(PDOException $e) {
        die($e->getMessage());
    }
?>