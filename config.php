<?php


$host = 'localhost';
$dbname = 'cv';
$user = 'root';
$pass = 'root';

// VeriTabanı Bağlantısı

try
{
    $db = new PDO('mysql:host='.$host.';dbname='.$dbname,$user,$pass);
}catch (PDOException $e)
{
    die($e ->getMessage());
}
