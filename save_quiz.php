<?php
session_start();

$data = json_decode(file_get_contents('php://input'), true);

if (!isset($data['topic']) || !isset($data['questions']) || !is_array($data['questions'])) {
    http_response_code(400);
    echo "Invalid data format";
    exit;
}

$topic = $data['topic'];
$questions = $data['questions'];

$_SESSION['quizzes'][$topic] = $questions;

echo "Quiz for '{$topic}' saved successfully";
?>
