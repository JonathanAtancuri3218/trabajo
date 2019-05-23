<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Leer</title>
</head>
<body>
 <?php
$usuario=$_GET["usuario"];
 $fecha = $_GET["fecha"];
 $rem_des = $_GET["rem_des"];
 $asunto = $_GET["asunto"];
 $mensaje = $_GET["mensaje"];
 $campo=$_GET['campo'];


 //$sql = "SELECT * FROM usuarios where usu_codigo=$codigo";

 include '../../../config/conexionBD.php';
 //$result = $conn->query($sql);


 ?>
 <form id="formulario01" method="POST" action="../../controladores/usuario/eliminar.php">
 <label for="fecha">Fecha </label>
 <input type="text" id="fecha" name="fecha" value="<?php echo $fecha ?>" 
 disabled />
 <br>
 <label for="remitente"><?php echo $campo; ?> </label>
 <input type="text" id="remitente" name="remitente" value="<?php echo $rem_des;
?>" disabled/>
 <br>
 <label for="asunto">Asunto </label>
 <input type="text" id="asunto" name="asunto" value="<?php echo $asunto;
?>" disabled/>
 <br>
 <label for="mensaje">Mensaje </label>
 <input type="text" id="mensaje" name="mensaje" value="<?php echo $mensaje; ?>"
disabled/>
<br>
<a href="index.php?usuario=<?php echo $usuario; ?>">Regresar</a>
<br>
 </form>
 <?php
 $conn->close();
 ?>
</body>
</html>