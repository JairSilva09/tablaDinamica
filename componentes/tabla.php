<?php 	
	require '../php/Conexion.php';
	require '../php/Paginador.php'; 
		
		$limite = 5;
		if (isset($_POST['pagina'])) {
			$paginaAct = $_POST['pagina'];
			
		}else{
			$paginaAct = 0;
		}
		
		$offset = $paginaAct*$limite;
		$link="";	
		if (isset($_POST['producto'])) {
			$q = $_POST['producto'];
			$sql1 = "SELECT * FROM productos WHERE  
			codigo LIKE '".$q."%'
			or nombre like '".$q."%'
			or departamento like '".$q."%'";	
			}else{
				$sql1 = "SELECT * FROM productos ";
			}	
		
		?>
<table class="table table-hover table-condensed table-bordered">	
	<tr>
		<th>Código</th>
		<th>Nombre</th>
		<th>Departamento</th>
		<th>Editar</th>
		<th>Eliminar</th>
	</tr>
	<?php 
	
	try{
	$conx = new Conexion();
		$conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
		$query = $conx->query($sql1);
		$query->execute();
		$numRegistros= $query->rowCount();		
		if ($numRegistros > 0) {
			if ($numRegistros > $limite) {
				$pag = new Paginador($numRegistros,$limite);
				$sql2 = $pag->setConsulta($sql1,$offset);			
				$query = $conx->query($sql2);
				$query->execute();						
			}
			while ($row=$query->fetch(PDO::FETCH_ASSOC)) {
				$datos= $row['codigo']."||".$row['nombre']."||".$row['departamento'];			
				echo "<tr>
					<td>".$row['codigo']."</td>
					<td>".$row['nombre']."</td>
					<td>".$row['departamento']."</td>
					<td>
						<button type='button' class='btn btn-warning btn-sm btn-block'  data-toggle='modal' data-target='#modalEditar' onclick=\"buscar_datos('".$datos."')\"><span class='oi oi-pencil'></span></button>
					</td>
					<td>
						<button class='btn btn-danger btn-sm btn-block' data-toggle='modal' data-target='#modalEliminar' onclick=\"eliminarR('".$row['nombre']."','".$row['codigo']."')\"><span class='oi oi-x'></span></button>
					</td>";		
		 		} 		 

		}else{
			echo '<tr><td colspan="5">No hay registros que coincidan con su busqueda</td></tr>';
		}		
		echo '</table>';
		if ($numRegistros > $limite) {
			$paginas = $pag->setPaginas();		
			for($i=0; $i < $paginas; $i++){	
							
				$pag = $i + 1;
				if ($i == $paginaAct) {
					$link=$link."<li class='page-item active'><a class='paginate page-link' href=\"#\" onclick=\"cambiarPag('".$i."')\">$pag</a></li>";
				}else{
					$link=$link."<li class='page-item'><a class='paginate page-link' href=\"#\" onclick=\"cambiarPag('".$i."')\">$pag</a></li>";
				}
				
			}			
			echo '<div id="paginador">
		       <nav aria-label="...">
		          <ul class="pagination pagination-sm">'
		           .$link.'
		          </ul>
		       </nav>
		    </div>';				
		}

		$conx = null;
	}catch(PDOException $e){
		echo $e->getMessage();
	}
	
