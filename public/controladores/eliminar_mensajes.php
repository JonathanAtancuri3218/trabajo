
<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Mensajes </title>
</head>
<body>
<?php
    //incluir conexiÃ³n a la base de datos
    include '../../config/conexionBD.php';
    $codigo = $_GET['men_codigo'];    

    $sql = "DELETE FROM mensajes WHERE men_codigo = $codigo";

    if ($conn->query($sql) === TRUE) {
        echo "Se ha eliminado los datos personales correctamemte!!!<br>";     
    } else {        
        echo "Error: " . $sql . "<br>" . $conn->errno . "<br>";        
    }
    echo "<a href='../../admin/vista/admin/index_mensajes.php'>Regresar</a>";

    $conn->close();
    
?>
</body>
</html>