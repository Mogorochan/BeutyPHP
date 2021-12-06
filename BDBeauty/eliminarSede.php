<?php 
    include("conexionSede.php");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM sede WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("query fail");
        }

        $_SESSION['mesagge'] = 'Datos guardados';
        $_SESSION['mesagge_type'] = 'danger';
        header("Location: indexSede.php");
    }
    
   
?>