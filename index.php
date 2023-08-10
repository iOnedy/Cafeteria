<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo|Cafetería</title>
    <script type="text/javascript">

        function confirmar(){
            return confirm('¿Seguro que quieres eliminar este registro de la lista?');
        }
    </script>
    <link rel="stylesheet" href="CSS/estilo.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
</head>

<body>
    <div class="titu">
        <h1>Catálogo de la cafetería</h1>
    </div>

    <div class="f">
        <form action="insertar.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br>

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" step="0.01" required><br>

            <label for="fecha">Fecha de registro:</label>
            <input type="date" id="fecha" name="fecha" required><br>

            <label for="tamaño">Tamaño:</label>
            <input type="text" id="tamaño" name="tamaño" required><br>

            <input type="submit" value="Agregar" name="btn-agregar">
            
        </form>
    </div>
    <div class="t">
        <h2>Listado de Bebidas</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Fecha de registro</th>
                    <th>Tamaño</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
            include ("db.php");

                if (!$conn) {
                     die("Error en la conexión: " . mysqli_connect_error());
                    }
                    $sentencia = "SELECT * FROM bebidas WHERE Inhabilitado=0";
                    $resultado = mysqli_query($conn, $sentencia) or die(mysqli_error($conn));  
      while($filas=mysqli_fetch_assoc($resultado))
      {
        echo "<tr>";
          echo "<td>"; echo $filas['id']; echo "</td>";
          echo "<td>"; echo $filas['Nombre']; echo "</td>";
          echo "<td>"; echo $filas['Precio']; echo "</td>";
          echo "<td>"; echo $filas['Fecha']; echo "</td>";
          echo "<td>"; echo $filas['Tamaño']; echo "</td>";
          echo "<td>  <a href='modificar.php?id=".$filas['id']."'> <button type='button' class='btn-success'>Editar</button></a> 
          <a href='eliminar.php?id=".$filas['id']."''><button type='button' class='btn-danger' 
          onclick='return confirmar()'>Eliminar</button></a></td>";
        echo "</tr>";
      }

      ?>
          
            </tbody>
        </table>
    </div>
</body>

</html>