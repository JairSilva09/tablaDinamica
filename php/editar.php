<?php
require 'Conexion.php';
	$c = $_POST['codigo'];
	$n = $_POST['nombre'];
	$d = $_POST['departamento'];

try{
$conx = new Conexion();
	$conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "UPDATE productos SET codigo='$c',nombre='$n',departamento='$d' WHERE codigo='$c'";
	$query = $conx->prepare($sql);
	echo $query->execute();
	
}catch(PDOException $e){

echo $sql . "<br>" . $e->getMessage();
}
$conx = null;	
?>