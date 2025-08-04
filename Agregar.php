<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>AGREGAR</title>
	<!-- Bootstrap 5 CDN -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="styles.css">
</head>

<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">

	<?php
	if (isset($_POST['enviar'])) {
		$nombre = $_POST['nombre'];
		$nc_alumno = $_POST['nc_alumno'];

		include("conexion.php");

		$sql = "INSERT INTO alumnos (nombre, nc_alumno) 
				VALUES ('" . $nombre . "', '" . $nc_alumno . "')";

		$resultado = mysqli_query($conexion, $sql);

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
	} else {
	?>

		<div class="form-wrapper">
			<div class="card shadow">
				<div class="card-header bg-black text-white">
					<h4 class="mb-0 text-center">AGREGAR NUEVO ALUMNO</h4>
				</div>
				<div class="card-body">
					<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
						<div class="mb-3">
							<label for="nombre" class="form-label">Nombre:</label>
							<input type="text" name="nombre" id="nombre" class="form-control" required>
						</div>
						<div class="mb-3">
							<label for="nc_alumno" class="form-label">N° de Control:</label>
							<input type="text" name="nc_alumno" id="nc_alumno" class="form-control" required>
						</div>
						<div class="d-flex justify-content-between">
							<input type="submit" name="enviar" value="AGREGAR" class="btn btn-success button3" style="background-color: rgb(40, 167, 69);">
							<a href="index.php" class="btn btn-success button2" style="background-color: rgb(255, 56, 86);">REGRESAR</a>
						</div>
					</form>
				</div>
			</div>
		</div>

	<?php
	}
	?>

	<!-- Bootstrap JS (opcional) -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>