<?php 
include("conexionCita.php");
   if (isset($_POST['save'])) {
    $idCitas = $_POST['idCita'];
    $dia = $_POST['dia'];
    $hora = $_POST['hora'];
    $zona = $_POST['zona'];
    $duracion = $_POST['duracion'];
    $tarjetaProEnfer = $_POST['tarjeta'];
    $cedulaPaciente = $_POST['cedula'];
    $idSede = $_POST['idSede'];

     $query = "INSERT INTO cita(idCitas, dia, hora, zona, duracion, tarjetaProEnfer, 
     cedulaPaciente, idSede) 
     VALUES('$idCitas', '$dia', '$hora','$zona', '$duracion', '$tarjetaProEnfer', '$cedulaPaciente', '$idSede')";
     $result = mysqli_query($conn, $query);
     if (!$result) {
         die("query fail");
     }
     $_SESSION['mesagge'] = 'Datos guardados';
     $_SESSION['mesagge_type'] = 'sucecess';
     header("Location: indexCita.php");
   }    
?>