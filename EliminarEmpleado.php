<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Eliminar Empleado</title>
    <?php $page='EliminarEmpleado'; Include('Header.php');?>
  </head>
  <body>
    <?php
      $dbconn = pg_connect("host=159.89.34.186 dbname=aeropuerto user=postgres password=papitopiernaslargas69");
        if($dbconn){
          $result = pg_query($dbconn,"SELECT dni FROM Empleado");
          foreach (pg_fetch_all($result) as $row) {
              $combobit .="<option value='".$row['dni']."'>".$row['dni']."</option>"; 
          }
          if(isset($_POST['eliminarE'])){
              pg_query_params($dbconn,"SELECT delelteempleado($1)",array($_REQUEST['eliminar']));
              echo("<script>aler('Empleado Eliminado!');</script>");
          }
          pg_close($dbconn);
        }
      ?>
      <form class="form_base" method="POST">
        <h1>¿Cual Empleado Quiere Eliminar?</h1>
        <select name = 'eliminar'>
          <?php echo($combobit)?>
        </select>
        <input type="submit", name="eliminarE", value="Eliminar">
      </form>
  </body>
</html>

