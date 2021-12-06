<?php include("conexionSede.php")?>
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
                 <form action="guardarSede.php" method="POST">
                    <div class="form-group">
                        Id Sede:<br>
                        <input type="number" name="id" class="form-control" 
                        placeholder="Sede" autofocus><br>
                    </div>
                    <div class="form-group">
                        Centro Comercial:<br>
                        <input type="text" name="cc" class="form-control" 
                        placeholder="Centro comercial" ><br>
                    </div>
                    <div class="form-group">
                        Local:<br>
                        <input type="number" name="local" class="form-control" 
                        placeholder="local"><br>
                    </div>
                    <div class="form-group">
                        Apertura:<br>
                        <input type="time" name="start" class="form-control"><br>
                    </div>
                    <div class="form-group">
                        Cierre:<br>
                        <input type="time" name="end"class="form-control"><br>
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
                    <th>Sede</th>
                    <th>Centro comercial</th>
                    <th>Local</th>
                    <th>Apertura</th>
                    <th>Cierre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $query = "SELECT * FROM sede";
                    $Registros = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($Registros)){ ?>
                        <tr>
                            <td><?php echo $row['id']?></td> <!---el nombre del registro de la BD-->
                            <td><?php echo $row['centroComercial']?></td><!---el nombre del registro de la BD-->
                            <td><?php echo $row['localn']?></td>
                            <td><?php echo $row['horarioApertura']?></td>
                            <td><?php echo $row['horarioCierre']?></td>
                            <td>
                                <a href="editarSede.php?id=<?php echo $row['id']?>" class="btn btn-primary"><!---el dato guía para eliminar de la BD que sea único-->
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="eliminarSede.php?id=<?php echo $row['id']?>"class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>

                    <?php } ?>
            </tbody>
        </table>
  </div>
<?php include("includes/footer.php")?>