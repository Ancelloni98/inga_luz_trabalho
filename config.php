<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

<<<<<<< HEAD
define('DB_HOST', '192.168.0.100');
define('DB_USER', 'ingaluzc_inga_luz_db');
define('DB_PASS', 'Biel210598');
define('DB_NAME', 'inga_luz_db');
define('DB_PORT', 3308);

try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
=======
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inga_luz_db";
$port = 3308;

try {
    $conn = new mysqli($servername, $username, $password, null, $port);
>>>>>>> ef6bd75 (Revert to commit cc7678f)
    
    if ($conn->connect_error) {
        throw new Exception("Conexão falhou: " . $conn->connect_error);
    }

<<<<<<< HEAD
    $conn->set_charset("utf8mb4");
=======
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
>>>>>>> ef6bd75 (Revert to commit cc7678f)
    
} catch (Exception $e) {
    die("Erro de conexão: " . $e->getMessage());
}
<<<<<<< HEAD
?>
=======
?>
>>>>>>> ef6bd75 (Revert to commit cc7678f)
