<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" type="text/css" href="main-lisjuegos.css">
    <link rel="shortcut icon" type="image/jpg" href="../img/favicon.ico"/> 
    <script src="myvideogame.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
            <div class="reg">
                <?php
                    require '../database/database.php';

                    $opciones = ["Completado", "Jugando", "Planeado"];
                    try {
                        $sql = "SELECT videogames.id_videojuego as idJuego, titulo, consola,año,pegi,id_usuario,seleccion 
                        FROM videogames left join jugado on videogames.id_videojuego = jugado.id_videojuego 
                        group by idJuego";
                        $sentencia = $conn->prepare($sql);
                        $sentencia->execute();
                        
                        echo "<table> <th colspan=4>Lista de Videojuegos</th> <tbody>";
                        echo '<tr>
                        <th>Titulo</th>
                        <th>Consola</th>
                        <th>Año</th>
                        <th>Pegi</th>';
                        if(isset($_SESSION["user_id"]))
                            echo '<th>Estado</th>';
                        echo '</tr>';
                        while ($row = $sentencia->fetch()) {

                            echo "<tr>";
                            echo "<td>".$row["titulo"]."</td>";
                            echo "<td>".$row["consola"]."</td>";
                            echo "<td>".$row["año"]."</td>";
                            echo "<td>".$row["pegi"]."</td>";
                            if(isset($_SESSION["user_id"])){
                                echo "<td>";
                                echo "<select name='".$row["idJuego"]."' onchange='actualizarRegistro(".$row["idJuego"].",".$_SESSION['idUsuario'].")'>";
                                echo "<option value=''>Selecciona un estado</option>";
                                for ($i=0; $i < count($opciones); $i++) { 
                                    if($row["seleccion"] == $opciones[$i] && $row["id_usuario"] == $_SESSION['idUsuario'])
                                    echo "<option value =".$opciones[$i]." selected>".$opciones[$i]."</option>";
                                    else
                                    echo "<option value =".$opciones[$i].">".$opciones[$i]."</option>";
                                }
                                echo "</select>";
                                echo "</td>";
                            }
                            echo "</tr>";
                            
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