<?php
/* @author Luciano Bovero */


class database {

    private $gbd;
    private $driver = 'mysql';
    private $base_datos = 'miproyecto';
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';

    function __construct() {
          $conection = $this->driver.":dbname=".$this->base_datos.";host=$this->host";
          $this->gbd = new PDO($conection, $this->user, $this->pass);
          if (!$this->gbd){
              throw new Exception("No se ha podido realizar la conexión");
          }
    }  

    function select($tabla, $filtros = null, $arr_porepare = null, $orden = null, $limit = null){
          $sql = "SELECT * FROM ".$tabla;
          if ($filtros != null){
          $sql .= " WHERE ".$filtros;
      }
      if ($orden != null){
          $sql .= " ORDER BY ".$orden;
      }
      if ($limit != null){
          $sql .= " LIMIT ".$limit;
      }
      $resourse = $this->gbd->prepare($sql);
      $resourse->execute($arr_porepare);
      if ($resourse){
          return $resourse->fetchAll(PDO::FETCH_ASSOC);
      } else {
          throw new Exception ("No se pudo realizar la consulta de selección");
      }
    }

    function delete($tabla, $filtros = null, $arr_prepare = null){
        $result = $this->gbd->prepare("DELETE FROM ".$tabla." WHERE ".$filtros)->execute($arr_prepare);
        if ($result){
            return $result;
        } else {
            throw new Exception ("No se pudo realizar la consulta de eliminación");
        }

    }

    function insert($tabla, $campos, $valores, $arr_prepare = null){
        $result = $this->gbd->prepare("INSERT INTO ".$tabla." (".$campos.") VALUES (".$valores.")")->execute($arr_prepare);
        if ($result){
            return $result;
        } else {
            throw new Exception ("No se pudo realizar la consulta de inserción");
        }
    }

    function update($tabla, $campos, $valores, $filtros, $arr_prepare = null){
        $result = $this->gbd->prepare("UPDATE ".$tabla." SET ".$campos." WHERE ".$filtros)->execute($arr_prepare);
        if ($result){
            return $result;
        } else {
            throw new Exception ("No se pudo realizar la consulta de actualización");
        }
    }

}
?>