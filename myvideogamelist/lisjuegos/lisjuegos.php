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
            <div>
                <table>
                <tbody class="enunciado">
                    <tr>
                        <th colspan="6"> VIDEOJUEGOS </th>
                </tbody>
                <tbody class="enunciado">
                    <tr>
                        <th>Titulo</th>
                        <th>Consola</th>
                        <th>Pegi</th>
                        <th>Año</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                </tbody>
                <tbody class="titulos">    
                    <tr>
                        <td>The Legend of Zelda Breath of the Wild</td>
                        <td>Nintendo Switch</td>
                        <td>+13</td>
                        <td>2017</td>
                        <td> <select name="Estado">
                                <option value="1">Completo</option> 
                                <option value="2">Jugando</option> 
                                <option value="3">Planeado</option>
                        </td>
                        <td> <button type="submit">Guardar</button> </td>
                    </tr>
                </tbody>
                <tbody class="titulos">    
                    <tr>
                    <td>Pokémon Diamante Brillante y Perla Reluciente </td>
                        <td>Nintendo Switch</td>
                        <td>+7</td>
                        <td>2021</td>
                        <td> <select name="Estado">
                                <option value="1">Completo</option> 
                                <option value="2">Jugando</option> 
                                <option value="3">Planeado</option>
                        </td>
                        <td> <button type="submit">Guardar</button> </td>
                    </tr>
                </tbody>
                </table>
            </div>
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