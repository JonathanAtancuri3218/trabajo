
<?php
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
				<h2 style="text-align:center">Usuarios</h2>
    </div>
            
    

 <table style="width:100%">
 <tr>

 <th>Codigo</th>
 <th>Nombres</th>
 <th>Apellidos</th>
 <th>Correo</th>
 <th>Tipo</th>
 <th>Eliminar</th>
 <th>Modificar</th>
 <th>Cambiar contraseña</th>

 </tr>
 <?php
 include '../../../config/conexionBD.php';
$sql = "SELECT * FROM usuarios ";
$result = $conn->query($sql);

 if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        //echo " <td>" . $row['usu_img'] . "</td>";
        echo " <td>" . $row['usu_codigo'] ."</td>";
        echo " <td>" . $row['usu_nombres'] ."</td>";
        echo " <td>" . $row['usu_apellidos'] . "</td>";
        echo " <td>" . $row['usu_correo'] . "</td>";
        echo " <td>" . $row['tipo'] . "</td>";

        echo " <td> <a href='eliminar.php?codigo=" . $row['usu_codigo'] . "&usuario=".$usuario ."'>Eliminar</a> </td>";
        echo " <td> <a href='modificar.php?codigo=" . $row['usu_codigo'] ."&usuario=".$usuario ."'>Modificar</a> </td>";
        echo " <td> <a href='cambiar_contrasena.php?codigo=" . $row['usu_codigo'] . "&usuario=".$usuario ."'>Cambiar    
       contraseña</a> </td>";



      
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
