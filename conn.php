<?php
function GetConnection()
{
    $conn = new SQLite3('platform.db');
    if ($conn){
        return $conn;
    }else{
        return "Connection Error. " . $conn->lastErrorMsg();
    }
}

//Create a table if not exists
function CreateTable($table)
{
    $conn = GetConnection();
    $results = $conn->exec("CREATE TABLE IF NOT EXISTS $table 
(`id` INTEGER PRIMARY KEY,
`username` TEXT NOT NULL,
`email` TEXT NOT NULL UNIQUE,
`password` TEXT NOT NULL)");

if ($results){
    echo "";
}else{
    echo "Failed to create Table ." . $conn->lastErrorMsg();
}
}
CreateTable("users");