<?php include("conexionCita.php")?>
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
                 <form action="guardarCita.php" method="POST">
                    <div class="form-group">
                        ID Cita:<br>
                        <input type="number" name="idCita" class="form-control" 
                        placeholder="idCita" autofocus><br>
                    </div>
                    <div class="form-group">
                        Día:<br>
                        <input type="date" name="dia" class="form-control" 
                        placeholder="Día" ><br>
                    </div>
                    <div class="form-group">
                        Hora:<br>
                        <input type="time" name="hora" class="form-control" 
                        placeholder="Hora"><br>
                    </div>
                    <div class="form-group">
                        Zona:<br>
                        <input type="text" name="zona" class="form-control" 
                        placeholder="Zona" ><br>
                    </div>
                    <div class="form-group">
                        Duración:<br>
                        <input type="time" name="duracion" class="form-control" ><br>
                    </div>
                    <div class="form-group">
                        Tarjeta Enfermera:<br>
                        <input type="number" name="tarjeta" class="form-control" 
                        placeholder="Tarjeta" ><br>
                    </div>
                    <div class="form-group">
                        Cédula:<br>
                        <input type="number" name="cedula" class="form-control" 
                        placeholder="Cédula" ><br>
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
                    <th>ID Cita</th>
                    <th>Día</th>
                    <th>Hora</th>
                    <th>Zona</th>
                    <th>Duración</th>
                    <th>Tarjeta Enfermera</th>
                    <th>Cédula</th>
                    <th>Sede</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $query = "SELECT * FROM cita";
                    $Registros = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_array($Registros)){ ?>
                        <tr>
                            <td><?php echo $row['idCitas']?></td> <!---el nombre del registro de la BD-->
                            <td><?php echo $row['dia']?></td><!---el nombre del registro de la BD-->
                            <td><?php echo $row['hora']?></td>
                            <td><?php echo $row['zona']?></td>
                            <td><?php echo $row['duracion']?></td>
                            <td><?php echo $row['tarjetaProEnfer']?></td>
                            <td><?php echo $row['cedulaPaciente']?></td>
                            <td><?php echo $row['idSede']?></td>
                            <td>
                                <a href="editarCita.php?idCitas=<?php echo $row['idCitas']?>" class="btn btn-primary"><!---el dato guía para eliminar de la BD que sea único-->
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="eliminarCita.php?idCitas=<?php echo $row['idCitas']?>"class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>

                    <?php } ?>
            </tbody>
        </table>
  </div>
<?php include("includes/footer.php")?>