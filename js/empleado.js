const btn_empleados = document.getElementById("empleados");
const form_empl = document.getElementById("nuevo_empl");

$(document).ready(function(){
    llenar_tabla_empl()

    btn_empleados.addEventListener("click", function() {
        $("#modal-empl").modal("show");
        iniciar_datatable();
    });

    form_empl.addEventListener("submit", function (event) {
        event.preventDefault();
        alert("enviar");
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
});

function iniciar_datatable() {
    $("#Tabla_empl").DataTable({
        "lengthMenu": [7], // Personaliza las opciones de longitud de página
        //"scrollY": "300px",
        //"scrollCollapse": false,
        //"paging": false, // Desactiva la paginación
        "responsive" : true,
        "language": {
            "url": "js/es-ES.json"
          }
    });
}

function llenar_tabla_empl() {
    $.ajax({
        type: "POST",
        url: "controller/controller.php",
        data: {option: "show_user"},
        cache: false,
        success: function(result) {
            var datas = JSON.parse(result);
            var cuerpoTabla = document.querySelector("#Tabla_empl tbody");

            datas["usuario"].forEach(element => {
                var fila = document.createElement("tr");
                var index = ["Usuario", "Nombre", "Telefono", "Editar", "Eliminar"];

                index.forEach(e => {
                    let celda = document.createElement("td");
                    if(e !== "Editar" && e !== "Eliminar"){
                        celda.textContent = element[e];
                    }else{
                        celda.innerHTML =  element[e];
                    }
                    fila.appendChild(celda);
                });

                cuerpoTabla.appendChild(fila)
            });
            
        }
    });
}

function cancelar_empl() {
    reiniciar_pad_empl();
    $("#nuevo_empl").trigger("reset");
}

function cerrar_modal_empl() {
    $("#Tabla_empl").DataTable().destroy();
    reiniciar_pad_empl();
}

function reiniciar_pad_empl() {
    $("#nav-profile-tab").removeClass("active");
    $("#nav-profile").removeClass("show active");
    $("#nav-profile").addClass("disabled");
    $("#nav-home-tab").addClass("active");
    $("#nav-home").removeClass("disabled");
    $("#nav-home").addClass("show active");
}