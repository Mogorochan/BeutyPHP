<?php 
include("conexionSecretaria.php");
   if (isset($_POST['save'])) {
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $id = $_POST['id'];

     $query = "INSERT INTO secretaria(cedulaSecre, nombreSecre, idSede) 
     VALUES($cedula, '$nombre', $id)";
     $result = mysqli_query($conn, $query);
     if (!$result) {
         die("query fail");
     }
     $_SESSION['mesagge'] = 'Datos guardados';
     $_SESSION['mesagge_type'] = 'sucecess';
     header("Location: indexSecretaria.php");
   }    
?>
