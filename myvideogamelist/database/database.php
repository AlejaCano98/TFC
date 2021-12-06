<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'php_login_database';

    $conn = new PDO("mysql:host=$server;dbname=$database;",$username, $password);




?>