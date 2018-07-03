<?php
//require("models/connection.php"); // funciones mySQL 
require("models/connection_mysqli.php"); // funciones mySQLi

class AlumnosModel extends Connection
{
	public function listaAlumnos()
	{
		$myQuery = "SELECT 	
						iCodigoAlumno as codigo, 
						vchNombres as nombre, 
						vchApellidos as apellidos, 
						dtFechaNac as fechanac 
					FROM 
						cat_alumno";
						
		return $this->query($myQuery);
	}

	public function listaMateriasInscritos($idalumno)
	{
		$myQuery = "SELECT * 
					FROM 
						cat_rel_alumno_materia ram 
					INNER JOIN 
						cat_materia m ON m.vchCodigoMateria = ram.vchCodigoMateria
					INNER JOIN 
						cat_alumno a ON a.iCodigoAlumno = ram.iCodigoAlumno
					WHERE ram.iCodigoAlumno = $idalumno";
		return $this->query($myQuery);			
	}

	public function materias()
	{
		return $this->query("SELECT* FROM cat_materia");
	}

	public function guardar_relacion($vars)
	{
		return $this->query("INSERT INTO cat_rel_alumno_materia VALUES(".$vars['idalumno'].",'".$vars['idmateria']."',NULL)");
	}
}