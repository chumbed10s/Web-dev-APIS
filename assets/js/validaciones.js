
// detectar el envio de un formulario

document.addEventListener('DOMContentLoaded', function() {
    $("#categoryForm").submit(function(event) {
        event.preventDefault(); // Prevent form submission
        // verificar que todos los campos estén completos usando jquery
        var name = $('#name').val();
        var description = $('#description').val();
        var tags = $('#tags').val();
        if (name && description && tags) {
            
            alert(`Se guardo correctamente la categoria "${name}": ${description}`);
        } else {
            alert('Por favor complete todos los campos');
        }
    });

    $("#productForm").submit(function(event) {
        // verificar que todos los campos estén completos usando jquery
        event.preventDefault();
        var name = $('#name').val();
        var description = $('#description').val();
        var categoria = $('#category').val();
        if (name && description && categoria) {
            alert(`Se guardo correctamente el producto "${name}": ${description}`);
        } else {
            alert('Por favor complete todos los campos');
        }
    })
});

