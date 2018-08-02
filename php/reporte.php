<?php
	require 'Conexion.php';


		$filename = 'reporteDatos.xls';
		$conx = new Conexion();
		$conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
		$sql = "SELECT * FROM productos";
		$query = $conx->query($sql);
		$query->execute();
		$outpout = '<table><tr><th>Codigo</th><th>Nombre</th><th>Departamaneto</th></tr>';

		while ($row=$query->fetch(PDO::FETCH_ASSOC)) {						
				$outpout .= '
					<tr>
						<td>'.utf8_decode($row['codigo']).'</td>
						<td>'.utf8_decode($row['nombre']).'</td>
						<td>'.utf8_decode($row['departamento']).'</td>
					</tr>';					
				}
		$outpout .= '</table>';			
		//creamos las cabeceras con nombre del archivo y charset
		header('Content-type:application/xls');
		header("Content-Disposition:attachment; filename='reporte.xls'");
		echo $outpout;	
		
		$conx=null;		
	
	
?>