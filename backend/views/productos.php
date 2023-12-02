<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Alta de Producto</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="stylesheet" type="text/css" rel="stylesheet" href="../../assets/css/light/estilos.css">
    <script src="../../assets/js/set_theme.js" defer></script>
    <script type="module" src="../../assets/js/validaciones.js"></script>

    <!-- incluir jquery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="header">
            <label for="colormode">Tema</label>
            <select name="colormode" title="Tema" id="thememode" class="select">
                <option value="enabled">🌙 Oscuro</option>
                <option value="disabled">☀️ Claro</option>
                <option value="auto" selected>🎨 Auto</option>
            </select>
            <h1>Alta Productos</h1>
            <p>Da de alta un nuevo producto</p>
        </div>

        
        <div class="form_main">
            <div id="feedback">
            </div>
            <form action="../../backend/productos.php" method="POST", id="productForm" enctype="multipart/form-data">
                <fieldset class="fieldsetform">
                    <legend>Datos del Producto</legend>
                    <input class="form_input" type="text" name="name" placeholder="Nombre" id="name">
                    <input class="form_input" type="text" name="description" placeholder="Descripción" id="description">
                    <input class="form_input" type="text" name="price" placeholder="Precio", id="price">
                    <select title="Categoria" name="category" id="category" class="select">
                        <option value="0" disabled selected>Selecciona una categoria</option>
                        <?php
                            $db = new PDO ('mysql:host=localhost;dbname=miproyecto', 'root', '');
                            $db->prepare('SELECT * FROM categorias');
                            $query = $db->query('SELECT * FROM categorias');
                            foreach ($query as $row) {
                                echo '<option value="' . $row['id_categoria'] . '">' . $row['nombre_categoria'] . '</option>';
                            }
                        ?>
                    </select>
                    
                </fieldset>
                <fieldset class="fieldsetform" id="personalization">
                    <legend>Personalización</legend>
                    <!-- Dropzone -->
                    
                    
                    <input name= "image" type="file" placeholder="Subir imagen" id="image" class="dropper" accept="image/png, image/jpeg">
                    <label for="image" class="dropper_tag">
                        <img id="previewImage" alt="Vista previa de la imagen" src="../../assets/img/galleryadd.svg">
                    </label>
                    
                </fieldset>

                <div class="buttons">
                    <button type="reset" class="cancelbutton" id="cancelbutton">Cancelar</button>
                    <button type="submit" class="savebutton" name= "savebutton" id="savebutton">Guardar</button>
                </div>

        </div>
        <div class="header">
            <p>Luciano Nicolas Bovero - 46.152.500</p>
        </div>
    </div>
</body>
</html>
