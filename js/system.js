let menu;
const btn_logout = document.querySelector('#logout');
const ul_nav = document.querySelector("#ul_permissions");
let data_table_empl;

async function permiss() {
    let datas = new FormData();
    datas.append("option", "permissions");
    datas.append("online", user_online);

    const consult = await fetch("controller/controller.php", {method: "POST", body: datas})
    const res = await consult.json();
    
    if(res !== false){
        res.ul.forEach(e => ul_nav.innerHTML += e);

        menu = document.querySelectorAll('.menu');

        menu.forEach(btn => {
            btn.addEventListener("click", () => {
                fill_table();
                $(`#modal-${btn.id}`).modal("show");
            });
        });
    }else{
        Swal.fire({
            icon: 'error',
            title: 'No se cargaron los permisos',
            confirmButtonText: 'Recargar',
            confirmButtonColor: '#ff6600',
            showCloseButton: false,
            showConfirmButton: true,
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "system.php";
            }
        })
    }
}

$(document).ready(function(){

    permiss();

    btn_logout.addEventListener('click', () => {
        let datas = new FormData();
        datas.append('option', 'logout');

        fetch("controller/controller.php", { method: "POST", body: datas })
        .then(window.location.href = 'index.php' );
    });
});

function start_datatable() {
    data_table_empl = $("#Table_empl").DataTable({
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

function _alert(typ, message) {
    Swal.fire({
        icon: typ,
        title: message,
        timer: 1500,
        showConfirmButton: false
    });
}