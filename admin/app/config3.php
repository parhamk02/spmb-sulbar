<?php
    $host   = 'localhost'; // atur host
    $user   = 'root'; // atur user database
    $pass   = '';   // atur pass database
    $dbname = 'ppdbbpmp3434'; // atur nama database

    $connectdb = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
?>