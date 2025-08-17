<?php
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
            echo "User Added successfully";
        }else{
            echo "Failed to add a new user";
        }
    }
    InsertData($name, $email, $pass);

}
//echo "insert_script";