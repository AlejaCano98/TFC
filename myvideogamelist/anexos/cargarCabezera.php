<?php
session_start();
echo '<header>
                <a  class="inicio" href="index.php">Myvideogamelist</a>
            <nav>
                <ul>
                    <li><a href="./lisjuegos/lisjuegos.php">Busca videojuegos</a></li>';
                    if(isset($_SESSION["user_id"])){
                        echo '<li><a href="./milista/milista.php"> '.$_SESSION["user_id"].' </a></li>';
                        echo '<li><a href="./salir/logout.php">Salir</a></li>';
                    }
                    else
                        echo '<li><a href="./acceso/acceso.php">Acceso</a></li>';
                   
                    echo "</ul>
                    </nav>
                    </header>";
?>