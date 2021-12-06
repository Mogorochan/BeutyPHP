<?php include("conexionSecretaria.php")?>
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
                 <form action="guardarSecretaria.php" method="POST">
                    <div class="form-group">
                        Cédula:<br>
                        <input type="number" name="cedula" class="form-control" 
                        placeholder="Cédula" autofocus><br>
                    </div>
                    <div class="form-group">
                        Nombre:<br>
                        <input type="text" name="nombre" class="form-control" 
                        placeholder="Nombre Completo" ><br>
                    </div>
                    <div class="form-group">
                        Sede:<br>
                        <input type="number" name="id"class="form-control" placeholder="Sede"><br>
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
                    <th>Cédula</th>
                    <th>Nombre completo</th>
                    <th>Sede</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $query = "SELECT * FROM secretaria";
                    $Registros = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($Registros)){ ?>
                        <tr>
                            <td><?php echo $row['cedulaSecre']?></td> <!---el nombre del registro de la BD-->
                            <td><?php echo $row['nombreSecre']?></td><!---el nombre del registro de la BD-->
                            <td><?php echo $row['idSede']?></td>
                            <td>
                                <a href="editarSecretaria.php?cedulaSecre=<?php echo $row['cedulaSecre']?>" class="btn btn-primary"><!---el dato guía para eliminar de la BD que sea único-->
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="eliminarSecretaria.php?cedulaSecre=<?php echo $row['cedulaSecre']?>"class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>

                    <?php } ?>
            </tbody>
        </table>
  </div>
<?php include("includes/footer.php")?>