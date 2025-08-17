<?php
require_once __DIR__ . "/conn.php";
//$conn = GetConnection();
//if ($conn){
//    echo "Connected successfully";
//}else{
//    echo $conn;
//}
?>
<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Registration</title>
    <style>
        .container{
            height: 100vh;
            align-content: center;
        }
        .container .formHolder{
            display: flex;
            justify-content: center;
            padding: 10px;

        }
    </style>
</head>
<body>
<div class="container bg-body-secondary">
    <div class="formHolder">

        <form id="myForm">

            <h3>Registration form</h3>

            <input class="form-control my-3" id="name" type="text" name="userName" placeholder="User name" required>

            <input class="form-control my-3" id="email" type="text" name="email" placeholder="Email" required>

            <input class="form-control my-3" id="password" type="password" name="password" placeholder="Your password" required>

            <button class="btn btn-success w-100" type="submit" onclick="SaveBtn()"> Save </button>
        </form>
    </div>
</div>

<script src="/database/app/reg.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
