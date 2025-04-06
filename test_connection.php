<?php
require_once 'config.php';

if ($conn->ping()) {
    echo "Conexão com o banco de dados estabelecida com sucesso!";
    echo "<br>Servidor: " . $conn->server_info;
    echo "<br>Versão: " . $conn->server_version;
    echo "<br>Porta: " . $port;
} else {
    echo "Erro na conexão com o banco de dados.";
    echo "<br>Tentando conectar na porta: " . $port;
}

$conn->close();
<<<<<<< HEAD
?>
=======
?>
>>>>>>> ef6bd75 (Revert to commit cc7678f)
