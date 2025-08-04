<?php 

$id_alumno=$_GET['id_alumno'];
include ("conexion.php");

// delete

$sql="delete from alumnos where id_alumno='".$id_alumno."'";
$resultado=mysqli_query($conexion,$sql);


if ($resultado) {
    
    	echo "<script>
            alert('Los datos fueron eliminados correctamente');
            window.location.href = 'index.php';
          </script>";
	
		} else {
    
    	echo "<script>
            alert('Los datos NO fueron eliminados, verifique la BD');
            window.location.href = 'index.php';
          </script>";
		}

		

 ?>