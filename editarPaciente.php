<?php 
    include("conexionPaciente.php");
    if (isset($_GET['cedula'])) {
        $cedula = $_GET['cedula'];
        $query = "SELECT * FROM paciente WHERE cedula = $cedula";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result)== 1) {
           $row = mysqli_fetch_array($result);
           $cedula = $row['cedula'];
           $nombres = $row['nombres'];
           $apellidos = $row['apellidos'];
           $idSede = $row['idSede'];
        }

    }
    
   #actualización
    if (isset($_POST['cedula'])) {
        $cedula =$_GET['cedula'];
        $cedula = $_POST['cedula'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $idSede = $_POST['idSede'];

        $query = "UPDATE paciente set cedula = '$cedula', nombres = '$nombres', apellidos = '$apellidos',
         idSede = '$idSede' WHERE cedula = $cedula";
        mysqli_query($conn, $query);
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("query fail");
        }

        $_SESSION['mesagge'] = 'Datos actualizados';
        $_SESSION['mesagge_type'] = 'danger';
        header("Location: indexPaciente.php");


    }
?>
<?php include("includes/header.php")?>
    <div class="container p-4">
        <div class="col-md-4 mx-auto">
            <form action="editarPaciente.php?cedula=<?php echo $_GET['cedula'];?>" method="post">
                <div class="form-group">
                <input type="number" name="cedula" value="<?php echo $cedula; ?>"
                class="form-control" placeholder="Cédula">
                </div>
                <div class="form-group">
                <input type="text" name="nombres" value="<?php echo $nombres; ?>"
                class="form-control" placeholder="Nombres">
                </div>
                <div class="form-group">
                <input type="text" name="apellidos" value="<?php echo $apellidos; ?>"
                class="form-control" placeholder="Apellidos">
                </div>
                <div class="form-group">
                <input type="number" name="idSede" value="<?php echo $idSede; ?>"
                class="form-control" placeholder="Sede">
                </div>
                <button class="btn btn-success" name="update">
                    actualizar
                </button>
            </form>
        </div>
    </div>
<?php include("includes/footer.php")?>