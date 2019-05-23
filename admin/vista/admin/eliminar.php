
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
 <title>Eliminar datos de persona</title>
</head>
<body>
 <?php

 $sql = "SELECT * FROM usuarios where usu_codigo=$codigo";

 include '../../../config/conexionBD.php';
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {

 while($row = $result->fetch_assoc()) {
 ?>
 <form id="formulario01" method="POST" action="../../controladores/usuario/eliminar.php">
 <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
 <br>
 <label for="nombres">Nombres (*)</label>
 <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"];
?>" disabled/>
 <br>
 <label for="apellidos">Apelidos (*)</label>
 <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"];
?>" disabled/>
 <br>
 <label for="correo">Correo electrónico (*)</label>
 <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>"
disabled/>
 <br>
 <label for="contrasena">Contrasena(*)</label>
 <input type="password" id="contrasena" name="contrasena" value="<?php echo $row["usu_password"]; ?>"
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
 echo "<a href='../../vista/admin/index.php?usuario=$usuario'>Regresar</a>";

 $conn->close();
 ?>
</body>
</html>