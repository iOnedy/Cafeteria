<?php
$id = $_GET['id'];

include ("db.php");
$sql = "UPDATE bebidas SET inhabilitado = 1 WHERE id = '".$id."'";

$resultado = mysqli_query($conn, $sql);
if($resultado){
    echo "<script type='text/javascript'>
    alert('Sea inhabilitado exitosamente');
    window.location.href = 'index.php';
  </script>";
 
   }else{
     echo "<script type='text/javascript'>
     alert('No sea inhanilitado exitosamente');
     window.location.href = 'index.php';
   </script>";
 
   }

?>
