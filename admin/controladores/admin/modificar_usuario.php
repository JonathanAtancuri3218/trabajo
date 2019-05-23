<?php
 session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
 header("Location: /correo/public/vista/login.html");
 }
 ?>


<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Modificar datos de persona </title>
</head>
<body>
<?php
 //incluir conexión a la base de datos
 include '../../../config/conexionBD.php';
 $codigo = $_POST["codigo"];
 $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
 $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
 $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
 date_default_timezone_set("America/Guayaquil");
 $fecha = date('Y-m-d H:i:s', time());
 $sql = "UPDATE usuarios " .
 "SET usu_nombres = '$nombres', " .
 "usu_apellidos = '$apellidos', " .
 "usu_correo = '$correo', " .
 "usu_fecha_modificacion = '$fecha' " .
 "WHERE usu_codigo = $codigo";
 if ($conn->query($sql) === TRUE) {
 echo "Se ha actualizado los datos personales correctamemte!!!<br>";
 } else {
 echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
 }
 $conn->close();

?>
</body>
</html>