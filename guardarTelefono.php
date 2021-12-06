<?php 
include("conexionTelefono.php");
   if (isset($_POST['save'])) {
     $sede =  $_POST['idTel'];
     $tele = $_POST['tel'];

     $query = "INSERT INTO telefono(idSede,telefono) VALUES('$sede','$tele')";
     $result = mysqli_query($conn, $query);
     if (!$result) {
         die("query fail");
     }
     $_SESSION['mesagge'] = 'Datos guardados';
     $_SESSION['mesagge_type'] = 'sucecess';
     header("Location: indexTelefono.php");
   }    
?>