<?php

    require_once("banco.php");
        

    class UsuarioDAO{

        public static function logar($usuario, $senha){
            global $conn;
            $sql = $conn->prepare("select * from  where usuario = ? and senha = ?");
            $sql->bindParam(1, $usuario);
            $sql->bindParam(2, $senha);
            $sql->execute();

            if($sql->fetch()){
                return true;
            } else {
                return false;
            }

        }
    }

?>