<?php
$host = 'localhost';
$dbname = 'payment_db';
$username = 'User'; // Par défaut sur la plupart des images GNS3
$password = 'User@0707';     // Souvent vide ou 'cisco' ou 'gns3'

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
session_start();
?>