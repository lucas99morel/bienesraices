<?php
namespace Model;

class Vendedor extends ActiveRecord{
    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id','nombre','apellido','telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = []){
        $this->id = $args["id"] ?? NULL;
        $this->nombre = $args["nombre"] ?? '';
        $this->apellido = $args["apellido"] ?? '';
        $this->telefono = $args["telefono"] ?? '';
    }

    public function eliminar(){
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id);
        return self::$db->query($query);
    }

    public function validar(){
        self::$errores = [];
        if (!$this->nombre){
            self::$errores[] = "Se debe agregar el nombre";
        }
        if (!$this->apellido){
            self::$errores[] = "Se debe agregar el apellido";
        }
        if (!$this->telefono){
            self::$errores[] = "Se debe agregar un telefono";
        }
        if (!preg_match('/[0-9]{10}/',$this->telefono)){
            self::$errores[] = "Formato del telefono Invalido";
        }
        return self::$errores;
    }
}   
?>