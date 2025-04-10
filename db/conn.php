<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "dummy_attendance";
	// Create a new PDO instance
	$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

    try{
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        throw new PDOException($e->getMessage());
    }
?>