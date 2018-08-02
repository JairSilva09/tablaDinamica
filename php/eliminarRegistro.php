<?php
require 'Conexion.php';
	$c = $_POST['codigo'];
	
try{
$conx = new Conexion();
	$conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "DELETE FROM productos WHERE codigo='$c'";
	$query = $conx->prepare($sql);
	echo $query->execute();
	
}catch(PDOException $e){

echo $sql . "<br>" . $e->getMessage();
}
$conx = null;	
?>