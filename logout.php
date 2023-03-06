<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/projeto/pii-2/controllers/verificarLogin.php";

if(isset($_SESSION['username'])){
    session_destroy();
    header("Location:login.php");
}
?>