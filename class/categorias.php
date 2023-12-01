<?php
/* @author Luciano Bovero */

class Categoria {
    
    public $id;
    public $nombre;
    public $descripcion;
    public $tags;
    public $color; // Hex
    public $icono; // Path al icono
    
    public function __construct($nombre=null, $description=null, $tags=null, $color=null, $icono=null) {
        $this->nombre = $nombre;
        $this->descripcion = $description;
        $this->tags = $tags;
        $this->color = $color;
        $this->icono = $icono;
    }

    public function insert(){
        $db = new PDO('mysql:host=localhost;dbname=miproyecto', 'root', '');
        $query = $db->prepare('INSERT INTO categorias (nombre_categoria, descripcion, tags, color, icono) VALUES (?,?, ?, ?, ?)');
        $result = $query->execute(array($this->nombre, $this->descripcion, $this->tags, $this->color, $this->icono));
        if ($result) {
            return $db->lastInsertId();
        } else {
            throw new Exception ("No se pudo realizar la consulta de inserción");
        }
    }

    public function delete($id){
        $db = new PDO('mysql:host=localhost;dbname=miproyecto', 'root', '');
        $query= $db->prepare('DELETE FROM categorias WHERE id_categoria = ?');
        $query->execute(array($id));
    }
}

?>