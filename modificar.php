<?php
include ("db.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/estilo.css">
</head>
<body>
  <?php
if(isset($_POST['btn-editar'])){
  $id=$_POST['id'];
  $nombre=$_POST['nombre'];
  $precio=$_POST['precio'];
  $tamaño=$_POST['tamaño'];

  $sql="UPDATE bebidas SET Nombre='".$nombre."', Precio='".$precio."',
   Tamaño='".$tamaño."' WHERE id='".$id."'";

  $resultado=mysqli_query($conn,$sql);

  if($resultado){
   echo "<script type='text/javascript'>
   alert('Sea editado exitosamente');
   window.location.href = 'index.php';
 </script>";

  }else{
    echo "<script type='text/javascript'>
    alert('No sea editado exitosamente');
    window.location.href = 'index.php';
  </script>";

  }

  mysqli_close($conn);

}
else{
  $id=$_GET['id'];
  $sql="SELECT * FROM bebidas where id= '".$id."'";
  $resultado = mysqli_query($conn, $sql);

  $fila = mysqli_fetch_assoc($resultado);
  $nombre=$fila['Nombre'];
  $precio=$fila['Precio'];
  $fecha=$fila['Fecha'];
  $tamaño=$fila['Tamaño'];

  mysqli_close($conn);
}

  ?>
    <div class="m">
        <h1>EDITAR</h1>
    </div>

    <div class="f2">
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
       
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre"  value="<?php echo $nombre; ?>" require><br>

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" step="0.01"  value="<?php echo $precio; ?>" require><br>

            <input type="hidden" name="fecha" value="<?php echo $fecha; ?>">

            <label for="tamaño">Tamaño:</label>
            <input type="text" id="tamaño" name="tamaño"  value="<?php echo $tamaño; ?>" require><br>

            <input type="submit" value="Editar" name="btn-editar">
            </table>
        </form>
    </div>
    
</body>
</html>