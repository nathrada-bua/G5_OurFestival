<?php
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

$json_input = file_get_contents('php://input');
$data = json_decode($json_input, true);

if ($data === null) {
    echo json_encode(['success' => false, 'message' => 'No data received']);
    exit;
}

$file_path = '../data/feedback_data.json';

$current_data = [];
if (file_exists($file_path)) {
    $file_content = file_get_contents($file_path);
    $current_data = json_decode($file_content, true);
    if (!is_array($current_data)) {
        $current_data = [];
    }
}

$new_feedback = [
    'rating'    => isset($data['rating']) ? $data['rating'] : '0',
    'comment'   => isset($data['comment']) ? htmlspecialchars($data['comment']) : '',
    'timestamp' => date('Y-m-d H:i:s')
];

$current_data[] = $new_feedback;

if (file_put_contents($file_path, json_encode($current_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) {
    echo json_encode(['success' => true, 'message' => 'Saved successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to write file']);
}
?>