
<!DOCTYPE html>
<html>
<head>
    <title>Eliminar datos de persona </title>
</head>
<body>
<?php
    //incluir conexiÃ³n a la base de datos
    include '../../config/conexionBD.php';
    $codigo = $_GET['usu_codigo'];    

    $sql = "DELETE FROM usuario WHERE usu_codigo = $codigo";

    if ($conn->query($sql) === TRUE) {
        echo "Se ha eliminado los datos personales correctamemte!!!<br>";     
    } else {        
        echo "Error: " . $sql . "<br>" . $conn->errno . "<br>";        
    }
    echo "<a href='../../admin/vista/usuario/index.php'>Regresar</a>";

    $conn->close();
    
?>
</body>
</html>