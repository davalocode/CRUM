<?php include "database.php" ?>

<?php 
  if(isset($_POST['crear'])) 
    {
        $planta = htmlspecialchars($_POST['usuario_planta']);
        $aula = htmlspecialchars($_POST['usuario_aula']);
        $descripcion = htmlspecialchars($_POST['usuario_descripcion']);
        $comentario = htmlspecialchars($_POST['usuario_comentario']);
        $fecha_alta = htmlspecialchars($_POST['usuario_fecha_alta']);
        $fecha_rev = htmlspecialchars($_POST['usuario_fecha_revision']);
        $fecha_sol = htmlspecialchars($_POST['usuario_fecha_resolucion']);
      
        $query= "INSERT INTO incidencias(planta, aula, descripcion, fecha_alta, fecha_revision, fecha_resolucion, comentario) VALUES('{$planta}','{$aula}','{$descripcion}','{$fecha_alta}','{$fecha_rev}','{$fecha_sol}','{$comentario}')";
        $resultado = mysqli_query($enlace,$query);
    
          if (!$resultado) {
              echo "Algo ha ido mal añadiendo la incidencia: ". mysqli_error($enlace);
          }
          else
          {
            echo "<script type='text/javascript'>alert('¡Incidencia añadida con éxito!'); window.location.href='https://iawdanielvaldes-com.stackstaging.com/proyecto.php';</script>";
          }         
    }
?>

<html>
<link rel="stylesheet" href="style.css">
    <body>

<form method="post">
    <input type="text" placeholder="Planta" name="usuario_planta" required>
    <input type="text" placeholder="Aula" name="usuario_aula" required>
    <input type="text" placeholder="Descripcion" name="usuario_descripcion" required>
    <input type="date" placeholder="Fecha Alta" name="usuario_fecha_alta" required>
    <input type="date" placeholder="Fecha Revision" name="usuario_fecha_revision" required>
    <input type="date" placeholder="Fecha Resolucion" name="usuario_fecha_resolucion" required>
    <input type="text" placeholder="Comentario" name="usuario_comentario">

    <input type="submit" name="crear">
    </form>
    <a href='https://iawdanielvaldes-com.stackstaging.com/proyecto.php'>Volver</a>

</html>
  </body>