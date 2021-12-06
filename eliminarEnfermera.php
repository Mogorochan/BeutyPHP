<?php 
    include("conexionEnfermera.php");
    if (isset($_GET['cedulaEnfer'])) {
        $cedulaEnfer = $_GET['cedulaEnfer'];
        $query = "DELETE FROM enfermera WHERE cedulaEnfer = $cedulaEnfer";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("query fail");
        }

        $_SESSION['mesagge'] = 'Datos guardados';
        $_SESSION['mesagge_type'] = 'danger';
        header("Location: indexEnfermera.php");
    }
    
   
?>