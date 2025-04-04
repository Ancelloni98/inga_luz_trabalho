<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('DB_HOST', '192.168.0.100');
define('DB_USER', 'ingaluzc_inga_luz_db');
define('DB_PASS', 'Biel210598');
define('DB_NAME', 'inga_luz_db');
define('DB_PORT', 3308);

try {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
    
    if ($conn->connect_error) {
        throw new Exception("Conexão falhou: " . $conn->connect_error);
    }

    $conn->set_charset("utf8mb4");
    
} catch (Exception $e) {
    die("Erro de conexão: " . $e->getMessage());
}
?>
