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
 <title>Modificar datos de persona</title>
</head>
<body>
 <?php


 $sql = "SELECT * FROM usuarios where usu_codigo=$codigo";
 include '../../../config/conexionBD.php';
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {

 while($row = $result->fetch_assoc()) {
 ?>
 <form id="formulario01" method="POST" action="../../controladores/admin/modificar_usuario.php">

 <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
 <br>
 <label for="nombres">Nombres (*)</label>
 <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"];
?>" required placeholder="Ingrese los dos nombres ..."/>
 <br>
 <label for="apellidos">Apelidos (*)</label>
 <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"];
?>" required placeholder="Ingrese los dos apellidos ..."/>
 <br>
 <label for="correo">Correo (*)</label>
 <input type="text" id="correo" name="correo" value="<?php echo $row["usu_correo"];
?>" required placeholder="Ingrese el correo ..."/>
 <br>

 <input type="submit" id="modificar" name="modificar" value="Modificar" />
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