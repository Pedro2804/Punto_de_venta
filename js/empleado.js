$(document).ready(function(){
    $("#modal-empl").modal("show");
    $("#empleados").click(function() {
        $("#modal-empl").modal("show");
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
});