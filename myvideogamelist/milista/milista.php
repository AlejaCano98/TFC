<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" type="text/css" href="main-milista.css">
    <link rel="shortcut icon" type="image/jpg" href="../img/favicon.ico"/> 
    <title> Myvideogamelist | Perfil </title>
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
<div class="reg">
                <?php
                    require '../database/database.php';


                    try {
                        $sql = "SELECT año, consola, pegi, videogames.id_videojuego,titulo, seleccion FROM videogames INNER join jugado on videogames.id_videojuego = jugado.id_videojuego where jugado.id_usuario=".$_SESSION['idUsuario']."";
                        $sentencia = $conn->prepare($sql);
                        $sentencia->execute();
                        echo "<table><tbody>";
                        echo '                    <tr>
                        <th>Titulo</th>
                        <th>Consola</th>
                        <th>Año</th>
                        <th>Pegi</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>';
                                    while ($row = $sentencia->fetch()) {
                                        if($row["seleccion"] == ""){
                
                                        }else{
                                        echo "<tr>";
                                        echo "<td>".$row["titulo"]."</td>";
                                        echo "<td>".$row["consola"]."</td>";
                                        echo "<td>".$row["año"]."</td>";
                                        echo "<td>".$row["pegi"]."</td>";
                                        echo "<td>".$row["seleccion"]."</td>"; 
                                        echo "</tr>";
                                        }
                                    }
                                    echo "</tbody></table>";
                    } catch (PDOException $e) {
                        echo 'Error: ' . $e->getMessage();
                    }
                    
                ?>
</div>
                <footer class="footer-distribucion">
            <div class="footer-contenido">
                <p class="footer-links">
                    
                    <a href="../registro/registro.php">Registro</a>
                    <a href="mailto:mvladmin@myvideogamelist.com">Contacto</a>
                </p>
                <p>MyVideogameList &copy; 2021</p>
            </div>
        </footer>
    </body>
    </html>