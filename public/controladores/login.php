<?php
    session_start();
    if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] != "true"){        
        header("Location: iniciarSesion.php");
        echo "<script>alert('No tiene permisos para ingresar');</script>";
    }
    include 'conexionBD.php'; 
?>
<?php
 session_start();
 include '../../config/conexionBD.php';
 $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
 $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
 $sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password =
MD5('$contrasena')";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
 $_SESSION['isLogged'] = TRUE;
 header("Location: ../../admin/vista/usuario/index.php");
 } else {
 header("Location: ../vista/login.html");
 }

 $conn->close();
 ?>