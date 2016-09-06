<?php
ini_set('display_errors', 1);

	include_once("usuarioColector.php");
	$UsuarioObj = new usuarioColector();
	$usuario = new usuario();
	$usuario_info = new usuario_info();

?>
<!Doctype html>
 <html>
     <head>
	  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" href="css/tema.min.css">
 <link rel="stylesheet" href="css/login.css">
     </head>
     <body>
	 <body class="fondo" id="page-top">
	 <a href="login.html">+ACCESO</a>     
	 <div class="container">
        <table>
          <?php
          
            foreach ($UsuarioObj->consultarUsuario() as $c) {
                ?>
                    
                     <tr>
                      <td> <?php echo $c->getId(); ?> </td>
                       <td> <?php echo $c->getUsuario(); ?> </td>
					   <td> <?php echo $c->getPassword(); ?> </td>
					   
					   <?php
						$usuario_info = $UsuarioObj->consultarUsuarioInfoPorIdUsuario($c->getId());
		
						?>
						
						<td> <?php echo $usuario_info->getNombre(); ?> </td>
					   <td> <?php echo $usuario_info->getApellidos(); ?> </td>
					   <td> <?php echo $usuario_info->getMail(); ?> </td>
					   <td> <?php echo $usuario_info->getSexo(); ?> </td>					   
					   <td> <?php echo $usuario_info->getFecha_nacimiento(); ?> </td>
					   <td> <?php echo $usuario_info->getPais(); ?> </td>
					   
					   <?php
						$discapacidadInfo = $UsuarioObj->consultarDiscapacidadInfoPorId($usuario_info->getTipodiscapacidad());
						?>
					   <td> <?php echo $discapacidadInfo->getTipo(); ?> </td>					   
					   
					   <td> <?php echo $usuario_info->getPorcentajediscapacidad(); ?> </td>
					   
					   <?php
						$rol = $UsuarioObj->consultarRolePorId($usuario_info->getRole());
						?>
					   <td> <?php echo $rol->getNombre(); ?> </td>
					   
                       <td><a href="editarUsuario.php?id=<?php echo $c->getId();?>"> Editar</a>  </td>
                       <td><a href="eliminar.php?id=<?php echo $c->getId();?>"> Eliminar</a>  </td>
                     </tr>
                   <?php
            }
            ?>
          
          <tr>
            <td colspan=4><a href="index.php">Crear Usuario</a></td>
          </tr>
          
</table>
</div>
       
</body>


</html>
