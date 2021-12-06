<?php 
    include("conexionOferta.php");
    if (isset($_GET['idOferta'])) {
        $id = $_GET['idOferta'];
        $query = "SELECT * FROM oferta WHERE idOferta = $id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result)== 1) {
           $row = mysqli_fetch_array($result);
           $idOferta = $row['idOferta'];
           $precio = $row['precio'];
           $zona = $row['zona'];
           $inicio = $row['inicio'];
           $fin = $row['fin'];
           $pacienteCedula = $row['pacienteCedula'];
           $idCitas = $row['idCitas'];
           $idSede = $row['idSede'];
        }

    }
    
   #actualización
    if (isset($_POST['idOferta'])) {
        $id =$_GET['idOferta'];
        $idOferta = $_POST['idOferta'];
        $precio = $_POST['precio'];
        $zona = $_POST['zona'];
        $inicio = $_POST['inicio'];
        $fin = $_POST['fin'];
        $pacienteCedula = $_POST['pacienteCedula'];
        $idCitas = $_POST['idCitas'];
        $idSede = $_POST['idSede'];

        $query = "UPDATE oferta set idOferta = '$idOferta', precio = '$precio', zona = '$zona', 
        inicio = '$inicio', fin = '$fin', pacienteCedula = '$pacienteCedula', idCitas = '$idCitas',
        idSede =  '$idSede' WHERE idOferta = $id";
        mysqli_query($conn, $query);
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("query fail");
        }

        $_SESSION['mesagge'] = 'Datos actualizados';
        $_SESSION['mesagge_type'] = 'danger';
        header("Location: indexOferta.php");


    }
?>
<?php include("includes/header.php")?>
    <div class="container p-4">
        <div class="col-md-4 mx-auto">
            <form action="editarOferta.php?idOferta=<?php echo $_GET['idOferta'];?>" method="post">
                <div class="form-group">
                <input type="number" name="idOferta" value="<?php echo $idOferta; ?>"
                class="form-control" placeholder="ID oferta">
                </div>
                <div class="form-group">
                <input type="number" name="precio" value="<?php echo $precio; ?>"
                class="form-control" placeholder="Precio">
                </div>
                <div class="form-group">
                <input type="text" name="zona" value="<?php echo $zona; ?>"
                class="form-control" placeholder="Zona">
                </div>
                <div class="form-group">
                <input type="date" name="inicio" value="<?php echo $inicio; ?>"
                class="form-control" placeholder="Inicio">
                </div>
                <div class="form-group">
                <input type="date" name="fin" value="<?php echo $fin; ?>"
                class="form-control" placeholder="Fin">
                </div>
                <div class="form-group">
                <input type="number" name="pacienteCedula" value="<?php echo $pacienteCedula; ?>"
                class="form-control" placeholder="Cédula paciente">
                </div>
                <div class="form-group">
                <input type="number" name="idCitas" value="<?php echo $idCitas; ?>"
                class="form-control" placeholder="ID cita">
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