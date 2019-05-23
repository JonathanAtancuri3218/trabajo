

<?php
 $usuario=$_GET['usuario'];
 $remitente=$_GET['usuario'];
 $destinatario=$_GET['usuario'];
 session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
 header("Location: /correo/public/vista/login.html");
 }

 ?>
<!DOCTYPE html>


<html>
<head>
 <meta charset="UTF-8">
 <link href="../../../estilo2.css" rel="stylesheet" type="text/css">

 <title>Gestión de usuarios</title>
</head>
<body>
<header>
        <nav>
            <ul>
                <a href="index_mensajes.php?usuario=<?php echo $usuario; ?>">Inicio</a>
                <a href="index.php?usuario=<?php echo $usuario; ?>">Usuarios</a>
            </ul>
        </nav>
    </header>

    <img src="archivo.jpg" width="300" height="150">


    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
             
                      
             <div style="float: right"> 
            <label>Administrador: <?php  ?> </label>
             <br> <a href ="../../../config/cerrar_sesion.php">Cerrar Sesion</a>
            </div>
    </form>

    <div >
				<h2 style="text-align:center">Mensajes electronicos</h2>
    </div>
            
    

 <table style="width:100%">
 <tr>

 <th>Codigo</th>
 <th>Fecha</th>
 <th>Remitente</th>
 <th>Destinatario</th>
 <th>Asunto</th>
 <th>Eliminar</th>


 </tr>
 <?php
 include '../../../config/conexionBD.php';
$sql = "SELECT * FROM mensajes order by men_fecha desc";
$result = $conn->query($sql);

 if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        //echo " <td>" . $row['usu_img'] . "</td>";
        echo " <td>" . $row['men_codigo'] ."</td>";
        echo " <td>" . $row['men_fecha'] . "</td>";
        echo " <td>" . $row['men_remitente'] . "</td>";
        echo " <td>" . $row['men_destinatario'] . "</td>";
        echo " <td>" . $row['men_asunto'] . "</td>";

        echo " <td> <a href='eliminar_mensaje.php?codigo=" . $row['men_codigo'] . "&usuario=".$usuario ."'>Eliminar</a> </td>";


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
