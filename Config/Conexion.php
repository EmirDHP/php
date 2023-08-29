<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "crud_ecommerce";

/* Database credentials. */
define('DB_SERVER', $host);
define('DB_USERNAME', $user);
define('DB_PASSWORD', $pass);
define('DB_NAME', $db);
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error()); 
}

/* Database credentials. data */
return [
  'db' => [
    'host' => $host,
    'user' => $user,
    'pass' => $pass,
    'name' => $db,
    'options' => [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
  ]
];