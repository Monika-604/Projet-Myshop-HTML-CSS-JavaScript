<?php
function connect_db($host, $dbname, $username, $password)
{
    try {
        $connect = new PDO("mysql:host=$host;dbname=$dbname",$username, $password);
    } catch (Exception $error) {
        $connect = "Connection failed: " . $error->getMessage();
    }
    return $connect;
}

$connect=connect_db('localhost', 'shop', 'root', '');
