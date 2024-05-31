<?php

@include './config.php';

$conn = new mysqli('localhost', 'root', '', 'user-data');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

return $conn;
