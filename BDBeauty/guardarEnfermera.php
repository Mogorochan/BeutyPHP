<?php 
include("conexionPaciente.php");
   if (isset($_POST['save'])) {
    $tarjeta = $_POST['tarjeta'];
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
     $idsede = $_POST['idSede'];

     $query = "INSERT INTO enfermera(tarjetaProfesional, cedulaEnfer, nombre, idSede) 
     VALUES($tarjeta, $cedula, '$nombre', $idsede)";
     $result = mysqli_query($conn, $query);
     if (!$result) {
         die("query fail");
     }
     $_SESSION['mesagge'] = 'Datos guardados';
     $_SESSION['mesagge_type'] = 'sucecess';
     header("Location: indexEnfermera.php");
   }    
?>