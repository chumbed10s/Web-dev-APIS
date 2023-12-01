<?php
/* @author Luciano Bovero */

include '../class/autoload.php';

if (isset($_POST["savebutton"])) {

    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $category = $_POST["category"];
    $color = $_POST["color"];

    // Guardamos el archivo del icon en el directorio
    if (isset($_FILES["customIcon"]) && $_FILES["customIcon"]["error"] == 0){
        $icon = "../assets/img/products/" . $_FILES["customIcon"]["name"];
        move_uploaded_file($_FILES["customIcon"]["tmp_name"], $icon);
        $icon = str_replace("../", "", $icon);
    }

    $product = new producto($name, $description, $icon, $price, $category, $color);
    $id_product = $product->insert();
    if ($id_product != null) {
        header("Location: productos.php");

    }
    echo "<div class='header'>Se guardo correctamente el producto <b>$name</b> con el ID <b>$id_product</b></div>";
}

if (isset($_GET["add"])) {
    include './views/productos.html';
    die();
}
?>

