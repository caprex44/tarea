<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM solda WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $title = $row['nombre'];
    $description = $row['descripcion'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $title= $_POST['nombre'];
  $description = $_POST['descripcion'];

  $query = "UPDATE solda set nombre = '$title', descripcion = '$description' WHERE id=$id";
  mysqli_query($conn, $query);

  $_SESSION['message'] = 'soldado actualizado correctamente';
  $_SESSION['message_type'] = 'warning';

  header('Location: inicio.php');
}

?>
<?php include('cabesera.php'); ?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
     <form action="editar2.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $title; ?>" placeholder="Update nomtre">
        </div>
        <div class="form-group">
        <textarea name="descripcion" class="form-control" cols="30" rows="10"><?php echo $description;?></textarea>
        </div>
<button class="btn-success" name="update">actualizar</button>
 </form>
 </div>
</div>
</div>
</div>

<?php include('footer.php'); ?>
