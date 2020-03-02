<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $title = $_POST['nombre'];
  $description = $_POST['descripcion'];
  $query = "INSERT INTO solda(nombre, descripcion) VALUES ('$title', '$description')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'soldado guardado con éxito';
  $_SESSION['message_type'] = 'success';
  
  header('Location: inicio.php');
}

?>
