<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config.php';

try {
    echo "<h2>Status do Banco de Dados</h2>";
    
    // Testar conexão
    if ($conn->ping()) {
        echo "✅ Conexão MySQL ativa<br>";
        echo "Servidor: " . $conn->server_info . "<br>";
        echo "Versão: " . $conn->server_version . "<br>";
    }
    
    // Verificar se a tabela existe
    $result = $conn->query("SHOW TABLES LIKE 'newsletter'");
    if ($result->num_rows > 0) {
        echo "✅ Tabela 'newsletter' existe<br>";
        
        // Mostrar estrutura da tabela
        $result = $conn->query("DESCRIBE newsletter");
        echo "<pre>";
        while ($row = $result->fetch_assoc()) {
            print_r($row);
        }
        echo "</pre>";
    } else {
        echo "❌ Tabela 'newsletter' não encontrada";
    }
    
} catch (Exception $e) {
    echo "❌ Erro: " . $e->getMessage();
}
?>