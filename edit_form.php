<?php
error_reporting(0);
include_once __DIR__ . "/conn.php";
if ($_SERVER['REQUEST_METHOD'] !== "GET"){
    echo "Invalid request method were applied";
    exit();
}

if (isset($_GET['id'])){
    $userId = $_GET['id'];
    $uniqueId =  $userId / 39411;
    if(strlen($uniqueId) > 2 || $uniqueId <= 0){
        $error = "Invalid User identification!";
    }else{

        $conn = GetConnection();
        $query = "SELECT * FROM `users` WHERE `id` = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id', $uniqueId, SQLITE3_INTEGER);
        $result = $stmt->execute();
        $data = $result->fetchArray(SQLITE3_ASSOC);

    }

}
?>

<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit user information</title>
    <style>
        .myDialog #myDialog{
            width: 300px;
            /* height: 200px; */
            border: none;
            position: relative;
        }
        .closeBtn{
            position: absolute;
            top: 2px;
            right: 2px;
        }
        .myDialog #myDialog::backdrop{
            backdrop-filter: 3px;
            background: rgba(0,0,0,0.4);
        }
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

<!--<div class="myDialog">-->
<!--    <dialog id="myDialog">-->
<!--        <p id="text">-->
<!---->
<!--        </p>-->
<!--        <button class="closeBtn btn btn-danger" onclick="document.getElementById('myDialog').close();">close</button>-->
<!--    </dialog>-->
<!--</div>-->

<div class="container bg-body-secondary">
    <div class="formHolder">

        <form id="myForm">

            <p>
                <?php
                if (!empty($error)):?>
                    <span class="alert alert-danger">
                        <?= $error; exit(); ?>
                    </span>
                <?php  endif; ?>

                <span id="results">
                            <!--    All output            -->
                </span>

            </p>

            <h3>Edit <?= ucfirst($data['username']); ?> Information</h3>
            <p class="text-end">
<!--                <button type="button" class="btn btn-success fw-bold" onclick="OpenPosts()">Open Posts</button>-->
            </p>

            <input class="form-control my-3" id="name" type="text" name="userName" placeholder="User name" value="<?= $data['username']; ?>" required>

            <input class="form-control my-3" id="email" type="text" name="email" placeholder="Email" value="<?= $data['email']; ?>" required>

<!--            <input class="form-control my-3" id="password" type="password" name="password" placeholder="Your password">-->

            <button class="btn btn-success w-100" type="submit" onclick="Edit(this)"
            data-userId="<?= $uniqueId; ?>"> Edit </button>
        </form>
    </div>
</div>

<script src="/database/app/edit.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>

