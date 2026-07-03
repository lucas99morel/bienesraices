<?php
//declare(strict_types=1);
namespace Model;

abstract class ActiveRecord{
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';

    public static $errores = [];
    public $id = NULL;

    public static function getErrores(){
        return static::$errores;
    }

    public static function setDB($database){
        self::$db = $database;
    }


    public function guardar(){
        $atributos = $this->sanitizarAtributos();

        $query = " INSERT INTO " . static::$tabla . "( " . join(", ",array_keys($atributos)) . " )";
        $query .= " VALUES ( '" . join("', '",array_values($atributos)) . "') ";

        return self::$db->query($query);
    }

    public function actualizar(){
        $atributos = $this->sanitizarAtributos();
        $array = [];
        foreach ($atributos as $clave => $valor){
            $array[] = "$clave = '$valor'";
        }

        $query = " UPDATE " . static::$tabla . " SET ";
        $query .= join(", ",$array);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' LIMIT 1";

        return self::$db->query($query);
    }

    public function atributos(){
        $atributos = [];
        foreach(static::$columnasDB as $columna){
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos(){
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $clave => $valor){
            $sanitizado[$clave] = self::$db->escape_string($valor);
        }
        return $sanitizado;
    }

    public static function getAll(){
        $query = "SELECT * FROM " . static::$tabla;
        return static::consultaSQL($query);
    }

    public static function getById($id){
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = $id";
        $resultado = static::consultaSQL($query);
        if ( empty( $resultado ) ){
            return null;   
        }
        return $resultado[0];
    }

    public static function get($cantidad){
        $query = "SELECT * FROM " . static::$tabla . " LIMIT $cantidad";
        return static::consultaSQL($query);
    }

    public static function consultaSQL($query){
        $array = [];

        //Consultar la base de datos
        $consulta = self::$db->query($query);

        //iterar los resultados
        if ($consulta->num_rows){
            while($registro = $consulta->fetch_assoc()){ 
                $array[] = new static($registro);
            }
        }

        //liberar la memoria
        $consulta->free();

        return $array ;
    }

    public function sincronizar($args = []){
        foreach ($args as $clave => $valor){
            if (property_exists($this,$clave) && !is_null($valor)){
                $this->$clave = $valor;
            }
        }
    }
}   

?>