<?php
/* @author Luciano Bovero */

include "../class/autoload.php";

// En caso llegue un post de un formulario de categorias
if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    // Si es el post de un formulario

    if (isset($_POST["savebutton"])) {

        var_dump($_POST);
        $name = $_POST["name"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $category = $_POST["category"];
        $icon = null;


        // Guardamos el archivo del icon en el directorio
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
            $icon = "../assets/img/products/" . $_FILES["image"]["name"];
            move_uploaded_file($_FILES["image"]["tmp_name"], $icon);
            $icon = str_replace("../", "", $icon);
        }

        $product = new Producto($name, $description, $icon, $price, $category);
        try {
            $id_product = $product->insert();
        }
        catch (Exception $e) {
            $error = $e->getTraceAsString();
            $id_product = null;
        }

        if ($id_product != null) {
            // Si se inserto correctamente recargamos la pagina de categorias con el banner de exito junto pasamos los datos de la categoria insertada en json

            header("Location: ./views/productos.php?add=true&name=$name&id=$id_product");
            die();
        } else {
            // Formateamos el error para ser apto en una url
            $error = urlencode($error);
            header("Location: ./views/productos.php?add_error=$error");
            die();
        }

        
    }
}

    

if (isset($_GET["add"])) {
    include "./views/productos.php";
    die();
}

?>