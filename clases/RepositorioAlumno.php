<?php
require_once 'dataBase.php';
require_once 'Alumno.php';

class RepositorioAlumno extends dataBase
{

    public function __construct()
    {
        $this->conectar();
    }

    public function getAlumnos($usu_id) 
    {
        $usu_id = (int)$usu_id;
        $resultados = $this->mysqli->query("SELECT * FROM alu_alumnos WHERE usu_id = $usu_id");
        $alumnos = $resultados->fetch_all();
        $suma =0;
        foreach ($alumnos as $a) {
            $suma = $suma + $a[5];
        }
        if (count($alumnos) == 0) {
            $promedio =0;
        } else {
            $promedio = $suma/count($alumnos);
        }
        return [$alumnos, $promedio];   
    }
    
    public function getAlumno($alu_id) 
    {
        $alu_id = (int)$alu_id;
        $resultados = $this->mysqli->query("SELECT * FROM alu_alumnos WHERE alu_id = $alu_id");
        $alumno = $resultados->fetch_assoc();
        return $alumno;
    }

    public function altaAlumno($usu_id, $alu_dni, $alu_nombres, $alu_apellidos, $alu_nota)
    {
        $usu_id = (int)$usu_id;
        $this->mysqli->query("INSERT INTO alu_alumnos (usu_id, alu_dni, alu_nombres, alu_apellidos, alu_nota) VALUES ($usu_id, '$alu_dni', '$alu_nombres', '$alu_apellidos', '$alu_nota')");
        return "Alumno Agregado";
    }

    public function eliminarAlumno($alu_id) 
    {
        $alu_id = (int)$alu_id;
        return $this->mysqli->query("DELETE FROM alu_alumnos WHERE alu_id = $alu_id");
    }

    public function actualizarAlumno($alu_id, $alu_dni, $alu_nombres, $alu_apellidos, $alu_nota)
    {
        $alu_id = (int)$alu_id;
        $this->mysqli->query("UPDATE alu_alumnos SET alu_dni = '$alu_dni', alu_nombres = '$alu_nombres', alu_apellidos = '$alu_apellidos', alu_nota = '$alu_nota' WHERE alu_id = $alu_id");
        return "Alumno Actualizado";
    }
    
}
    
