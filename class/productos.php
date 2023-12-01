<?php
/* @author Luciano Bovero */

 class Producto {

    public $id;
    public $nombre;
    public $descripcion;
    public $icono;
    public $precio;
    public $id_categoria;
    
    public function __construct($nombre = null, $descripcion = null, $icono=null, $precio=null, $id_categoria=null) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->id_categoria = $id_categoria;
        $this->icono = $icono;
    }

    public function insert(){
        $db = new PDO('mysql:host=localhost;dbname=miproyecto', 'root', '');
        $db->prepare('INSERT INTO productos (nombre_producto, descripcion, icono, precio, categoria_producto) VALUES (?, ?, ?, ?, ?)')->execute(
            array($this->nombre, $this->descripcion, $this->icono, $this->precio, $this->id_categoria)
        );
        $product_id = $db->lastInsertId();
        return $product_id;

    }

    public function delete($id){
        $db = new PDO('mysql:host=localhost;dbname=miproyecto', 'root', '');
        $query= $db->prepare('DELETE FROM productos WHERE id_producto = ?');
        $query->execute(array($id));
    }
}

?>
