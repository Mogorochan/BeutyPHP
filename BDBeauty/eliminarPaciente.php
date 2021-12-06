<?php 
    include("conexionPaciente.php");
    if (isset($_GET['cedula'])) {
        $cedula = $_GET['cedula'];
        $query = "DELETE FROM paciente WHERE cedula = $cedula";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("query fail");
        }

        $_SESSION['mesagge'] = 'Datos guardados';
        $_SESSION['mesagge_type'] = 'danger';
        header("Location: indexPaciente.php");
    }
    
   
?>