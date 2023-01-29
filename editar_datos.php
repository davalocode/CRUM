<?php include "database.php" ?>
<?php
   if(isset($_GET['incidencia_id']))
    {
      $incidenciaid = htmlspecialchars($_GET['incidencia_id']); 
    }
      
      $query="SELECT * FROM incidencias WHERE id = $incidenciaid ";
      $vista_incidencias= mysqli_query($enlace,$query);

      while($row = mysqli_fetch_assoc($vista_incidencias))
        {
          $id = $row['id'];                
          $planta = $row['planta'];        
          $aula = $row['aula'];         
          $descripcion = $row['descripcion'];        
          $fecha_alta = $row['fecha_alta'];        
          $fecha_rev = $row['fecha_rev'];        
          $fecha_sol = $row['fecha_sol'];        
          $comentario = $row['comentario'];
        }
 
    if(isset($_POST['editar'])) 
    {
      $planta = htmlspecialchars($_POST['usuario_planta']);
      $aula = htmlspecialchars($_POST['usuario_aula']);
      $descripcion = htmlspecialchars($_POST['usuario_descripcion']);
      $fecha_alta = htmlspecialchars($_POST['usuario_fecha_alta']);
      $fecha_revision = htmlspecialchars($_POST['usuario_fecha_revision']);
      $fecha_resolucion = htmlspecialchars($_POST['usuario_fecha_resolucion']);
      $comentario = htmlspecialchars($_POST['comentario']);
      $query = "UPDATE incidencias SET planta = '{$planta}' , aula = '{$aula}' , descripcion = '{$descripcion}', fecha_alta = '{$fecha_alta}', fecha_revision = '{$fecha_revision}', fecha_resolucion = '{$fecha_resolucion}', comentario = '{$comentario}' WHERE id = {$id}";
      $incidencia_actualizada = mysqli_query($enlace, $query);
      if (!$incidencia_actualizada)
        echo "Se ha producido un error al actualizar la incidencia.";
      else
        echo "<script type='text/javascript'>alert('¡Datos de la incidencia actualizados!'); window.location.href='https://iawdanielvaldes-com.stackstaging.com/proyecto.php';</script>";
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

    <input type="submit" name="editar">
    </form>
    <a href='https://iawdanielvaldes-com.stackstaging.com/proyecto.php'>Volver</a>
</html>
  </body>