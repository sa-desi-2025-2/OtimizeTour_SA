<?php
$host = 'localhost';
$dbname = 'otimizetour';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
    echo "Erro de conexão com o banco de dados.";
}
?>