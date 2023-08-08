<?php

  // $host = 'localhost';
  // $db_name = 'php-2';
  // $user = 'root';
  // $password = '';
  // try{
  //   $pdo = new PDO("mysql:host=$host;dbname=$db_name", $user, $password);
  //   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  // }
  // catch(PDOException $m){
  //     echo "Connection failed: " . $m->getMessage();
  // }

  $servername = "localhost";
  $username = "root";
  $password = "";
  $db_name = "php-2";  
  $pdo = new mysqli($servername, $username, $password, $db_name);
  if($pdo->connect_error){
      die("Connection failed".$pdo->connect_error);
  }
  echo "";

?>
