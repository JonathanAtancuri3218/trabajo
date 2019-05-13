<!DOCTYPE html>
<html>
<head>
    <title>Modificar datos de persona </title>
</head>
<body>
<?php
    

    //incluir conexiÃ³n a la base de datos
    include '../../config/conexionBD.php';
    $codigo = $_POST['usu_codigo'];    
    $cedula = isset($_POST['usu_cedula']) ? strtoupper(trim($_POST['usu_cedula'])) : null;
    $nombres = strtoupper(trim($_POST['usu_nombres']));
    $apellidos = strtoupper(trim($_POST['usu_apellidos']));
    $direccion = strtoupper(trim($_POST['usu_direccion']));
    $telefono = $_POST['usu_telefono'];
    $correo = strtoupper(trim($_POST['usu_correo']));
    $contrasena = $_POST['usu_password'];
    $fecha_Nacimiento = strtoupper(trim($_POST['usu_fecha_nacimiento']));


    $sql = "UPDATE usuario " .
           "SET usu_nombres = '$nombres', " .
           "usu_apellidos = '$apellidos', " .
           "usu_direccion ='$direccion'," .
           "usu_telefono = '$telefono', " .
           "usu_correo = '$correo', ". 
           "usu_password = '$contrasena', ".
           "usu_fecha_nacimiento = '$fecha_Nacimiento', ".
           "WHERE usu_codigo = $codigo";

    if ($conn->query($sql) === TRUE) {
        echo "Se ha actualizado los datos personales correctamemte!!!<br>";     
    } else {        
        echo "Error: " . $sql . "<br>" . $conn->errno . "<br>";        
    }
    echo "<a href='../../admin/vista/usuario/index.php'>Regresar</a>";

    $conn->close();
    
?>
</body>
</html>