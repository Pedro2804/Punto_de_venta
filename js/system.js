const menu = document.querySelectorAll('.menu');

$(document).ready(function(){
    fill_table_empl();

    menu.forEach(btn => {
        btn.addEventListener("click", () => {
            var modal = btn.id == "employees" ? "#modal-empl": 
                        btn.id == "inventory" ? "#modal-inv" :
                        btn.id == "client" ? "#modal-client" :
                        btn.id == "sales" ? "#modal-sales" : "";
            if (modal != ""){
                $(modal).modal("show");
                start_datatable();
            }
        });
    });
});

function start_datatable() {
    $("#Table_empl").DataTable({
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