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
                <li><a href="#about">Sobre</a></li>
                <li><a href="cadastro.html">Cadastro</a></li>
            </ul>
        </nav>
    </header>
<body>
    <main id="corpo">
        <section id="primeira_pagina">
            <img  id="imagem_home" src="assets/principal.PNG" alt="Pizzaria 1999">
        </section>
        <section id="menu">
            <h1>Menu</h1>
            <div id="lista_pizzas">
                <div id="card_1">
                    <h2>• Pizza de Calabresa</h2>
                    <img src="assets/pizza_calabresa.png" alt="Calabresa">
                </div>
                <div id="card_2">
                    <h2>• Pizza Vegetariana</h2>
                    <img src="assets/pizza_vegetariana.png" alt="Vegetariana">
                </div>
                <div id="card_3">
                    <h2>• Pizza de Margherita</h2>
                    <img src="assets/pizza_margherita.png" alt="Margherita">
                </div>
                <div id="card_4">
                    <h2>• Pizza de Peperoni</h2>
                    <img src="assets/pizza_peperoni.png" alt="Peperoni">
                </div>
                 
            </div>
        </section>
        <section id="about">
            <h2>Sobre Nós</h2>
            <p>A Pizzaria do Zé foi fundada em 1990 e desde então, temos orgulho de oferecer as melhores pizzas da cidade. Todos os nossos ingredientes são frescos e de qualidade.</p>
        </section>
        <section id="login">
        </section>
    </main>
    <?php 
        include_once $_SERVER['DOCUMENT_ROOT'] . "/projeto/pii-2/controllers/banco.php";
        include_once $_SERVER['DOCUMENT_ROOT'] . "/projeto/pii-2/controllers/verificarLogin.php";
    ?> 
</body>
</html>
