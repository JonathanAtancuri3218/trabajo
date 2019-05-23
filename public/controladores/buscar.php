<?php 
        require_once('../../config/conexionBD.php');		
		function lista_libros($valor)
		{
			$sql="SELECT * FROM mensajes WHERE men_destinatario like '%".$valor."%'";
            $resultados = $conn->query($sql);

			$arreglo = array();
			while ($re=$resultados->fetch_array(MYSQL_NUM)) {
				$arreglo[]=$re;
			}
			return $arreglo;
            $conn->close();

		}
	
	
?>