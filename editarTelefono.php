<?php 
    include("conexionTelefono.php");
    if (isset($_GET['telefono'])) {
        $id = $_GET['telefono'];
        $query = "SELECT * FROM telefono WHERE telefono = $id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result)== 1) {
           $row = mysqli_fetch_array($result);
           $idSede = $row['idSede'];
           $telefono = $row['telefono'];
        }

    }
    
   #actualización
    if (isset($_POST['telefono'])) {
        $id =$_GET['telefono'];
        $idSede = $_POST['idSede'];
        $telefono = $_POST['telefono'];

        $query = "UPDATE telefono set idSede = '$idSede', telefono = '$telefono' WHERE telefono = $id";
        mysqli_query($conn, $query);

        $_SESSION['mesagge'] = 'Datos actualizados';
        $_SESSION['mesagge_type'] = 'danger';
        header("Location: indexTelefono.php");


    }
?>
<?php include("includes/header.php")?>
    <div class="container p-4">
        <div class="col-md-4 mx-auto">
            <form action="editarTelefono.php?telefono=<?php echo $_GET['telefono'];?>" method="post">
                <div class="form-group">
                <input type="number" name="idSede" value="<?php echo $idSede; ?>"
                class="form-control">
                </div>
                <div class="form-group">
                <input type="number" name="telefono" value="<?php echo $telefono; ?>"
                class="form-control">
                </div>
                <button class="btn btn-success" name="update">
                    Actualizar
                </button>
            </form>
        </div>
    </div>
<?php include("includes/footer.php")?>