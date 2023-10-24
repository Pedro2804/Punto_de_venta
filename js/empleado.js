$(document).ready(function(){
    //$("#modal-empl").modal("show");
    $("#empleados").click(function() {
        $("#modal-empl").modal("show");
        iniciar_datatable();
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

    $("#agregar").click(function() {
        $("#nav-home-tab").removeClass("active");
        $("#nav-home-tab").addClass("disabled");
        $("#nav-profile-tab").removeClass("disabled");
        $("#nav-profile-tab").addClass("active");
        $("#nav-home").removeClass("show active");
        $("#nav-home").addClass("disabled");
        $("#nav-profile").removeClass("disabled");
        $("#nav-profile").addClass("show active");
        $("#miTabla").DataTable().destroy();
    });

    $("#cancelar").click(function() {
        $("#nav-home-tab").removeClass("disabled");
        $("#nav-home-tab").addClass("active");
        $("#nav-profile-tab").removeClass("active");
        $("#nav-profile-tab").addClass("disabled");
        $("#nav-home").removeClass("disabled");
        $("#nav-home").addClass("show active");
        $("#nav-profile").removeClass("show active");
        $("#nav-profile").addClass("disabled");
        iniciar_datatable();
    });

    $("#salir").click(function() {
        $("#nav-home-tab").removeClass("disabled");
        $("#nav-home-tab").addClass("active");
        $("#nav-profile-tab").removeClass("active");
        $("#nav-profile-tab").addClass("disabled");
        $("#nav-home").removeClass("disabled");
        $("#nav-home").addClass("show active");
        $("#nav-profile").removeClass("show active");
        $("#nav-profile").addClass("disabled");
        $("#modal-empl").modal("hide");
        $("#miTabla").DataTable().destroy();
    });
});

function iniciar_datatable() {
    $("#Tabla_empl").DataTable({
        "lengthMenu": [6, 12, 24, 48], // Personaliza las opciones de longitud de página
        //"scrollY": "325px",
        //"scrollCollapse": false,
        //"paging": false, // Desactiva la paginación
        "language": {
            "url": "js/es-ES.json"
          }
    });
}