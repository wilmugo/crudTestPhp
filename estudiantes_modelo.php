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
      try {

        // $query = "UPDATE ". $this->tabla . " SET nombre=:nombre, apellido=:apellido WHERE email=:email";
        $query = "UPDATE {$this->tabla} SET nombre=:nombre, apellido=:apellido WHERE email=:email";
        $conexion->prepare($query)->execute($registro);
        echo "se logro actualizar la base de datos";

      } catch (Exception $th) {
        exit("Error: ". $th->getMessage());
      }
    }

    public function eliminar($accion, $eliminar)
    {
      $conexion = parent::conectar();
      if ($accion == 'todos') {
        
        try {

          $query = "DELETE FROM {$this->tabla}";
          $conexion->prepare($query)->execute();
          echo "se ha eliminado todos los registros ";

        } catch (Exception $th) {
          exit("Error: ". $th->getMessage());
        }

      } else {
        
        try {

          $query = "DELETE FROM {$this->tabla} WHERE email=:email";
          $conexion->prepare($query)->execute($eliminar);
          echo "se ha eliminado el registro {$eliminar['email']}";

        } catch (Exception $th) {
          exit("Error: ". $th->getMessage());
        }

      }
      
    }

  }
  