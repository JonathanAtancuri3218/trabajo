<?php
 $usuario=$_GET['usuario'];

 ?>

<!DOCTYPE html>

<html>
<head>
 <meta charset="UTF-8">
 <link href="../../../estilo2.css" rel="stylesheet" type="text/css">

 <title>Mensajes enviados</title>
</head>
<body>
<header>
        <nav>
            <ul>
                <a href="index.php?usuario=<?php echo $usuario; ?>">Inicio</a>
                <a href="crear_mensaje.php?usuario=<?php echo $usuario; ?>">Nuevo Mensaje</a>
                <a href="mensaje_enviado.php?usuario=<?php echo $usuario; ?>">Mensajes Enviados</a>
                <a href="index.php?usuario=<?php echo $usuario; ?>">Mi cuenta</a>

            </ul>
        </nav>
    </header>


    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
             
                      
             <div style="float: right"> 
            <label>USER: <?php  ?> </label>
             <br> <a href ="../../../config/cerrar_sesion.php">Cerrar Sesion</a>
            </div>
    </form>

    <label for="buscar" class="control-label">Buscar:</label>


 <table style="width:100%">
 <tr>

 <th>Fecha</th>
 <th><?php $campo ?></th>
 <th>Asunto</th>
 <th></th>

 </tr>

 <?php

 $usuario=$_GET['usuario'];


 //include '../../../config/conexionBD.php';
//echo "variable 1 = ".$hola."<br>";


include '../../../config/conexionBD.php';



$sql = "SELECT DISTINCT m.men_codigo, m.men_fecha, m.men_remitente ,
        m.men_asunto, m.men_destinatario,m.men_mensaje FROM men_usuarios a
         inner join mensajes m on m.men_codigo=a.men_codigo
        inner join usuarios u on u.usu_codigo=a.usu_codigo 
        where m.men_remitente ='$usuario'";




$result = $conn->query($sql);

 if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
       
   //printf ("%s (%s) (%s)\n", $row["tipo"], $row["usu_nombres"], $row["usu_co"]);


        echo "<tr>";
        //echo " <td>" . $row['usu_img'] . "</td>";
        echo " <td>" . $row['men_fecha'] ."</td>";
        echo " <td>" . $row['men_destinatario'] . "</td>";
        echo " <td>" . $row['men_asunto'] . "</td>";
       // echo " <td> <a href='leer.php?codigo=" . $row['men_codigo'] . "'>Leer</a> </td>";
        echo " <td> <a href='leer.php?campo=destinatario&fecha=" . $row['men_fecha'] ."&asunto=" . $row['men_asunto'] . "
        &rem_des=" . $row['men_destinatario'] ."&mensaje=" . $row['men_mensaje'] . "&usuario=" . $row['men_remitente'] . "'>Leer</a> </td>";
        echo "</tr>";
        
       }
 
 } else {
 echo "<tr>";
 echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
 echo "</tr>";
 }
 $conn->close();
 ?>
 </table>

</body>
</html>
