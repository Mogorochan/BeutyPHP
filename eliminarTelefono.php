<?php 
    include("conexionTelefono.php");
    if (isset($_GET['telefono'])) {
        $telefono = $_GET['telefono'];
        $query = "DELETE FROM telefono WHERE telefono = $telefono";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("query fail");
        }

        $_SESSION['mesagge'] = 'Datos guardados';
        $_SESSION['mesagge_type'] = 'danger';
        header("Location: indexTelefono.php");
    }
    
   
?>