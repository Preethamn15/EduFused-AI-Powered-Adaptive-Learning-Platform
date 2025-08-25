<?php
session_start();

header('Content-Type: application/json');

$topic = $_GET['topic'] ?? '';

if (!$topic || !isset($_SESSION['quizzes'][$topic])) {
    // Return empty JSON array if topic not found or not set
    echo json_encode([]);
    exit;
}

// Return the quiz questions for the requested topic
echo json_encode($_SESSION['quizzes'][$topic]);
?>
