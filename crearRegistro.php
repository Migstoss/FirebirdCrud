<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Document</title>
  <?php include('include/navbar.php');?>
</head>
<body>

<?php
include ("database.php");
$usuario= new Database();
if(isset($_POST) && !empty($_POST)){
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  
  $res = $usuario->create($nombre, $apellido);
  if($res){
    $message= "Datos insertados con éxito";
    $class="alert alert-success";
  }else{
    $message="No se pudieron insertar los datos";
    $class="alert alert-danger";
  }
  ?>
  <div class="<?php echo $class?>">
    <?php echo $message;?>
  </div>
  <?php
}
  if($_GET['btnbuscar']){mensaje();}
    $conn = ibase_connect("www.ctdsas.com/gds_db:/var/www/html/innpulsasmi/bd/11111.fdb", "SYSDBA", "C7d5452014");
    $query = "SELECT * FROM TABLAPRUEBA1 WHERE ID = $id";
    $res = ibase_query($conn,$query);
    while($result = ibase_fetch_assoc($res)){
      $nombreD = $result[0];
      $apellidoD = $result[1];
    }
?>   

<div class="row">
  <form method="post">
    <div class="col-md-6">
      <label>ID:</label>
      <input type="text" name="id" id="id" class='form-control'  maxlength="100">
    </div>
    <div class="col-md-6">
      <label>Nombres:</label>
      <input type="text" name="nombre" id="nombre" class='form-control' value="<?php $nombreD?>" maxlength="100" required >
    </div>
    <div class="col-md-6">
      <label>Apellidos:</label>
      <input type="text" name="apellido" id="apellido" class='form-control' value="<?php $apellidoD?>" maxlength="100" required>
    </div>
    
    <div class="col-md-12 pull-right">
      <hr>
      <button type="submit" class="btn btn-success" id="btnguardar">Guardar datos</button>
      <button type="button" class="btn btn-info" id="btnbuscar" name="btnbuscar">Buscar</button>
    </div>
  </form>
</div>
</body>
</html>

<?php
function mensaje(){
  echo'<script type="text/javascript">
    alert("Tarea Guardada");
    </script>';
}
?>