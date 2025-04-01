<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inga_luz_db";
$port = 3308;

try {
    $conn = new mysqli($servername, $username, $password, null, $port);
    
    if ($conn->connect_error) {
        throw new Exception("Conexão falhou: " . $conn->connect_error);
    }

    // Criar banco e selecionar
    $conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
    $conn->select_db($dbname);
    $conn->set_charset("utf8mb4");

    // Criar tabela
    $sql = "CREATE TABLE IF NOT EXISTS newsletter (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        telefone VARCHAR(20) NOT NULL,
        endereco VARCHAR(200) NOT NULL,
        cidade VARCHAR(100) NOT NULL,
        data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    
    $conn->query($sql);
    
} catch (Exception $e) {
    die("Erro de conexão: " . $e->getMessage());
}
?>
