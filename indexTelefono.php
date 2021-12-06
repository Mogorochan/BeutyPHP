<?php include("conexionTelefono.php")?>
<?php include("includes/header.php")?>

<?php if (isset($_SESSION['mesagge'])) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= $_SESSION['mesagge']?>
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php session_unset();}?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                 <form action="guardarTelefono.php" method="POST">
                    <div class="form-group">
                        Id Sede:<br>
                        <input type="number" name="idTel" class="form-control" 
                        placeholder="Sede" autofocus><br>
                    </div>
                    <div class="form-group">
                        Telefono Centro comercial:<br>
                        <input type="number" name="tel"class="form-control" 
                        placeholder="Teléfono"><br>
                        <input type="submit" name="save" class="btn btn-success btn-block" value="Registrar">
                    </div>
                </form>
            </div>
        </div>    
    </div>
</div>
<div class="container col-md-8"> <!---consulta y eliminar-->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre Sede</th>
                    <th>Número télefono sede</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $query = "SELECT * FROM telefono";
                    $Registros = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($Registros)){ ?>
                        <tr>
                            <td><?php echo $row['idSede']?></td> <!---el nombre del registro de la BD-->
                            <td><?php echo $row['telefono']?></td><!---el nombre del registro de la BD-->
                            <td>
                                <a href="editarTelefono.php?telefono=<?php echo $row['telefono']?>" class="btn btn-primary"><!---el dato guía para eliminar de la BD que sea único-->
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="eliminarTelefono.php?telefono=<?php echo $row['telefono']?>"class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>

                    <?php } ?>
            </tbody>
        </table>
  </div>


<?php include("includes/footer.php")?>

   
    