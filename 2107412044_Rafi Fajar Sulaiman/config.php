<?php
    $host = "localhost:3306";
    $user = "root";
    $pass = "";
    $db = "rafi";

    $conn = mysqli_connect($host, $user, $pass, $db);

    if (!$conn) die("Connection Failed : " . mysqli_connect_error());
?>