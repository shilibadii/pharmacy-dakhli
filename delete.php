<?php
session_start();
include 'connexion.php';
// If the user is not logged in, redirect to the login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}
$productId = $_GET['id'];
$sql = "DELETE FROM products WHERE id = $productId";
$stmt = $pdo->prepare($sql);
$stmt->execute();
header('Location: medecins.php');
    exit;
?>