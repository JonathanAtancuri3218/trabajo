<?php
 session_start();
 include '../../config/conexionBD.php';
$usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
$contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
$sql = "SELECT * FROM usuarios WHERE usu_correo = '$usuario' and usu_password =
MD5('$contrasena')";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
   //printf ("%s (%s) (%s)\n", $row["tipo"], $row["usu_nombres"], $row["usu_co"]);

    $tipo=$row["tipo"];
    if('admin'==$tipo){

        echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
        echo "<script>location.href='../../admin/vista/admin/index.php?usuario=$usuario'</script>";
        $_SESSION['isLogged'] = TRUE;
        
    }
     elseif('user'==$tipo){
         
        echo '<script>alert("BIENVENIDO USUARIO")</script> ';
        echo "<script>location.href='../../admin/vista/usuario/index.php?usuario=$usuario'</script>";
       // echo "<script>location.href='../../admin/vista/usuario/index.php?usu= echo $usuario'</script>";?
       //header("Location: ../vista/login.html");
       $_SESSION['isLogged'] = TRUE;

     } 
} else {
    echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
		
        echo "<script>location.href='../vista/crear_usuario.html'</script>";


}

 $conn->close();
?>
