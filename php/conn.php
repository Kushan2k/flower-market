<?php
session_start();
$username = 'root';
$password = '';
$host = 'localhost';
$dbname = 'flower_market';


$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    $_SESSION['db-error'] = "Error connecting to database";
    header('Localhost:../index.php');
}
