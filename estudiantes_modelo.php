<?php
  require_once "Bd.php";

  class Estudiantes_modelo extends Bd {

    private $bd;
    public $nombre;
    public $apellido;
    public $email;
    private $tabla = 'estudiantes';

    public function insertar($registro)
    {
      $conexion = parent::conectar();
      try {

        $query = "INSERT INTO ". $this->tabla . " SET nombre=:nombre, apellido=:apellido, email=:email";
        $insertar = $conexion->prepare($query)->execute($registro);

        echo " he insertado el registro ";

      } catch (Exception $th) {
        exit("Error: ". $th->getMessage());
      }
    }

    public function consultar()
    {
      $conexion = parent::conectar();
      
      try {

        $query = "SELECT * FROM " . $this->tabla;
        return $conexion->query($query)->fetchAll();

      } catch (Exception $th) {
        exit("Error: ". $th->getMessage());
      }
    }

    public function actualizar($registro)
    {
      $conexion = parent::conectar();
    }

    public function eliminar($accion, $eliminar)
    {
      $conexion = parent::conectar();
    }

  }
  