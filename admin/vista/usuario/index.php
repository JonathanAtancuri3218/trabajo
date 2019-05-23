<?php
 $usuario=$_GET['usuario'];

 ?>


<!DOCTYPE html>

<html>
<head>
 <meta charset="UTF-8">
 <link href="../../../estilo2.css" rel="stylesheet" type="text/css">
 <script src="../../../jquery-3.1.1.min.js"></script>
 <script src="../../../peticion.js"></script>
 <title>Gestión de usuarios</title>
</head>
<body>
<header>
        <nav>
            <ul>
                <a href="index.php?usuario=<?php echo $usuario; ?>">Inicio</a>
                <a href="crear_mensaje.php?usuario=<?php echo $usuario; ?>">Nuevo Mensaje</a>
                <a href="mensaje_enviado.php?usuario=<?php echo $usuario; ?>">Mensajes Enviados</a>
                <a href="Formula1.html">Mi cuenta</a>

            </ul>
        </nav>
    </header>


    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
             
                      
             <div style="float: right"> 
            <label>USER: <?php  ?> </label>
             <br> <a href ="../../../config/cerrar_sesion.php">Cerrar Sesion</a>
            </div>
    </form>

    <section>
			<input type="text" name="busqueda" id="busqueda" placeholder="Buscar...">
		</section>

		<section id="tabla_resultado">
		<!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
        </section>


 <table style="width:100%">
 <tr>

 <th>Fecha</th>
 <th>Remitente</th>
 <th>Asunto</th>
 <th></th>

 </tr>

 <?php



 //include '../../../config/conexionBD.php';
//echo "variable 1 = ".$hola."<br>";


include '../../../config/conexionBD.php';


$sql = "SELECT DISTINCT m.men_codigo, m.men_fecha, m.men_remitente ,
        m.men_asunto, m.men_destinatario,m.men_mensaje FROM men_usuarios a
         inner join mensajes m on m.men_codigo=a.men_codigo
        inner join usuarios u on u.usu_codigo=a.usu_codigo 
        where m.men_destinatario ='$usuario'";





if(isset($_POST['alumnos']))
{
	$q=$conn->real_escape_string($_POST['alumnos']);
	$sql="SELECT DISTINCT m.men_codigo, m.men_fecha, m.men_remitente ,
    m.men_asunto, m.men_destinatario,m.men_mensaje FROM men_usuarios a
     inner join mensajes m on m.men_codigo=a.men_codigo
    inner join usuarios u on u.usu_codigo=a.usu_codigo 
    where m.men_destinatario ='sda@gmail.com' and 
		m.men_asunto LIKE '%".$q."%'";
}

$result = $conn->query($sql);

 if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       
   //printf ("%s (%s) (%s)\n", $row["tipo"], $row["usu_nombres"], $row["usu_co"]);


        echo "<tr>";
        //echo " <td>" . $row['usu_img'] . "</td>";
        echo " <td>" . $row['men_fecha'] ."</td>";
        echo " <td>" . $row['men_remitente'] . "</td>";
        echo " <td>" . $row['men_asunto'] . "</td>";
        echo " <td> <a href='leer.php?campo=remitente&fecha=" . $row['men_fecha'] ."&asunto=" . $row['men_asunto'] . "
        &rem_des=" . $row['men_remitente'] ."&mensaje=" . $row['men_mensaje'] . "&usuario=" . $row['men_destinatario'] . " '>Leer</a> </td>";
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
<script src="../../../js/jquery-1.11.2.js"></script>
<script src="../../../js/bootstrap.min.js"></script>
<script src="../../../js/libros.js"></script>
</body>
</html>
