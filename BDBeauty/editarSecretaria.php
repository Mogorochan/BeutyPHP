<?php 
    include("conexionSecretaria.php");
    if (isset($_GET['cedulaSecre'])) {
        $cedula = $_GET['cedulaSecre'];
        $query = "SELECT * FROM secretaria WHERE cedulaSecre = $cedula";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result)== 1) {
           $row = mysqli_fetch_array($result);
           $cedulaSecre = $row['cedulaSecre'];
           $nombreSecre = $row['nombreSecre'];
           $idSede = $row['idSede'];
        }

    }
    
   #actualización
    if (isset($_POST['cedulaSecre'])) {
        $cedula =$_GET['cedulaSecre'];
        $cedulaSecre = $_POST['cedulaSecre'];
        $nombreSecre = $_POST['nombreSecre'];
        $idSede = $_POST['idSede'];

        $query = "UPDATE secretaria set cedulaSecre = '$cedulaSecre', nombreSecre = '$nombreSecre',
         idSede = '$idSede' WHERE cedulaSecre = $cedula";
        mysqli_query($conn, $query);
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("query fail");
        }

        $_SESSION['mesagge'] = 'Datos actualizados';
        $_SESSION['mesagge_type'] = 'danger';
        header("Location: indexSecretaria.php");


    }
?>
<?php include("includes/header.php")?>
    <div class="container p-4">
        <div class="col-md-4 mx-auto">
            <form action="editarSecretaria.php?cedulaSecre=<?php echo $_GET['cedulaSecre'];?>" method="post">
                <div class="form-group">
                <input type="number" name="cedulaSecre" value="<?php echo $cedulaSecre; ?>"
                class="form-control" placeholder="Cédula">
                </div>
                <div class="form-group">
                <input type="text" name="nombreSecre" value="<?php echo $nombreSecre; ?>"
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