<?php
/* @author Luciano Bovero */

class AutoLoad {

    static public function load_class($class) {

        $classArray = array();
        $base = __DIR__.DIRECTORY_SEPARATOR;
        $classArray['Database'] = $base.'database.php';
        $classArray['Categoria'] = $base.'categorias.php';
        $classArray['Producto'] = $base.'productos.php';

        if (isset($classArray[$class])) {
            if (file_exists($classArray[$class])) {
                include $classArray[$class];
            } else {
                throw new Exception("El archivo ".$classArray[$class]." no existe");
            }
        }
    }
}

spl_autoload_register('AutoLoad::load_class');

?>