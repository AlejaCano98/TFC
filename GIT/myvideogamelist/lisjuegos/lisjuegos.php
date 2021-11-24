<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" type="text/css" href="main-lisjuegos.css">
    <link rel="shortcut icon" type="image/jpg" href="../img/favicon.ico"/> 
    <title> Myvideogamelist | Busca videojuegos </title>
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
        <!--RELLENAR CON LISTADO DE JUEGOS-->
        <footer class="footer-distribucion">
            <div class="footer-contenido">
                <p class="footer-links">
                    <a href="#">Arriba</a>
                    <a href="../registro/registro.php">Registro</a>
                    <a href="mailto:mvladmin@myvideogamelist.com">Contacto</a>
                </p>
                <p>MyVideogameList &copy; 2021</p>
            </div>
        </footer>
    </body>
    </html>