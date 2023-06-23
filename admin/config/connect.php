<?php
    $mysqli = new mysqli("localhost: 3307","root","","petshop");

    // Check connection
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: Lỗi" . $mysqli->connect_error;
        exit();
    }
?>