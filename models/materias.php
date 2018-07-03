<?php
//require("models/connection.php"); // funciones mySQL 
require("models/connection_mysqli.php"); // funciones mySQLi

class MateriasModel extends Connection
{
	public function listaMaterias()
	{
		$myQuery = "SELECT 	
						vchCodigoMateria as codigo, 
						vchMateria as nombre
					FROM 
						cat_materia";

		return $this->query($myQuery);
	}

	public function listaAlumnosInscritos($idmateria)
	{
		$myQuery = "SELECT * 
					FROM 
						cat_rel_alumno_materia ram 
					INNER JOIN 
						cat_alumno a ON a.iCodigoAlumno = ram.iCodigoAlumno
					WHERE ram.vchCodigoMateria = '$idmateria'";
		return $this->query($myQuery);			
	}

	public function guardarcal($vars)
	{
		return $this->query("UPDATE cat_rel_alumno_materia SET fCalificacion = " . $vars['val'] . "WHERE iCodigoAlumno = ".$vars['idalumno']." AND vchCodigoMateria = '".$vars['idmateria']."'");
	}

	public function eliminar_materia($idmateria)
	{
		$myQuery = "DELETE FROM cat_rel_alumno_materia WHERE vchCodigoMateria = '$idmateria';
					DELETE FROM cat_materia WHERE vchCodigoMateria = '$idmateria'";
		$this->multi_query($myQuery);
		return 1;
	}
}