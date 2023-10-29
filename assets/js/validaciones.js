
// detectar el envio de un formulario

document.addEventListener('DOMContentLoaded', function() {
    $("#categoryForm").submit(function(event) {
        event.preventDefault(); // Prevent form submission
        // verificar que todos los campos estén completos usando jquery
        var name = $('#name').val();
        var description = $('#description').val();
        var tags = $('#tags').val();

        if (!$.trim(name) || !$.trim(description) || !$.trim(tags)) {
            alert('Por favor complete todos los campos');
        } else {
            alert(`Se guardo correctamente la categoria "${name}": ${description} con las etiquetas ${tags}`);
        }
    });

    $("#productForm").submit(function(event) {
        // verificar que todos los campos estén completos usando jquery
        event.preventDefault();
        var name = $('#name').val();
        var description = $('#description').val();
        var categoria = $('#category').val();
        if (!$.trim(name) || !$.trim(description) || !$.trim(categoria)) {
            alert('Por favor complete todos los campos');
        } else {
            alert(`Se guardo correctamente el producto "${name}": ${description} en la categoria ${categoria}`);
        }
    })
});

