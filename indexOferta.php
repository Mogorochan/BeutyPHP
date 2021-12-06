<?php include("conexionOferta.php")?>
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
                 <form action="guardarOferta.php" method="POST">
                    <div class="form-group">
                        ID Oferta:<br>
                        <input type="number" name="idOferta" class="form-control" 
                        placeholder="idOferta" autofocus><br>
                    </div>
                    <div class="form-group">
                        Precio:<br>
                        <input type="text" name="cost" class="form-control" 
                        placeholder="Precio" ><br>
                    </div>
                    <div class="form-group">
                        Zona:<br>
                        <input type="text" name="zona" class="form-control" 
                        placeholder="Zona"><br>
                    </div>
                    <div class="form-group">
                        Inicio oferta:<br>
                        <input type="date" name="star" class="form-control" ><br>
                    </div>
                    <div class="form-group">
                        Fin oferta:<br>
                        <input type="date" name="end" class="form-control" ><br>
                    </div>
                    <div class="form-group">
                        Cédula:<br>
                        <input type="number" name="cedula" class="form-control" 
                        placeholder="Cédula" ><br>
                    </div>
                    <div class="form-group">
                        ID Citas:<br>
                        <input type="number" name="cita" class="form-control" 
                        placeholder="idCita" ><br>
                    </div>
                    <div class="form-group">
                        Sede:<br>
                        <input type="number" name="idSede" class="form-control" 
                        placeholder="Sede"><br>
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
                    <th>ID Oferta</th>
                    <th>Precio</th>
                    <th>Zona</th>
                    <th>Inicio oferta</th>
                    <th>Fin oferta</th>
                    <th>Cédula</th>
                    <th>ID Citas</th>
                    <th>Sede</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $query = "SELECT * FROM oferta";
                    $Registros = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($Registros)){ ?>
                        <tr>
                            <td><?php echo $row['idOferta']?></td> <!---el nombre del registro de la BD-->
                            <td><?php echo $row['precio']?></td><!---el nombre del registro de la BD-->
                            <td><?php echo $row['zona']?></td>
                            <td><?php echo $row['inicio']?></td>
                            <td><?php echo $row['fin']?></td>
                            <td><?php echo $row['pacienteCedula']?></td>
                            <td><?php echo $row['idCitas']?></td>
                            <td><?php echo $row['idSede']?></td>
                            <td>
                                <a href="editarOferta.php?idOferta=<?php echo $row['idOferta']?>" class="btn btn-primary"><!---el dato guía para eliminar de la BD que sea único-->
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="eliminarOferta.php?idOferta=<?php echo $row['idOferta']?>"class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>

                    <?php } ?>
            </tbody>
        </table>
  </div>
<?php include("includes/footer.php")?>