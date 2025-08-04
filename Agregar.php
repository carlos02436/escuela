<html>
<head>
		<title>AGREGAR</title>
</head>
<body>
	<?php

	if (isset($_POST['enviar'])) {  // Verificamos si se presionó el botón "enviar" del formulario
		$nombre=$_POST['nombre'];  	// Capturamos los valores enviados desde el formulario
		$nc_alumno=$_POST['nc_alumno'];


		include("conexion.php");

		$sql="insert into alumnos (nombre,nc_alumno) 
		values ('".$nombre."', '".$nc_alumno."')"; 

		$resultado=mysqli_query($conexion, $sql);

		if ($resultado) {
    
    	echo "<script>
            alert('Los datos fueron ingresados correctamente');
            window.location.href = 'index.php';
          </script>";
	
		} else {
    
    	echo "<script>
            alert('Los datos NO fueron ingresados correctamente');
            window.location.href = 'index.php';
          </script>";
		}

		mysqli_close($conexion);

	}else{

		?>

	<h1>Agregar Nuevo Alumno</h1>

<!-- Inicia el formulario -->
<!-- action indica a dónde se enviarán los datos. 
     Aquí usamos PHP: $_SERVER['PHP_SELF'], que significa "enviar a la misma página".
     method="post" indica que los datos se enviarán ocultos (no aparecen en la URL). -->

	<form action="<?=$_SERVER['PHP_SELF']?>" method="post">

		<label>Nombre:</label>
		<input type="text" name="nombre"><br>
		<label>No Control:</label>
		<input type="text" name="nocontrol"><br>
		<input type="submit" name="enviar" value="AGREGAR">
		<a href="index.php">Regresar</a>
	</form>

	<?php

}

	?>
	
	
</body>
</html>