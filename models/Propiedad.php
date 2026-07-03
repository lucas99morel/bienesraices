<?php
namespace Model;

class Propiedad extends ActiveRecord{
    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id','titulo','precio','imagen','descripcion',
    'habitaciones','wc','estacionamiento','creado','vendedores_id'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;

    public function __construct($args = []){
        $this->id = $args["id"] ?? NULL;
        $this->titulo = $args["titulo"] ?? '';
        $this->precio = $args["precio"] ?? '';
        $this->imagen = $args["imagen"] ?? '';
        $this->descripcion = $args["descripcion"] ?? '';
        $this->habitaciones = $args["habitaciones"] ?? '';
        $this->wc = $args["wc"] ?? '';
        $this->estacionamiento = $args["estacionamiento"] ?? '';
        $this->creado = date("Y/m/d");
        $this->vendedores_id = $args["vendedores_id"] ?? '';
    }

    public function setImagen($imagen){
        if (!is_null($this->id)){
            $this->borrarImagen();
        }
        if ($imagen){
            $this->imagen = $imagen;
        }
    }

    public function borrarImagen(){
        if (file_exists(CARPETA_IMAGENES . $this->imagen )){
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }
    
    public function eliminar(){
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id);
        $this->borrarImagen();
        return self::$db->query($query);
    }

    public function validar(){
        self::$errores = [];
        if (!$this->titulo){
            self::$errores[] = "Se debe agregar un titulo";
        }
        if (!$this->precio){
            self::$errores[] = "Se debe agregar el precio";
        }
        if (!$this->descripcion){
            self::$errores[] = "Se debe agregar una descripcion";
        }
        if (!$this->habitaciones){
            self::$errores[] = "Se debe agregar la cantidad de habitaciones";
        }
        if (!$this->wc){
            self::$errores[] = "Se debe agregar la cantidad de baños";
        }
        if (!$this->estacionamiento){
            self::$errores[] = "Se debe agregar el numero de estacionamientos";
        }
        if (!$this->vendedores_id){
            self::$errores[] = "Se debe elegir el vendedor";
        }
        if(!$this->imagen){
            self::$errores[] = "Se debe agregar una imagen";
        }
        return self::$errores;
    }
}
?>