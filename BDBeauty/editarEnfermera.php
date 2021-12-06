<?php 
    include("conexionEnfermera.php");
    if (isset($_GET['cedulaEnfer'])) {
        $cedula = $_GET['cedulaEnfer'];
        $query = "SELECT * FROM enfermera WHERE cedulaEnfer = $cedula";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result)== 1) {
           $row = mysqli_fetch_array($result);
           $tarjetaProfesional = $row['tarjetaProfesional'];
           $cedulaEnfer = $row['cedulaEnfer'];
           $nombre = $row['nombre'];
           $idSede = $row['idSede'];
        }

    }
    
   #actualización
    if (isset($_POST['cedulaEnfer'])) {
        $cedula =$_GET['cedulaEnfer'];
        $tarjetaProfesional = $_POST['tarjetaProfesional'];
        $cedulaEnfer = $_POST['cedulaEnfer'];
        $nombre = $_POST['nombre'];
        $idSede = $_POST['idSede'];

        $query = "UPDATE enfermera set tarjetaProfesional = '$tarjetaProfesional', cedulaEnfer = '$cedulaEnfer', 
        nombre = '$nombre', idSede = '$idSede' WHERE cedulaEnfer = $cedula";
        mysqli_query($conn, $query);
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("query fail");
        }

        $_SESSION['mesagge'] = 'Datos actualizados';
        $_SESSION['mesagge_type'] = 'danger';
        header("Location: indexEnfermera.php");


    }
?>
<?php include("includes/header.php")?>
    <div class="container p-4">
        <div class="col-md-4 mx-auto">
            <form action="editarEnfermera.php?cedulaEnfer=<?php echo $_GET['cedulaEnfer'];?>" method="post">
                 <div class="form-group">
                <input type="number" name="tarjetaProfesional" value="<?php echo $tarjetaProfesional; ?>"
                class="form-control" placeholder="Tarjeta profesional">
                </div>
                <div class="form-group">
                <input type="number" name="cedulaEnfer" value="<?php echo $cedulaEnfer; ?>"
                class="form-control" placeholder="Cédula">
                </div>
                <div class="form-group">
                <input type="text" name="nombre" value="<?php echo $nombre; ?>"
                class="form-control" placeholder="Nombre completo">
                </div>
                <div class="form-group">
                <input type="number" name="idSede" value="<?php echo $idSede; ?>"
                class="form-control" placeholder="Sede">
                </div>
                <button class="btn btn-success" name="update">
                    Actualizar
                </button>
            </form>
        </div>
    </div>
<?php include("includes/footer.php")?>