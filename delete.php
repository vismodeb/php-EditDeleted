<?php

  require_once('config.php');

  // $ID = $_GET['ID'];
  // $stm=$pdo->prepare("DELETE FROM students WHERE ID=?");
  // $stm->execute(array($ID));
  // header('location:index.php?delete=success');

  if(isset($_GET['ID'])){
      $ID = $_GET['ID'];
      $sql = "DELETE from `students` where ID=$ID";
      $pdo->query($sql);
  }
  header('location:index.php?delete=success');

?>