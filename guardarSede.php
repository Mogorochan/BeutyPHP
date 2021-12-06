<?php 
include("conexionSede.php");
   if (isset($_POST['save'])) {
     $id = $_POST['id'];
     $centroComercial = $_POST['cc'];
     $local = $_POST['local'];
     $horarioApertura = $_POST['star'];
     $horarioCierre = $_POST['end'];

     $query = "INSERT INTO sede(id, centroComercial, localn, horarioApertura, horarioCierre) 
     VALUES('$id', '$centroComercial', '$local', '$horarioApertura', '$horarioCierre')";
     $result = mysqli_query($conn, $query);
     if (!$result) {
         die("query fail");
     }
     $_SESSION['mesagge'] = 'Datos guardados';
     $_SESSION['mesagge_type'] = 'sucecess';
     header("Location: indexSede.php");
   }    
?>