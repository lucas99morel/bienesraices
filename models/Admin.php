<?php

namespace Model;

class Admin extends ActiveRecord{
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id','email','passw'];

    public $id;
    public $email;
    public $passw;

    public function __construct($args = []){
        $this->id = $args['id'] ?? NULL;
        $this->email = $args['email'] ?? '';
        $this->passw = $args['passw'] ?? '';
    }

    public function validar(){
        self::$errores = [];
        if (!$this->email){
            $errores[] = 'El email es obligatorio';
        }
        if (!$this->passw){
            $errores[] = 'La contraseña es obligatoria';
        }
        return self::$errores;
    }

    public function existeUsuario(){
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "'";
        $resultado = self::$db->query($query);

        if (!$resultado->num_rows){
            self::$errores[] = 'Usuario no encontrado';
            return;
        }
        return $resultado;
    }

    public function comprobarPassw($resultado){
        $usuario = $resultado->fetch_object();
        $autenticado = password_verify($this->passw ,$usuario->passw);
        if (!$autenticado){
            self::$errores[] = 'Contraseña incorrecta';
        }

        return $autenticado;
    }

    public function autenticar(){
        session_start();
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        header("Location: /admin");
    }
}

?>