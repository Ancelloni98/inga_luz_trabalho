<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'config.php';

header('Content-Type: application/json');
ob_clean();

<<<<<<< HEAD
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
=======
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
>>>>>>> ef6bd75 (Revert to commit cc7678f)
} finally {
    if (isset($stmt)) $stmt->close();
    if (isset($conn)) $conn->close();
}
<<<<<<< HEAD
?>
=======
?>
>>>>>>> ef6bd75 (Revert to commit cc7678f)
