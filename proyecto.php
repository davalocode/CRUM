<?php include "database.php" ?>
<html>
    <link rel="stylesheet" href="style.css">
<body>
<h1>Control de administracion</h1>
    <?php
    
    if (!$enlace) {
        echo "Conexión fallida: " . mysqli_connect_error();
    }
    else {
    echo "<a href='https://iawdanielvaldes-com.stackstaging.com/crear_datos.php' id='boton_anadir'>Añadir</a>";
    echo "<br>";
    echo "<table>";
    echo "<tr>";
    echo "<td class='cabecera'>ID</td>";
    echo "<td class='cabecera'>Planta</td>";
    echo "<td class='cabecera'>Aula</td>";
    echo "<td class='cabecera'>Descripcion</td>";
    echo "<td class='cabecera'>Fecha Alta</td>";
    echo "<td class='cabecera'>Fecha Revision</td>";
    echo "<td class='cabecera'>Fecha resolucion</td>";
    echo "<td class='cabecera'>Comentario</td>";
    echo "<td class='cabecera'>Visualizar</td>";
    echo "<td class='cabecera'>Editar</td>";
    echo "<td class='cabecera'>Borrar</td>";
    echo "</tr>";

        $query = "SELECT * FROM incidencias"; 
        $resultado = mysqli_query($enlace,$query); 
        
        if ($resultado->num_rows > 0) {
      // Saca datos de cada linea
      while($row = $resultado->fetch_assoc()) {
        
        $id=($row["id"]);
        $planta=($row["planta"]);
        $aula=($row["aula"]);
        $descripcion=($row["descripcion"]);
        $fecha_alta=($row["fecha_alta"]);
        $fecha_revision=($row["fecha_revision"]);
        $fecha_resolucion=($row["fecha_resolucion"]);
        $comentario=($row["comentario"]);
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$planta</td>";
        echo "<td>$aula</td>";
        echo "<td>$descripcion</td>";
        echo "<td>$fecha_alta</td>";
        echo "<td>$fecha_revision</td>";
        echo "<td>$fecha_resolucion</td>";
        echo "<td>$comentario</td>";
        echo "<td><a href='visualizar.php?incidencia_id={$id}'>Ver</a></td>";
        echo "<td><a href='editar_datos.php?editar&incidencia_id={$id}'>Editar</a></td>";
        echo "<td><a href='borrar_datos.php?eliminar={$id}'>Borrar</a></td>";
        echo "</tr>";

      }
      echo "</table>";
    } else {
      echo "0 results";
    }
        mysqli_close($enlace);
    }
?>
    
    
    
</body>
</html>