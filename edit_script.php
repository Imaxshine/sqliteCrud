<?php
header('Content-Type: Application/json');
if ($_SERVER['REQUEST_METHOD'] !== "POST"){
    http_response_code(404);
    echo json_encode(['error'=>'Invalid request method were applied']);
    exit();
}
$getInput = file_get_contents('php://input');
$data = json_decode($getInput, true);
if (isset($data['Name']) && isset($data['Email']) && isset($data['uniqId'])){
    $name = $data['Name'];
    $email = $data['Email'];
    $id = $data['uniqId'];

    echo json_encode(['message'=>"{$id}"]);
    exit();
}