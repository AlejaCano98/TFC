<?php    
require '../database/database.php';

    $usuario = $_GET['idUser'];
    $idJuego = $_GET['idVideoJuego'];
    $opcion = $_GET['opcion'];



    try {
        $sql = "SELECT * FROM jugado where id_usuario = ".$usuario." and id_videojuego = ".$idJuego;
        $sentencia = $conn->prepare($sql);
        $sentencia->execute();

        if($resultado =$sentencia->fetch()){
            $sql = "UPDATE jugado set seleccion = '".$opcion."' where id_usuario = ".$usuario." and id_videojuego = ".$idJuego;
            $sentencia = $conn->prepare($sql);
            $sentencia->execute();
        }else{
            $sql = "INSERT into jugado (id_usuario, id_videojuego, seleccion) VALUES (".$usuario.",".$idJuego.",'".$opcion."')";
            $sentencia = $conn->prepare($sql);
            $sentencia->execute();
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }  
