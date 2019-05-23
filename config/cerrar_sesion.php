<?php
 session_start();
 $_SESSION['isLogged'] = FALSE;
 session_destroy();
 header("Location: /correo/public/vista/login.html");
?>