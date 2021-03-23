<?php
$servername='localhost';
$username = 'root';
$password='';
$dbname='school';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){

    echo "connection failed" . $conn->connect_error;
} else

echo "connection works"



?>