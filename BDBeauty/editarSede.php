<?php 
    include("conexionSede.php");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM sede WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result)== 1) {
           $row = mysqli_fetch_array($result);
           $id = $row['id'];
           $centroComercial = $row['centroComercial'];
           $localn = $row['localn'];
           $horarioApertura = $row['horarioApertura'];
           $horarioCierre = $row['horarioCierre'];
        }

    }
    
   #actualización
    if (isset($_POST['id'])) {
        $id =$_GET['id'];
        $id = $_POST['id'];
        $centroComercial = $_POST['centroComercial'];
        $localn = $_POST['localn'];
        $horarioApertura = $_POST['horarioApertura'];
        $horarioCierre = $_POST['horarioCierre'];

        $query = "UPDATE sede set id = '$id', centroComercial = '$centroComercial', localn = '$localn', 
        horarioApertura = '$horarioApertura', horarioCierre = '$horarioCierre' WHERE id = $id";
        mysqli_query($conn, $query);
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("query fail");
        }

        $_SESSION['mesagge'] = 'Datos actualizados';
        $_SESSION['mesagge_type'] = 'danger';
        header("Location: indexSede.php");


    }
?>
<?php include("includes/header.php")?>
    <div class="container p-4">
        <div class="col-md-4 mx-auto">
            <form action="editarSede.php?id=<?php echo $_GET['id'];?>" method="post">
                <div class="form-group">
                <input type="number" name="id" value="<?php echo $id; ?>"
                class="form-control" placeholder="Sede">
                </div>
                <div class="form-group">
                <input type="text" name="centroComercial" value="<?php echo $centroComercial; ?>"
                class="form-control" placeholder="Centro comercial">
                </div>
                <div class="form-group">
                <input type="number" name="localn" value="<?php echo $localn; ?>"
                class="form-control" placeholder="local">
                </div>
                <div class="form-group">
                <input type="time" name="horarioApertura" value="<?php echo $horarioApertura; ?>"
                class="form-control" placeholder="Apertura">
                </div>
                <div class="form-group">
                <input type="time" name="horarioCierre" value="<?php echo $horarioCierre; ?>"
                class="form-control" placeholder="Cierre">
                </div>
                <button class="btn btn-success" name="update">
                    Actualizar
                </button>
            </form>
        </div>
    </div>
<?php include("includes/footer.php")?>