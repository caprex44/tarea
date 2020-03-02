<?php include("db.php"); ?>

<?php include('cabesera.php'); ?>

              <main class="container p-4">
                <div class="row">
                  <div class="col-md-4">
                    

                    <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                      <?= $_SESSION['message']?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <?php session_unset(); } ?>

                    
                    <div class="card card-body">
                      <form action="guardar.php" method="POST">
                        <div class="form-group">
                          <input type="text" name="title" class="form-control" placeholder="nombre del soldado" autofocus>
                        </div>
                        <div class="form-group">
                          <textarea name="description" rows="2" class="form-control" placeholder="arma del soldado"></textarea>
                        </div>
                        <input type="submit" name="save_task" class="btn btn-success btn-block" value="guardar">
                      </form>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <table class="table table-dark">
                      <thead>
                        <tr>
                          <th>soldado</th>
                          <th>arma</th>
                          <th>fecha de creación</th>
                          <th>acción</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        $query = "SELECT * FROM task";
                        $result_tasks = mysqli_query($conn, $query);    

                        while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                        <tr>
                          <td><?php echo $row['title']; ?></td>
                          <td><?php echo $row['description']; ?></td>
                          <td><?php echo $row['created_at']; ?></td>
                          <td>
                            <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                              <i class="fas fa-marker"></i>
                            </a>
                            <a href="borrar.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                              <i class="far fa-trash-alt"></i>
                            </a>
                          </td>
                        </tr>
                        <?php } ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </main>

<?php include('footer.php'); ?>
