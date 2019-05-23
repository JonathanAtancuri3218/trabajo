<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Crear Nuevo Usuario</title>

</head>
<body>
 <?php
 //incluir conexión a la base de datos
 include '../../config/conexionBD.php';
 if(isset($_POST["crear"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
	
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

 $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
 $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
 $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
 $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;

 $sql = $conn->query("INSERT INTO `usuarios` (`usu_codigo`,`usu_img`, `usu_nombres`, `usu_apellidos`, `usu_correo`, `usu_password`, `tipo`, `usu_fecha_modificacion`, `usu_fecha_creacion`, `usu_eliminado`) VALUES ('0',null, 'ds', 'fd', 'RFE8', '33', 'user', 
 CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 'N')");
    if($sql){
        echo "File uploaded successfully.";
    }else{
        echo "File upload failed, please try again.";
    } 
}else{
    echo "Please select an image file to upload.";
}
}  
$conn->close();
//echo "<a href='../vista/crear_usuario.html'>Regresar</a>";

 ?>
 
</body>
</html>