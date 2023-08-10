<?php
include ("db.php");
if (isset($_POST["btn-agregar"])) {
  
$nom= $_POST["nombre"];
$pre= $_POST["precio"];
$fec= $_POST["fecha"];
$tama= $_POST["tamaño"];

$consulta ="INSERT INTO bebidas (Nombre, Precio, Fecha, Tamaño) VALUES 
('$nom','$pre','$fec','$tama')";

if (mysqli_query ($conn, $consulta)){
   
echo "
<script type='text/javascript'>
	alert('Sea ingresado correctamente');
	window.location.href='index.php';
</script>";

}
else{
    
echo "
  <script type='text/javascript'>
	alert('No sea ingresado datos');
	window.location.href='index.php';
</script>";
   
}
}
mysqli_close($conn);
?>