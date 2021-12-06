<?php 
include("conexionPaciente.php");
   if (isset($_POST['save'])) {
    $cedula = $_POST['cedula'];
    $nombre = $_POST['name'];
    $apellido = $_POST['lastname'];
    $idsede = $_POST['idSede'];

     $query = "INSERT INTO paciente(cedula, nombres, apellidos, idSede) 
     VALUES($cedula, '$nombre', '$apellido', $idsede)";
     $result = mysqli_query($conn, $query);
     if (!$result) {
         die("query fail");
     }
     $_SESSION['mesagge'] = 'Datos guardados';
     $_SESSION['mesagge_type'] = 'sucecess';
     header("Location: indexPaciente.php");
   }    
?>