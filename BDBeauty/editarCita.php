<?php 
    include("conexionCita.php");
    if (isset($_GET['idCitas'])) {
        $id = $_GET['idCitas'];
        $query = "SELECT * FROM cita WHERE idCitas = $id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result)== 1) {
           $row = mysqli_fetch_array($result);
           $idCitas = $row['idCitas'];
           $dia = $row['dia'];
           $hora = $row['hora'];
           $zona = $row['zona'];
           $duracion = $row['duracion'];
           $tarjetaProEnfer = $row['tarjetaProEnfer'];
           $cedulaPaciente = $row['cedulaPaciente'];
           $idSede = $row['idSede'];
        }

    }
    
   #actualización
    if (isset($_POST['idCitas'])) {
        $id =$_GET['idCitas'];
        $idCitas = $_POST['idCitas'];
        $dia = $_POST['dia'];
        $hora = $_POST['hora'];
        $zona = $_POST['zona'];
        $duracion = $_POST['duracion'];
        $tarjetaProEnfer = $_POST['tarjetaProEnfer'];
        $cedulaPaciente = $_POST['cedulaPaciente'];
        $idSede = $_POST['idSede'];

        $query = "UPDATE cita set idCitas = '$idCitas', dia = '$dia', hora = '$hora', 
        zona = '$zona', duracion = '$duracion', tarjetaProEnfer = '$tarjetaProEnfer',
         cedulaPaciente = '$cedulaPaciente', idSede =  '$idSede' WHERE idCitas = $id";
        mysqli_query($conn, $query);
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("query fail");
        }

        $_SESSION['mesagge'] = 'Datos actualizados';
        $_SESSION['mesagge_type'] = 'danger';
        header("Location: indexCita.php");


    }
?>
<?php include("includes/header.php")?>
    <div class="container p-4">
        <div class="col-md-4 mx-auto">
            <form action="editarCita.php?idCitas=<?php echo $_GET['idCitas'];?>" method="post">
                <div class="form-group">
                <input type="number" name="idCitas" value="<?php echo $idCitas; ?>"
                class="form-control" placeholder="ID cita">
                </div>
                <div class="form-group">
                <input type="number" name="dia" value="<?php echo $dia; ?>"
                class="form-control" placeholder="Día">
                </div>
                <div class="form-group">
                <input type="date" name="hora" value="<?php echo $hora; ?>"
                class="form-control" placeholder="Hora">
                </div>
                <div class="form-group">
                <input type="text" name="zona" value="<?php echo $zona; ?>"
                class="form-control" placeholder="Zona">
                </div>
                <div class="form-group">
                <input type="time" name="duracion" value="<?php echo $duracion; ?>"
                class="form-control" placeholder="Duracion">
                </div>
                <div class="form-group">
                <input type="number" name="tarjetaProEnfer" value="<?php echo $tarjetaProEnfer; ?>"
                class="form-control" placeholder="Tarjeta Profesional Enfermera">
                </div>
                <div class="form-group">
                <input type="number" name="cedulaPaciente" value="<?php echo $cedulaPaciente; ?>"
                class="form-control" placeholder="Cédula paciente">
                </div>
                <div class="form-group">
                <input type="number" name="idSede" value="<?php echo $idSede; ?>"
                class="form-control" placeholder="ID sede">
                </div>
                <button class="btn btn-success" name="update">
                    Actualizar
                </button>
            </form>
        </div>
    </div>
<?php include("includes/footer.php")?>