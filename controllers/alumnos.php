<?php
//Carga la funciones comunes top y footer
require('common.php');

class Alumnos extends Common
{
	
	function main()
	{
		//Metodo que renderiza la vista
		$materias = $this->Model->materias();
		$this->view('alumnos/main', compact('materias'));
	}

	function listaAlumnos()
	{
		$listado = array();
		$lista = $this->Model->listaAlumnos();
		while($l = $lista->fetch_object())
		{
			array_push($listado,array(
									'codigo' 	=> $l->codigo,
									'nombre' 	=> utf8_encode($l->nombre),
									'apellidos' => utf8_encode($l->apellidos),
									'fechanac' 	=> $l->fechanac,
									'materias' => "<button class='btn btn-primary' data-toggle='modal' data-target='.bs-materias-modal-md' onclick=\"verMaterias('$l->codigo')\"><span class='glyphicon glyphicon-eye-open'></span> Ver Materias</button>",
									'inscribir' => "<button class='btn btn-default' data-toggle='modal' data-target='.bs-relacionar-modal-sm' onclick=\"relacionar($l->codigo)\">Inscribir</button>"
									));
		}
		echo json_encode($listado);
	}

	function listaMateriasInscritos()
	{
		$tabla = '';
		$lista = $this->Model->listaMateriasInscritos($_POST['idalumno']);
		while($l = $lista->fetch_object())
		{
			$tabla .= "<tr><td>$l->iCodigoAlumno</td><td>$l->vchNombres $l->vchApellidos</td><td>$l->vchCodigoMateria</td><td>$l->vchMateria</td><td>$l->fCalificacion</td></tr>";
		}
		echo $tabla;
	}

	function guardar_relacion()
	{
		echo $this->Model->guardar_relacion($_POST);
	}

}