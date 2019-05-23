<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <link href="../../../estilo.css" rel="stylesheet" type="text/css">
 <title>Nuevo mensaje</title>
</head>
<body>
<div class="group">

 <form id="formulario01" method="POST" action="">
 <label for="destinatario">Destinatario </label>
 <input type="text" id="destinatario" name="destinatario" value="" placeholder="Ingrese el correo ..."/>

 <label for="nombres">Asunto </label>
 <input type="text" id="asunto" class="form-input" name="asunto" value="" placeholder="Ingrese su
contraseña ..."/>

 <label for="mensaje">Mensaje </label>
 <input type="text" id="mensaje"   class="form-input2" name="mensaje" value="" placeholder="Ingrese su
contraseña ..."/>
<br>

 <input type="submit" id="enviar"  name="enviar" value="Enviar" />



 <?php
 //incluir conexión a la base de datos
 include '../../../config/conexionBD.php';


 $destinatario = isset($_POST["destinatario"]) ? mb_strtoupper(trim($_POST["destinatario"]), 'UTF-8') : null;
 $asunto = isset($_POST["asunto"]) ? mb_strtoupper(trim($_POST["asunto"]), 'UTF-8') : null;
 $mensaje = isset($_POST["mensaje"]) ? mb_strtoupper(trim($_POST["mensaje"]), 'UTF-8') : null;
 $remitente = $_GET["usuario"];

 
 $sql = $conn->query("INSERT INTO `mensajes` (`men_codigo`, `men_fecha`, `men_remitente`, 
                    `men_destinatario`, `men_mensaje`, `men_asunto`) 
                      VALUES ('0', CURRENT_TIMESTAMP, '$remitente', '$destinatario', 
                      '$mensaje', '$asunto');");

                      
  
 ?>
  </form> 
</div>
</body>
</html>