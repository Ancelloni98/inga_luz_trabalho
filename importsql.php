<?php
if (!isset($conn)) {
    require_once 'config.php';
}

try {
    $sql_file = __DIR__ . '/inga_luz_db.sql';
    
    if (!file_exists($sql_file)) {
        throw new Exception("Arquivo SQL não encontrado");
    }

    $sql = file_get_contents($sql_file);
    
    if ($conn->multi_query($sql)) {
        do {
            // Consumir todos os resultados
            if ($result = $conn->store_result()) {
                $result->free();
            }
        } while ($conn->more_results() && $conn->next_result());
        
        if (!headers_sent()) {
            echo "Banco de dados importado com sucesso!";
        }
    } else {
        throw new Exception("Erro ao importar: " . $conn->error);
    }

} catch (Exception $e) {
    die("Erro: " . $e->getMessage());
}
?>