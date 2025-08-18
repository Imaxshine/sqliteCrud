<?php
require_once __DIR__ . "/conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts Roles</title>
    <style>
        .tableHolder{

        }
    </style>
</head>
<body>
    <div class="tableHolder">
        <table class="table table-dark hover">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            <?php
                $conn = GetConnection();
                $readData = $conn->query("SELECT * FROM `users`");
                $index = 1;
                while($data = $readData->fetchArray()): 
                ?>
                    <tr>
                        <td><?= $index ++;  ?></td>

                        <td><?= htmlspecialchars($data['username']); ?></td>

                        <td> <?= htmlspecialchars($data['email']); ?></td>

                        <td> <?= htmlspecialchars($data['password']); ?> </td>

                        <td>
                            <form id="edit">
                                <input class="edit" type=""  id="editId" value="<?= $data['id']; ?>">
                                <button type="button" class="btn btn-primary text-capitalize" onclick="EditData(this)"
                                data-editId="<?= $data['id'];  ?>"
                                >edit</button>
                            </form>
                        </td>

                        <td>
                            <form id="delete">
                                <input type="hidden"  id="deleteId">
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>

                    </tr>
                <?php endwhile; ?>
        </table>
    </div>

    <script src="/database/app/posts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>