<?php 
      session_start();
      if(!isset($_SESSION['username'])){
        header('Location: login.php');
      }
        
?> 
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="icon" href="assets/capa.png">
    <title>Pizzaria 1999</title>


</head>
    <header id="topo">
        <nav>
            <img id="logo" src="assets/logo.PNG" alt="Pizzaria 1999">
            <ul id="lista">
                
                <li><a href="#menu">Menu</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="listaUsuario.php">Usuários</a></li>
                <li><a href="novoCadastro.html">Cadastro</a></li>
                <button  type=submit><a href="logout.php">Logout</a>
                <?php 
                
                    
                ?>
                </button>
            </ul>
        </nav>
    </header>
<body>
    <main id="corpo">
        <section id="primeira_pagina">
            <img  id="imagem_home" src="assets/principal.PNG" alt="Pizzaria 1999">
        </section>
        <section id="menu">
            <h1>Seja Bem Vindo a Pizzaria 1999,<?php echo $_SESSION['username'];  ?> </h1>
            <div id="lista_pizzas">
                <div id="card_1">
                    <h2>• Pizza de Calabresa</h2>
                    <img src="assets/1.png" alt="Calabresa">
                </div>
                <div id="card_2">
                    <h2>• Pizza Vegetariana</h2>
                    <img src="assets/2.png" alt="Vegetariana">
                </div>
                <div id="card_3">
                    <h2>• Pizza de Margherita</h2>
                    <img src="assets/3.png" alt="Margherita">
                </div>
                <div id="card_4">
                    <h2>• Pizza de Peperoni</h2>
                    <img src="assets/4.png" alt="Peperoni">
                </div>
                 
            </div>
        </section>
        <section id="about">
            <h2>Sobre Nós</h2>
            <p id="teste">A Pizzaria do 1999 foi fundada em 2022 e desde então, temos orgulho de oferecer as <br>
                melhores pizzas da cidade. Todos os nossos ingredientes são fresco se de qualidade.
            </p>
            <br><br>
            <pre>
            • A empresa 1999 Pizza de CNPJ 48.025.312/0001-86, fundada em 21/09/2022 e com razão <br>
            social 1999 Pizza LTDA, está localizada na cidade Porto Alegre do estado Rio Grande <br>
            do Sul. Sua atividade principal, conforme a Receita Federal, é 56.20-1-04 - <br>
            Fornecimento de alimentos preparados preponderantemente para consumo domiciliar.
            </pre>
            <br><br><br><br><br><br><br>
        </section>
        
    </main>
    
</body>
</html>
