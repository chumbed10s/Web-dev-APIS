
// detectar el envio de un formulario

document.addEventListener('DOMContentLoaded', function() {
    $("#categoryForm").submit(function(event) {
        console.log("Formulario recibido");
        //event.preventDefault(); // Prevent form submission
        // verificar que todos los campos estén completos usando jquery
        var name = $('#name').val();
        var description = $('#description').val();
        var tags = $('#tags').val();
        var color = $('#customColor').val();
        var image = $('#image').val();

        const errors = [];

        console.log("Name: " + name);
        console.log("Description: " + description);
        console.log("Tags: " + tags);
        console.log("Color: " + color);
        console.log("Image: " + image);


        if (!$.trim(name)) errors.push('Nombre'); 
        if (!$.trim(description)) errors.push('Descripción');
        if (!$.trim(tags)) errors.push('Tags');
        if (!$.trim(color)) errors.push('Color');
        if (!$.trim(image)) errors.push('Imagen');

        if (errors.length > 0) {
            event.preventDefault();
            $('#feedback').html(`⚠️ Por favor complete todos los campos: <br>- ${errors.join('<br>- ')}`);
            $('#feedback').css('display', 'flex');
            $('#feedback').css('background', 'rgba(255, 0, 0, 0.3)');

        } else {
            $('#feedback').html(`<p>✅ Se guardo correctamente la categoría <b>${name}</p>`);
            $('#feedback').css('display', 'flex');
            $('#feedback').css('background', 'rgba(0, 255, 0, 0.3)');
        }
    });

    $("#productForm").submit(function(event) {
        // verificar que todos los campos estén completos usando jquery
        //event.preventDefault();

        var name = $('#name').val();
        var description = $('#description').val();
        var categoria = $('#category').val();
        var image = $('#image').val();
        var price = $('#price').val();

        
        const errors = [];

        if (!$.trim(name)) errors.push('Nombre');
        if (!$.trim(description)) errors.push('Descripción');
        if (!$.trim(categoria)) errors.push('Categoría');
        if (!$.trim(image)) errors.push('Imagen');
        if (!$.trim(price)) errors.push('Precio');


        if (errors.length > 0) {
            event.preventDefault();
            $('#feedback').html(`⚠️ Por favor complete todos los campos: <br>- ${errors.join('<br>- ')}`);
            $('#feedback').css('display', 'flex');
            $('#feedback').css('background', 'rgba(255, 0, 0, 0.3)');
        } else {
            $('#feedback').html(`<p>✅ Se guardo correctamente el producto <b>${name}</p>`);
            $('#feedback').css('display', 'flex');
            $('#feedback').css('background', 'rgba(0, 255, 0, 0.3)');
        }
    })



    $("#cancelbutton").click(function() {
        $('#feedback').text('');
        $('#feedback').css('display', 'none');
        $('#previewImage').attr('src', '../../assets/img/galleryadd.svg');
        $('#previewImage').css('height', 'auto');
        $('#previewImage').css('width', '60px');
        $('#previewImage').css('padding', '50px');
        $('#image').val('');
    });

    
    $('#image').change(function() {
        const previewImage = $('#previewImage')[0];
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
            };

            reader.readAsDataURL(file);
            $('#previewImage').css('height', 'auto');
            $('#previewImage').css('width', '400px');
            $('#previewImage').css('padding', '10px');
        } else {
            previewImage.src = '';
            $('#previewImage').attr('src', '../../assets/img/galleryadd.svg');
            $('#previewImage').css('height', 'auto');
            $('#previewImage').css('width', '60px');
            $('#previewImage').css('padding', '50px');
            $('#image').val('');
        }
    });
    
    // if the url ends with ?add=true, show the feedback
    
    if (window.location.href.includes('views/categorias.html')) {
        if (window.location.href.includes('?add=true')) {


            // get the json data
            let datas = window.location.href.split('&');
            let name = datas[1].split('name=')[1];
            let id = datas[2].split('id=')[1];
            

            // parse the json
            $('#feedback').css('display', 'flex');
            $('#feedback').css('background', 'rgba(0, 255, 0, 0.3)');
            $('#feedback').html('<p>✅ Se guardo correctamente la categoría <b>' + name + '</b> con el ID <b>' + id + '</b></p>');
        } else if (window.location.href.includes('?add_error=')) {
            let error = window.location.href.split('?add_error=')[1];
            // remplazamos todos los %20 por espacios
            error = error.replace(/%20/g, ' ');
            $('#feedback').css('display', 'flex');
            $('#feedback').css('background', 'rgba(255, 0, 0, 0.3)');
            $('#feedback').text(`⚠️ Vaya, ocurrio un error: ${error}`);
        } else {
            $('#feedback').css('display', 'none');

        }
    }
    if (window.location.href.includes('views/productos.php')) {
        if (window.location.href.includes('?add=true')) {

            // get the json data
            let datas = window.location.href.split('&');
            let name = datas[1].split('name=')[1];
            let id = datas[2].split('id=')[1];


            // parse the json
            $('#feedback').css('display', 'flex');
            $('#feedback').css('background', 'rgba(0, 255, 0, 0.3)');
            $('#feedback').html('<p>✅ Se guardo correctamente el producto <b>' + name + '</b> con el ID <b>' + id + '</b></p>');
        } else if (window.location.href.includes('?add_error=')) {
            
            let error = window.location.href.split('?add_error=')[1];
            // desencodeamos el error para mostrarlo
            error = decodeURI(error);

            $('#feedback').css('display', 'flex');
            $('#feedback').css('background', 'rgba(255, 0, 0, 0.3)');
            $('#feedback').text(`⚠️ Vaya, ocurrio un error: ${error}`);
        } 
    }
    
});

