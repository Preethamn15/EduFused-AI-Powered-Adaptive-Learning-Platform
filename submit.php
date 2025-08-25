<?php
header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"), true);
if (!$data || !isset($data['name']) || !isset($data['results'])) {
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => "Invalid input"]);
    exit;
}

$name = filter_var($data['name'], FILTER_SANITIZE_STRING);
$results = $data['results'];

$conn = new mysqli("localhost", "root", "", "quizdb");
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "DB Connection failed"]);
    exit;
}

// Prepare statement
$stmt = $conn->prepare("INSERT INTO quiz_results (student_name, topic, correct, total) VALUES (?, ?, ?, ?)");
if (!$stmt) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "DB Prepare failed"]);
    exit;
}

// Insert per topic result
foreach ($results as $res) {
    $topic = filter_var($res['topic'], FILTER_SANITIZE_STRING);
    $correct = intval($res['correct']);
    $total = intval($res['total']);
    $stmt->bind_param("ssii", $name, $topic, $correct, $total);
    $stmt->execute();
}

$stmt->close();
$conn->close();

echo json_encode(["status" => "success", "message" => "Results saved"]);
