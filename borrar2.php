<?php

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM solda WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'soldado eliminado con éxito';
  $_SESSION['message_type'] = 'danger';
  
  header('Location: inicio.php');
}

?>
