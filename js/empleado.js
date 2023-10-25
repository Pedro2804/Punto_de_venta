$(document).ready(function(){
    //$("#modal-empl").modal("show");
    $("#empleados").click(function() {
        $("#modal-empl").modal("show");
        iniciar_datatable();
    });

    $(document).keydown(function(e) {
        console.log(e.key);
    });

    $("#inventario").click(function() {
        alert("inv");
    });

    $("#categorias").click(function() {
        alert("cat");
    });

    $("#proveedor").click(function() {
        alert("prov");
    });

    $("#ventas").click(function() {
        alert("ventas");
    });

    $("#telefono").on('input', function() {
        var input = $(this);
        var valor = input.val();
    
        // Quitar cualquier caracter no numérico, como espacios o guiones
        valor = valor.replace(/[^0-9]/g, '');
    
        // Formatear el número de teléfono, por ejemplo, (123) 456-7890
        if (valor.length === 10) {
          valor = '(' + valor.substr(0, 3) + ') ' + valor.substr(3, 3) + '-' + valor.substr(6, 4);
        }
    
        input.val(valor);
      });

    // INICIO BOTONES DEL MODAL "EMPLEADOS"
    $("#btn_cerrar").click(function() {
        $("#Tabla_empl").DataTable().destroy();
        $("#nav-profile-tab").removeClass("active");
        $("#nav-profile").removeClass("show active");
        $("#nav-profile").addClass("disabled");
        $("#nav-home-tab").addClass("active");
        $("#nav-home").removeClass("disabled");
        $("#nav-home").addClass("show active");
    });
    // FIN

});

function iniciar_datatable() {
    $("#Tabla_empl").DataTable({
        "lengthMenu": [7], // Personaliza las opciones de longitud de página
        //"scrollY": "300px",
        //"scrollCollapse": false,
        //"paging": false, // Desactiva la paginación
        "language": {
            "url": "js/es-ES.json"
          }
    });
}