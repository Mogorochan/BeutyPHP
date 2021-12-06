<?php 
include("conexionPaciente.php");
   if (isset($_POST['save'])) {
    $oferta = $_POST['idOferta'];
    $precio = $_POST['cost'];
    $zona = $_POST['zona'];
    $inicio = $_POST['star'];
    $fin = $_POST['end'];
    $cedula = $_POST['cedula'];
    $idcita = $_POST['cita'];
    $idsede = $_POST['idSede'];

     $query = "INSERT INTO oferta(idOferta, precio, zona, inicio, fin, pacienteCedula, 
     idCitas, idSede) 
     VALUES('$oferta', '$precio', '$zona', '$inicio', '$fin', '$cedula', '$idcita', '$idsede')";
     $result = mysqli_query($conn, $query);
     if (!$result) {
         die("query fail");
     }
     $_SESSION['mesagge'] = 'Datos guardados';
     $_SESSION['mesagge_type'] = 'sucecess';
     header("Location: indexOferta.php");
   }    
?>