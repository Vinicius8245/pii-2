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
    <link rel="stylesheet" href="css/novalista.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="icon" href="assets/capa.png">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Pizzaria 1999</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="main.php">Início</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="main.php">Cardápio</a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="novoCadastro.html">Cadastro</a>
      </li>
    </ul>
  </div>
</nav>
    <title>Lista de Usuário</title>
</head>
<body>
    <?php if(!empty($usuario)) { ?>
    <table class="table table-hover table-bordered"  >
    <thead class="thead-dark">
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
            <a href="editar_usuario.php?id=<?php echo $a['id_usuario']; ?>">Editar</a>
            </td>
            <td>
            <a href="deletar_usuario.php? id=<?php echo $a['id_usuario']; ?>">Deletar</a>
            </td>
        </tr>
    <?php }  ?>
    </tbody>
    </table>
    <?php }?>
</body>
</html>