<?php

	class Paginador{

		private $numPaginas;	
		private $numR;
		private $limite;
		private $consulta;

		public function __construct($totalR,$limite){
			$this->numR = $totalR;			
			$this->limite = $limite;
		}

		public function setPaginas(){
			return $this->numPaginas = ceil($this->numR/$this->limite);
		}

		public function setConsulta($sql,$offset){
			return $this->consulta = $sql."LIMIT $offset,$this->limite";
		}
	}
