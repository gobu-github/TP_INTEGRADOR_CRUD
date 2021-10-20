<?php
class Alumno
{
    private $alu_dni;
    private $alu_nombres;
    private $alu_apellidos;
    private $alu_nota;

    public function __construct($alu_dni, $alu_nombres, $alu_apellidos, $alu_nota)
    {
        $this->dni = $alu_dni;
        $this->nombres = $alu_nombres;
        $this->apellidos = $alu_apellidos;
        $this->nota = $alu_nota;
    }

    public function getDni() {return $this->alu_dni;}
    public function setDni($alu_dni) {$this->dni = $alu_dni;}
    public function getNombres() {return $this->alu_nombres;}
    public function getApellidos() {return $this->alu_apellidos;}
    public function getNota() {return $this->alu_nota;}
    public function getNombreApellido() {return "$this->alu_nombres $this->alu_apellidos";}
}