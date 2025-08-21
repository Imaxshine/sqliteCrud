<?php
    require_once __DIR__ . "/conn.php";

    header('Accept:application/json');
    header('Content-Type:Application/json');

    if ($_SERVER['REQUEST_METHOD'] !== "POST"){
        http_response_code(402);
        echo json_encode(['errors'=>'Invalid request method or page is currently unavailable!'], JSON_PRETTY_PRINT);
        exit();
    }

    $getData = file_get_contents('php://input'); //PHP Wrap string
    $data = json_decode($getData, true);

    if (isset($data['uniqId'])){
        $uniqId = (int)$data['uniqId'];
        
        // Get connection
        $conn = GetConnection();
        $delete_query = "DELETE FROM `users` WHERE `id`=:id";
        $stmt = $conn->prepare($delete_query);
        $stmt->bindValue('id', $uniqId, SQLITE3_INTEGER);
        $result = $stmt->execute();

        if ($result){
            echo json_encode(['message'=>'User deleted and removed from the list-view successfully'], JSON_PRETTY_PRINT);
        }else{
            echo json_encode(['errors'=>'Something went wrong, try again later!' . $conn->lastErrorCode()], JSON_PRETTY_PRINT);
        }

    }else{
        http_response_code(500);
        echo json_encode(['errors'=>'Invalid credential were applied!'], JSON_PRETTY_PRINT);
    }

