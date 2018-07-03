<?php
//Carga la funciones comunes top y footer
require('common.php');

class Materias extends Common
{
	
	function main()
	{
		//Metodo que renderiza la vista
		$this->view('materias/main', compact('concepto'));
	}

	function listaMaterias()
	{
		$listado = array();
		$lista = $this->Model->listaMaterias();
		while($l = $lista->fetch_object())
		{
			array_push($listado,array(
									'codigo' 	=> $l->codigo,
									'nombre' 	=> $l->nombre,
									'inscritos' => "<button class='btn btn-primary' data-toggle='modal' data-target='.bs-alumnos-modal-md' onclick=\"verAlumnos('$l->codigo')\"><span class='glyphicon glyphicon-eye-open'></span> Ver Inscritos</button>",
									'borrar' => "<button class='btn btn-danger' onclick=\"eliminar_materia('$l->codigo')\"><span class='glyphicon glyphicon-remove'></span> Eliminar</button>"
									));
		}
		echo json_encode($listado);
	}

	function listaAlumnosInscritos()
	{
		$tabla = '';
		$lista = $this->Model->listaAlumnosInscritos($_POST['idmateria']);
		while($l = $lista->fetch_object())
		{
			$calificacion = $l->fCalificacion;
			if($l->fCalificacion == '' || is_null($l->fCalificacion))
				$calificacion = "<button id='btn-cal' class='btn btn-default btn-sm' onclick=\"calificar('$l->vchCodigoMateria',$l->iCodigoAlumno)\">Calificar</button>";
			$tabla .= "<tr><td>$l->vchCodigoMateria</td><td>$l->iCodigoAlumno</td><td>$l->vchNombres $l->vchApellidos</td><td>$calificacion</td></tr>";
		}
		echo $tabla;
	}

	function guardarcal()
	{
		echo $this->Model->guardarcal($_POST);
	}

	function eliminar_materia()
	{
		echo $this->Model->eliminar_materia($_POST['idmateria']);
	}

}

