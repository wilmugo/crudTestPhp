<?php

  require_once "estudiantes_modelo.php";
  $estudiante = new Estudiantes_modelo();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Estudiantes en al base de datos </title>
</head>
<body>

  <h1>C: insertar</h1>
  <?php 
    // $alumno = [
    //   'nombre' => 'Maria',
    //   'apellido' => 'Gomez',
    //   'email' => 'mariagomez@gmail.com'
    // ];
    // $estudiante->insertar($alumno);
  ?>
  <h1>R: consultar</h1>
  <?php
    $consulta = $estudiante->consultar();
    foreach ($consulta as $est) {
      echo $est['nombre'] . " " . $est['apellido'] . ' ' . $est['id'] . '<br>';
    }
  ?>
  <h1>U: actualizar</h1>
  <?php
  ?>
  <h1>D: eliminar</h1>
  <?php
  ?>
</body>
</html>