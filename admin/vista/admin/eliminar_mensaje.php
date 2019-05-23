<?php
 $codigo = $_GET["codigo"];
 $usuario = $_GET["usuario"];
 session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
 header("Location: /correo/public/vista/login.html");
 }

 ?>


<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Eliminar Mensaje</title>
</head>
<body>
 <?php




 $sql = "SELECT * FROM mensajes where men_codigo=$codigo";

 include '../../../config/conexionBD.php';
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {

 while($row = $result->fetch_assoc()) {
 ?>
 <form id="formulario01" method="POST" action="../../controladores/usuario/eliminar_mensaje.php">
 <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
 <br>
 <label for="fecha">Fecha (*)</label>
 <input type="text" id="fecha" name="fecha" value="<?php echo $row["men_fecha"];
?>" disabled/>
 <br>
 <label for="remitente">Remitente (*)</label>
 <input type="text" id="remitente" name="remitente" value="<?php echo $row["men_remitente"];
?>" disabled/>
 <br>
 <label for="destinatario">Destinatario (*)</label>
 <input type="text" id="destinatario" name="destinatario" value="<?php echo $row["men_destinatario"]; ?>"
disabled/>
 <br>
 <label for="mensaje">Mensaje (*)</label>
 <input type="text" id="mensaje" name="contrasena" value="<?php echo $row["men_mensaje"]; ?>"
disabled/>
<br>
<label for="asunto">Asunto (*)</label>
 <input type="text" id="asunto" name="asunto" value="<?php echo $row["men_asunto"]; ?>"
disabled/>
<br>
 <input type="submit" id="eliminar" name="eliminar" value="Eliminar" />
 <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
 </form>
 <?php
 }
 } else {
 echo "<p>Ha ocurrido un error inesperado !</p>";
 echo "<p>" . mysqli_error($conn) . "</p>";
 }
 echo "<a href='../../vista/admin/index_mensajes.php?usuario=$usuario'>Regresar</a>";

 $conn->close();
 ?>
</body>
</html>