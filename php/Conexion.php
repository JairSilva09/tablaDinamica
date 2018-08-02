<?php
/////// CONEXIÓN A LA BASE DE DATOS /////////
class Conexion extends PDO{
	private $host = "localhost";
	private $basededatos = "almacen";
	private $usuario = "root";
	private $contrasena = 12345;

	public function __construct(){
     //Sobreescribo el método constructor de la clase PDO.
      try{
         parent::__construct('mysql:host='.$this->host.';dbname='.$this->basededatos, $this->usuario, $this->contrasena);
      }catch(PDOException $e){
         echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
         exit;
      }

	}
	
}

?>