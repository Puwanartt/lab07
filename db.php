<?php
$host = "localhost";
$user = "it58160188";
$password = "it58160188";
$dbname = "it58160188";
$conn = new mysqli($host, $user, $password, $dbname);
$conn->query('SET NAMES UTF8');
if ($conn->connect_error) die($conn->connect_error);
?> 