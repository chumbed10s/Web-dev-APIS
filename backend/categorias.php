<?php
/* @author Luciano Bovero */

include "../class/autoload.php";

// En caso llegue un post de un formulario de categorias
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    // Si es el post de un formulario

    if (isset($_POST["save"])) {

        var_dump($_POST);
        $name = $_POST["name"];
        $description = $_POST["description"];
        $tags = $_POST["tags"];
        $color = $_POST["color"];
        $icon = null;

        echo "Nombre: $name <br> Descripción: $description <br> Tags: $tags <br> Color: $color <br> Icono: $icon";

        // Guardamos el archivo del icon en el directorio
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
            $icon = "../assets/img/categories/" . $_FILES["image"]["name"];
            move_uploaded_file($_FILES["image"]["tmp_name"], $icon);
            $icon = str_replace("../", "", $icon);
        }

        $category = new Categoria($name, $description, $tags, $color, $icon);
        try {
            $id_categoria = $category->insert();
        }
        catch (Exception $e) {
            $error = $e->getTraceAsString();
            $id_categoria = null;
        }

        if ($id_categoria != null) {
            // Si se inserto correctamente recargamos la pagina de categorias con el banner de exito junto pasamos los datos de la categoria insertada en json

            header("Location: ./views/categorias.html?add=true&name=$name&id=$id_categoria");
            die();
        } else {
            header("Location: ./views/categorias.html?add_error=$error");
            die();
        }

        
    }
}

    

if (isset($_GET["add"])) {
    include "./views/categorias.html";
    die();
}

?>