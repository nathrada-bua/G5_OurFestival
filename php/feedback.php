<?php
header('Content-Type: application/json');

$jsonFile = '../data/feedback_data.json';

date_default_timezone_set('Asia/Bangkok');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputData = json_decode(file_get_contents('php://input'), true);

    if (isset($inputData['rating'])) {
        $currentDataJSON = file_get_contents($jsonFile);
        $dataArray = json_decode($currentDataJSON, true);

        if (!is_array($dataArray)) {
            $dataArray = [];
        }
  
        $inputData['timestamp'] = date('Y-m-d H:i:s'); 

        $dataArray[] = $inputData;
        
        if(file_put_contents($jsonFile, json_encode($dataArray, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) {
            echo json_encode(['success' => true, 'message' => 'Saved successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error writing to file. Check permissions.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid Data']);
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (file_exists($jsonFile)) {
        echo file_get_contents($jsonFile);
    } else {
        echo '[]'; 
    }
    exit;
}
?>