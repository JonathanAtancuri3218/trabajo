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

 <form id="formulario01" method="POST" action="../../controladores/admin/cambiar_contrasena.php">

 <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
 <label for="cedula">Contraseña Actual (*)</label>
 <input type="password" id="contrasena1" name="contrasena1" value="" required
placeholder="Ingrese su contraseña actual ..."/>
 <br>
 <label for="cedula">Contraseña Nueva (*)</label>
 <input type="password" id="contrasena2" name="contrasena2" value="" required
placeholder="Ingrese su contraseña nueva ..."/>
 <br>

 <input type="submit" id="modificar" name="modificar" value="Modificar" />
 <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
 <br>

 <a href='../../vista/admin/index.php?usuario=<?php echo $usuario; ?>'>Regresar</a>


 </form>
</body>
</html>