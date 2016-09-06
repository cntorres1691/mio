<?php
	ini_set('display_errors', 1);
	
	include_once("usuarioColector.php");
	$UsuarioObj = new usuarioColector();
	
	//echo "id eliminar. ".$_GET["id"];
	
	if(isset($_GET["id"]))
	{    
		$obj = $UsuarioObj->delete($_GET["id"]);
		echo "Se elimino registro.";
	}
	else
	{
		echo "Valor no encontrado.";
	}
?>