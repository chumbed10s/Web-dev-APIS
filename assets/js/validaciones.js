
// detectar el envio de un formulario

document.addEventListener('DOMContentLoaded', function() {
    $("#categoryForm").submit(function(event) {
        //event.preventDefault(); // Prevent form submission
        // verificar que todos los campos estén completos usando jquery
        var name = $('#name').val();
        var description = $('#description').val();
        var tags = $('#tags').val();

        const errors = [];

        if (!$.trim(name)) errors.push('Nombre'); 
        if (!$.trim(description)) errors.push('Descripción');
        if (!$.trim(tags)) errors.push('Tags');

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
        
        const errors = [];

        if (!$.trim(name)) errors.push('Nombre');
        if (!$.trim(description)) errors.push('Descripción');
        if (!$.trim(categoria)) errors.push('Categoría');

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
            
});

