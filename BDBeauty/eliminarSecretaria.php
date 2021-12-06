<?php 
    include("conexionSecretaria.php");
    if (isset($_GET['cedulaSecre'])) {
        $cedula = $_GET['cedulaSecre'];
        $query = "DELETE FROM secretaria WHERE cedulaSecre = $cedula";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("query fail");
        }

        $_SESSION['mesagge'] = 'Datos guardados';
        $_SESSION['mesagge_type'] = 'danger';
        header("Location: indexSecretaria.php");
    }
    
   
?>