<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'config.php';

header('Content-Type: application/json');
ob_clean();

try {
    if (empty($_POST)) {
        throw new Exception("Dados não recebidos");
    }

    $query = "INSERT INTO newsletter (nome, email, telefone, endereco, cidade) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        throw new Exception("Erro na preparação: " . $conn->error);
    }

    $stmt->bind_param("sssss", 
        $_POST['nome'],
        $_POST['email'],
        $_POST['telefone'],
        $_POST['endereco'],
        $_POST['cidade']
    );

    if (!$stmt->execute()) {
        throw new Exception("Erro ao executar: " . $stmt->error);
    }

    echo json_encode([
        'status' => 'success',
        'message' => 'Cadastro realizado com sucesso!'
    ]);

} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
} finally {
    if (isset($stmt)) $stmt->close();
    if (isset($conn)) $conn->close();
}
?>
