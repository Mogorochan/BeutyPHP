<?php 
    include("conexionCita.php");
    if (isset($_GET['idCitas'])) {
        $idCitas = $_GET['idCitas'];
        $query = "DELETE FROM cita WHERE idCitas = $idCitas";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("query fail");
        }

        $_SESSION['mesagge'] = 'Datos guardados';
        $_SESSION['mesagge_type'] = 'danger';
        header("Location: indexCita.php");
    }
    
   
?>