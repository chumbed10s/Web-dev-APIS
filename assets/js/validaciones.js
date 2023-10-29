
// detectar el envio de un formulario

document.addEventListener('DOMContentLoaded', function() {
    $("#categoryForm").submit(function(event) {
        event.preventDefault(); // Prevent form submission
        // verificar que todos los campos estén completos usando jquery
        var name = $('#name').val();
        var description = $('#description').val();
        var tags = $('#tags').val();

        const errors = [];

        if (!$.trim(name)) errors.push('Nombre'); 
        if (!$.trim(description)) errors.push('Descripción');
        if (!$.trim(tags)) errors.push('Tags');

        if (errors.length > 0) {
            $('#feedback').html(`⚠️ Por favor complete todos los campos: <br>- ${errors.join('<br>- ')}`);
            $('#feedback').css('display', 'flex');
            $('#feedback').css('background', 'rgba(255, 0, 0, 0.3)');

        } else {
            $('#feedback').html(`<p>✅ Se guardo correctamente la categoría <b>${name}</p>`);
            $('#feedback').css('display', 'flex');
            $('#feedback').css('background', 'rgba(0, 255, 0, 0.3)');
            this.reset();
        }
    });

    $("#productForm").submit(function(event) {
        // verificar que todos los campos estén completos usando jquery
        event.preventDefault();

        var name = $('#name').val();
        var description = $('#description').val();
        var categoria = $('#category').val();
        
        const errors = [];

        if (!$.trim(name)) errors.push('Nombre');
        if (!$.trim(description)) errors.push('Descripción');
        if (!$.trim(categoria)) errors.push('Categoría');

        if (errors.length > 0) {
            
            $('#feedback').html(`⚠️ Por favor complete todos los campos: <br>- ${errors.join('<br>- ')}`);
            $('#feedback').css('display', 'flex');
            $('#feedback').css('background', 'rgba(255, 0, 0, 0.3)');
        } else {
            $('#feedback').html(`<p>✅ Se guardo correctamente el producto <b>${name}</p>`);
            $('#feedback').css('display', 'flex');
            $('#feedback').css('background', 'rgba(0, 255, 0, 0.3)');
            this.reset();
        }
    })



    $("#cancelbutton").click(function() {
        $('#feedback').text('');
        $('#feedback').css('display', 'none');
    });
});

