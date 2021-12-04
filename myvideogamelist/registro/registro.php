<?php

  require '../database/database.php';

  $message = '';

  if (!empty($_POST['usuario']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (usuario, email, password) VALUES (:usuario, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':usuario', $_POST['usuario']);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Usuario creado correctamente';
    } else {
      $message = 'Error, el usuario no ha podido ser creado';
    }
  }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" type="text/css" href="main-registro.css">
    <link rel="shortcut icon" type="image/jpg" href="../img/favicon.ico"/> 
    <title> Myvideogamelist | Registro </title>
</head>
    <body>

        <div class="nav-contenido">
        <?php
session_start();
echo '<header>
                <a  class="inicio" href="../index.php">Myvideogamelist</a>
            <nav>
                <ul>
                    <li><a href="../lisjuegos/lisjuegos.php">Busca videojuegos</a></li>';
                    if(isset($_SESSION["user_id"])){
                        echo '<li><a href="../milista/milista.php"> '.$_SESSION["user_id"].' </a></li>';
                        echo '<li><a href="../salir/logout.php">Salir</a></li>';
                    }
                    else
                        echo '<li><a href="../acceso/acceso.php">Acceso</a></li>';
                   
                    echo "</ul>
                    </nav>
                    </header>";
?>
        </div>
        <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
        <div class="reg">
            <h1>Formulario de registro</h1>
                 <form action="registro.php" method="POST">
                        <input type="text" name="usuario" placeholder="Usuario"/> 
                        <input type="text" name="email" placeholder="Correo electronico"/>
                        <input type="password" name="password" placeholder="Constraseña"/>
                        <input type="submit" class="btn btn-primary btn-block btn-large" value="¡Registrate!">
                 </form>       
        </div>
                <footer class="footer-distribucion">
                    <div class="footer-contenido">
                        <p class="footer-links">
                             <a href="../acceso/acceso.php">Acceso</a>
                             <a href="mailto:mvladmin@myvideogamelist.com">Contacto</a>
                        </p>
                <p>MyVideogameList &copy; 2021</p>
            </div>
        </footer>
    </body>
    </html>