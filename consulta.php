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
     </head>
     <body>
        <table>
          <?php
          
            foreach ($UsuarioObj->consultarUsuario() as $c) {
                ?>
                    
                     <tr>
                      <td class="celda"> <?php echo $c->getId(); ?> </td>
                       <td class="celda"> <?php echo $c->getUsuario(); ?> </td>
					   <td class="celda"> <?php echo $c->getPassword(); ?> </td>
					   
					   <?php
						$usuario_info = $UsuarioObj->consultarUsuarioInfoPorIdUsuario(1);
		
						?>
						
						<td class="celda"> <?php echo $usuario_info->getNombre(); ?> </td>
					   <td class="celda"> <?php echo $usuario_info->getApellidos(); ?> </td>
					   <td class="celda"> <?php echo $usuario_info->getMail(); ?> </td>
					   <td class="celda"> <?php echo $usuario_info->getSexo(); ?> </td>					   
					   <td class="celda"> <?php echo $usuario_info->getFecha_nacimiento(); ?> </td>
					   <td class="celda"> <?php echo $usuario_info->getPais(); ?> </td>
					   
					   <?php
						$discapacidadInfo = $UsuarioObj->consultarDiscapacidadInfoPorId($usuario_info->getTipodiscapacidad());
						?>
					   <td class="celda"> <?php echo $discapacidadInfo->getTipo(); ?> </td>					   
					   
					   <td class="celda"> <?php echo $usuario_info->getPorcentajediscapacidad(); ?> </td>
					   
					   <?php
						$rol = $UsuarioObj->consultarRolePorId($usuario_info->getRole());
						?>
					   <td class="celda"> <?php echo $rol->getNombre(); ?> </td>
					   
                       <td><a class="link" href="editardemo.php?id=<?php echo $c->getId();?>"> Editar</a>  </td>
                       <td><a class="link" href="eliminar.php?id=<?php echo $c->getId();?>"> Eliminar</a>  </td>
                     </tr>
                   <?php
            }
            ?>
          
          <tr>
            <td colspan=4><a href="index.php">Crear Usuario</a></td>
          </tr>
          
</table>
       
</body>


</html>
