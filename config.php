<?php
header("Content-Type: application/json; charset=UTF-8");
$user = "root";
$password = "";
$con = new PDO("mysql:host=localhost;dbname=nekoapp", $user, $password); 
