<?php
try {
	$pdo = new PDO('mysql:host=localhost;dbname=cart;port=3309', 'root', 'root');
} catch (PDOException $e) {
	die('Error: ' . $e->getMessage());
}
?>