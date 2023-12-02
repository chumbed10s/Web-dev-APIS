
<?php
    $db = new PDO ('mysql:host=localhost;dbname=miproyecto', 'root', '');
    $datas = $db->query('SELECT productos.icono, productos.nombre_producto, categorias.nombre_categoria, categorias.color, 
        productos.descripcion from `productos` JOIN categorias WHERE productos.categoria_producto = categorias.id_categoria;');
    $products = $datas->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html>
    
    <head>
        <meta charset="UTF-8">
        <title>Inicio</title>
        <link id="stylesheet" type="text/css" rel="stylesheet" href="./assets/css/light/estilos.css">
        <script src="./assets/js/set_theme.js" defer></script>

    </head>
    <body>
        <div class="navbarhome">
            <img class ="logo" src="./assets/img/logo.png" alt="">
            <ul>
                <li><a href="home.php">Inicio</a></li>
                <li><a href="listacategorias.php">Categorías</a></li>
                <li><a href="listaproductos.php">Productos</a></li>
            </ul>
        </div>
        <div class="header">
                <label for="thememode">Tema</label>
                <select name="colormode" title="Tema" id="thememode" class="select">
                    <option value="enabled">🌙 Oscuro</option>
                    <option value="disabled">☀️ Claro</option>
                    <option value="auto" selected>🎨 Auto</option>
                </select>
                <h1>Inicio</h1>
                <p>Listado de productos</p>
            </div>

        <div class="productos">
            <?php
                foreach($products as $product){
                    echo '
                    <div class="card">
                        <div class="card_img">
                            <img src="'.$product['icono'].'" alt="">
                        </div>
                        <div class="card_text">
                        <h3>'.$product['nombre_producto'].'</h3>

                        <div class="category">
                            <div class="point" style="background-color: '.$product['color'].';"></div>
                            <p>'.$product['nombre_categoria'].'</p>
                        </div>
                        
                        <p>'.$product['descripcion'].'</p>
                        </div>
                    </div>';
                }
            ?>
        </div>

        <div class="header">
            <p>Luciano Nicolas Bovero - 46.152.500</p>
        </div>



    </body>
</html>
