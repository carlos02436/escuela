<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Alumnos</title>
    <link href="styles.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <h1 class="text-center my-5 text-white">LISTADO DE ALUMNOS 2025</h1>

        <!-- From Uiverse.io by Arikai96 -->
        <a class="button text-end text-center" style="width: 12rem;" href='Agregar.php'>AGREGAR ALUMNO</a>

        <?php
        include("conexion.php");
        $sql = "SELECT * FROM alumnos";
        $resultado = mysqli_query($conexion, $sql);
        ?>

        <!-- Contenedor con borde redondeado -->
        <div class=" bg-white p-3 rounded shadow-sm">
            <table class="table table-hover table-striped mb-0 text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID ALUMNO</th>
                        <th>NOMBRE Y APELLIDOS</th>
                        <th>N° DE CONTROL</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($filas = mysqli_fetch_assoc($resultado)) { ?>
                        <tr>
                            <td><?php echo $filas['id_alumno']; ?></td>
                            <td><?php echo $filas['nombre']; ?></td>
                            <td><?php echo $filas['nc_alumno']; ?></td>
                            <td>
                                <a href='editar.php?id_alumno=<?php echo $filas["id_alumno"]; ?>' class="button1 text-end">Editar</a>
                                <a href='eliminar.php?id_alumno=<?php echo $filas["id_alumno"]; ?>' class="button2 text-end" onclick="return confirmar()">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
    </div>

    <?php mysqli_close($conexion); ?>

    </div>

    <!-- Confirmación para eliminar -->
    <script>
        function confirmar() {
            return confirm('¿Estás seguro? Se eliminarán los datos.');
        }
    </script>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>