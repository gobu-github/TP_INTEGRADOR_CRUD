<?php
require_once 'Usuario.php';
require_once 'RepositorioUsuario.php';
require_once 'RepositorioAlumno.php';

class ControladorSesion
{
    protected $usuario = null;

    public function login($nombre_usuario, $clave)
    {
        $repo = new RepositorioUsuario();
        $usuario = $repo->login($nombre_usuario, $clave);
        //Si falló el login:
        if ($usuario === false) {
            return [false, "Error de credenciales"];
        } else {
            session_start();
            $_SESSION['usu_usuario'] = serialize($usuario);
            return [true, "Usuario autenticado correctamente"];
        }
    }

    public function create($nombre_usuario, $nombre, $apellido, $clave)
    {
        $repo = new RepositorioUsuario();
        $usuario = new Usuario($nombre_usuario, $nombre, $apellido);
        $id = $repo->save($usuario, $clave);
        if ($id === false) {
            return [ false, "Error al crear el usuario"];
        }
        else {
            $usuario->setId($id);
            session_start();
            $_SESSION['usu_usuario'] = serialize($usuario);
            return [ true, "Usuario creado correctamente" ];
        }
    }

    public function createAlumno($dni, $nombres, $apellidos, $nota)
    {
        $repoa = new RepositorioAlumno();
        $alumno = new Alumno($dni, $nombres, $apellidos, $nota);
        $id = $repoa->altaAlumno($alumno);
        if ($id === false) {
            return [ false, "Error al crear el alumno"];
        }
        else {
            return [ true, "Alumno creado correctamente" ];
        }
    }
}
