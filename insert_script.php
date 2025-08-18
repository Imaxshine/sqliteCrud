<?php
error_reporting(0);

if ($_SERVER['REQUEST_METHOD'] == "GET"){
    echo "Invalid request method!";
    exit();
}
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
    $name = strip_tags($_POST['name']);
    $email = strip_tags($_POST['email']);
    $pass = strip_tags($_POST['password']);

    function InsertData($name, $email, $password)
    {
        require_once __DIR__ . "/conn.php";
        $conn = GetConnection();
        $insert = $conn->prepare('INSERT INTO `users` (`username`, `email`, `password`) VALUES (:name, :email, :pass)');
        $insert->bindValue(':name',$name);
        $insert->bindValue(':email',$email);
        $insert->bindValue(':pass', $password);
        $insert->execute();
        if ($insert){
            echo "<p class='alert alert-success'>User Added successfully</p>";
        }else{
            echo "<p class='alert alert-danger'>Failed to add a new user</p>";
        }
    }
    InsertData($name, $email, $pass);

}

//echo "insert_script";