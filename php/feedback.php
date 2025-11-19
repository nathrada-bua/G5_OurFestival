<?php
header('Content-Type: application/json');
// ป้องกันปัญหา CORS กรณีรัน Localhost
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");

// รับข้อมูล JSON ที่ส่งมาจาก JavaScript
$json_input = file_get_contents('php://input');
$data = json_decode($json_input, true);

// ถ้าไม่มีข้อมูลส่งมา ให้จบการทำงาน
if ($data === null) {
    echo json_encode(['success' => false, 'message' => 'No data received']);
    exit;
}

// ตำแหน่งไฟล์ที่จะบันทึกข้อมูล (ต้องสร้างโฟลเดอร์ data รอไว้ก่อน)
$file_path = '../data/feedback_data.json';

// อ่านข้อมูลเก่าขึ้นมา (ถ้ามีไฟล์อยู่แล้ว)
$current_data = [];
if (file_exists($file_path)) {
    $file_content = file_get_contents($file_path);
    $current_data = json_decode($file_content, true);
    if (!is_array($current_data)) {
        $current_data = [];
    }
}

// เตรียมข้อมูลชุดใหม่
$new_feedback = [
    'rating'    => isset($data['rating']) ? $data['rating'] : '0',
    'comment'   => isset($data['comment']) ? htmlspecialchars($data['comment']) : '',
    'timestamp' => date('Y-m-d H:i:s')
];

// เพิ่มต่อท้ายข้อมูลเดิม
$current_data[] = $new_feedback;

// บันทึกลงไฟล์
if (file_put_contents($file_path, json_encode($current_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) {
    echo json_encode(['success' => true, 'message' => 'Saved successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to write file']);
}
?>