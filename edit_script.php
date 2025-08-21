<?php
//error_reporting(0);
include_once __DIR__ . "/conn.php";

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

        //Update user Information
    $conn = GetConnection();
    $update = "UPDATE `users` SET `username`=:name, `email`=:email WHERE `id`=:id";
    $stmt = $conn->prepare($update);
    $stmt->bindValue('name', $name, SQLITE3_TEXT);
    $stmt->bindValue('email', $email, SQLITE3_TEXT);
    $stmt->bindValue('id', $id, SQLITE3_INTEGER);
    $result = $stmt->execute();
    if ($result){
        echo json_encode(['message'=>'<p class="alert alert-success">User Information were updated success</p>']);
    }else{
        echo json_encode(['error'=>'<p class="alert alert-danger">We failed to update the requested information</p>']);
    }
    exit();
}