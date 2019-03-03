<?php
  const DB = 'mysql';
  const DB_SERVIDOR = 'localhost';
  const DB_CHARSET = 'utf8';

  abstract class Bd
  {
    private static $db_usuario = 'root';
    private static $db_pass = 'petra329';
    private static $db_servidor = DB_SERVIDOR;
    private static $db_nombre = 'prueba';
    private static $db_charset = DB_CHARSET;
    private $conexion; 


    public function conectar()
    {
      try {

        $dsn = "mysql:host=".self::$db_servidor.";dbname=".self::$db_nombre;
        $pdo = new PDO($dsn, self::$db_usuario, self::$db_pass);
        $pdo->exec("SET CHATACTER SET ". self::$db_charset);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        return $pdo;

      } catch (PDOExcerption $th) {
        exit("Error: ". $th->getMessage());
      }
    }

    private function desconectar()
    {
      $this->conexion = null;
    }

    #crud
    abstract protected function insertar($registro);
    abstract protected function consultar();
    abstract protected function actualizar($registro);
    abstract protected function eliminar($accion, $elmininar);


  }