<?php
/* @author Luciano Bovero */

class categoria {
    
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
        $db->prepare('INSERT INTO categorias (nombre_categoria, descripcion, tags, color, icono) VALUES (?,?, ?, ?, ?)')->execute(
            array($this->nombre, $this->descripcion, $this->tags, $this->color, $this->icono)
        );
        return $db->lastInsertId();
    }

    public function delete($id){
        $db = new PDO('mysql:host=localhost;dbname=miproyecto', 'root', '');
        $query= $db->prepare('DELETE FROM categorias WHERE id_categoria = ?');
        $query->execute(array($id));
    }
}

?>