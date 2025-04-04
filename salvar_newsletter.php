<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'config.php';

header('Content-Type: application/json');
ob_clean();

function validateInput($data) {
    return array_filter($data, function($value) {
        return !empty(trim($value));
    });
}

try {
    $required_fields = ['nome', 'email', 'telefone', 'endereco', 'cidade'];
    $data = validateInput($_POST);
    
    if (count($data) !== count($required_fields)) {
        throw new Exception("Todos os campos são obrigatórios");
    }

    $stmt = $conn->prepare("INSERT INTO newsletter (nome, email, telefone, endereco, cidade) VALUES (?, ?, ?, ?, ?)");
    
    if (!$stmt || !$stmt->bind_param("sssss", ...array_values($data))) {
        throw new Exception("Erro na preparação: " . $conn->error);
    }

    if (!$stmt->execute()) {
        throw new Exception("Erro ao salvar dados");
    }

    echo json_encode(['status' => 'success', 'message' => 'Cadastro realizado com sucesso!']);

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
} finally {
    if (isset($stmt)) $stmt->close();
    if (isset($conn)) $conn->close();
}
?>
