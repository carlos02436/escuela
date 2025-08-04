<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Alumno</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body class="bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <?php
                if (isset($_POST['enviar'])) {

                    $id_alumno = $_POST['id_alumno'];
                    $nombre = $_POST['nombre'];
                    $nc_alumno = $_POST['nc_alumno'];

                    $sql = "UPDATE alumnos SET nombre='$nombre', nc_alumno='$nc_alumno' WHERE id_alumno='$id_alumno'";
                    $resultado = mysqli_query($conexion, $sql);

                    if ($resultado) {
                        echo "<script>
                            alert('Los datos fueron modificados correctamente');
                            window.location.href = 'index.php';
                          </script>";
                    } else {
                        echo "<script>
                            alert('Los datos NO fueron modificados correctamente. Verifique la base de datos.');
                            window.location.href = 'index.php';
                          </script>";
                    }

                    mysqli_close($conexion);
                } else {
                    $id_alumno = $_GET['id_alumno'];
                    $sql = "SELECT * FROM alumnos WHERE id_alumno='$id_alumno'";
                    $resultado = mysqli_query($conexion, $sql);
                    $fila = mysqli_fetch_assoc($resultado);

                    $nombre = $fila["nombre"];
                    $nc_alumno = $fila["nc_alumno"];

                    mysqli_close($conexion);
                ?>

                    <div class="card shadow">
                        <div class="card-header bg-black text-white">
                            <h4 class="mb-0 text-center">EDITAR ALUMNO</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

                                <div class="mb-3">
                                    <label class="form-label">Nombre:</label>
                                    <input type="text" name="nombre" class="form-control" value="<?= $nombre ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">N° Control:</label>
                                    <input type="text" name="nc_alumno" class="form-control" value="<?= $nc_alumno ?>" required>
                                </div>

                                <input type="hidden" name="id_alumno" value="<?= $id_alumno ?>">

                                <div class="d-flex justify-content-between">
                                    <button type="submit" name="enviar" class="btn btn-success button3" style="background-color: rgb(40, 167, 69);">Actualizar</button>
                                    <a href="index.php" class="btn btn-secondary button2" style="background-color: rgb(255, 56, 86);">Regresar</a>
                                </div>

                            </form>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>