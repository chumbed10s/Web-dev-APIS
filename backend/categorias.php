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

        $category = new categoria($name, $description, $tags, $color, $icon);
        $id_categoria = $category->insert();
        try {
            $id_categoria = $category->insert();
        }
        catch (Exception $e) {
            echo $e;
            $id_categoria = null;
        }

        //if ($id_categoria != null) {
        //    header("Location: categorias.php");
        //}
        echo "<div class='header'>Se guardo correctamente la categoria <b>$name</b> con el ID <b>$id_categoria</b></div>";
        
    }
}

    

if (isset($_GET["add"])) {
    include "./views/categorias.html";
    die();
}

?>