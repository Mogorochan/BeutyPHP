<?php 
    include("conexionOferta.php");
    if (isset($_GET['idOferta'])) {
        $idOferta = $_GET['idOferta'];
        $query = "DELETE FROM oferta WHERE idOferta = $idOferta";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("query fail");
        }

        $_SESSION['mesagge'] = 'Datos guardados';
        $_SESSION['mesagge_type'] = 'danger';
        header("Location: indexOferta.php");
    }
    
   
?>