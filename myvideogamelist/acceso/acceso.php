<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
  }
  require '../database/database.php';

  if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id_usuario, usuario, password FROM users WHERE usuario = :usuario');
    $records->bindParam(':usuario', $_POST['usuario']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['usuario'];
      header("Location: ../index.php"); 
    } else {
      $message = 'Error, el usuario y contraseña no coinciden';
    }
  }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" type="text/css" href="main-acceso.css">
    <link rel="shortcut icon" type="image/jpg" href="../img/favicon.ico"/> 
    <title> Myvideogamelist | Acceso </title>
</head>
    <body>
        <div class="nav-contenido">
        <header>
                <a  class="inicio" href="../index.php">Myvideogamelist</a>
            <nav>
                <ul>
                    <li><a href="../lisjuegos/lisjuegos.php">Busca videojuegos</a></li>
                    <li><a href="acceso.php">Acceso</a></li>
                </ul>
            </nav>
        </header>
        <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
        </div>
        <div class="login">
	       <h1>Inicio de sesión</h1>
                <form action="acceso.php" method="POST">
    	               <input type="text" name="usuario" placeholder="Usuario"/>
                       <input type="password" name="password" placeholder="Constraseña"/>
                       <input type="submit" class="btn btn-primary btn-block btn-large" value="¡Inicia!">
                </form>       
        </div>
                <footer class="footer-distribucion">
                    <div class="footer-contenido">
                        <p class="footer-links">
                            <a href="../registro/registro.php">Registrate</a>
                            <a href="mailto:mvladmin@myvideogamelist.com">Contacto</a>
                        </p>
                <p>MyVideogameList &copy; 2021</p>
            </div>
        </footer>
    </body>
    </html>