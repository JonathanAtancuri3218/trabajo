<?php 

session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
 header("Location: /correo/public/vista/login.html");
 }
	require_once("../../../public/controladores/buscar.php");
	$boton= $_POST['boton'];
	if($boton==='buscar')
	{
		$valor=$_POST['valor'];
		$inst = new libros();
		$r=$inst ->lista_libros($valor);
		//print_r($r);
		echo json_encode($r);
	}
	
?>