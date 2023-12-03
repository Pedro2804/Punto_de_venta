const btn_close_modal = document.getElementById('btn_close_modal_empl');
const btn_nav_show = document.getElementById("nav-btn-show");
const btn_nav_new = document.getElementById("nav-btn-new");
const input_name = document.getElementById("name");
const input_firstname = document.getElementById("first_name");
const input_lastname = document.getElementById("last_name");
const div_valid_user = document.getElementById("div_valid_user");
const input_user = document.getElementById("user");
const input_passwd = document.getElementById("passwd");
const input_confPasswd = document.getElementById("confPasswd");
//const form_empl = document.getElementById("form_new_empl");
const form_empl = document.querySelectorAll('.needs-validation');
const btn_save_empl = document.getElementById("save_empl");
const btn_cancel = document.getElementById("cancel");

$(document).ready(function () {
    btn_close_modal.addEventListener("click", function () {
        close_modal_empl();
        div_valid_user.classList.remove('invalid-feedback');
        div_valid_user.classList.remove('valid-feedback');
        div_valid_user.innerHTML = '';
        input_user.classList.remove('is-invalid');
        input_user.classList.remove('is-valid');
        input_user.removeAttribute('aria-describedby');
    });

    input_name.addEventListener("input", function () {
        mayus(this);
    });

    input_firstname.addEventListener("input", function () {
        mayus(this);
    });

    input_lastname.addEventListener("input", function () {
        mayus(this);
    });

    input_user.addEventListener("input", function () {
        mayus(this);
    });

    input_passwd.addEventListener("input", function () {
        mayus(this);
    });

    input_confPasswd.addEventListener("input", function () {
        mayus(this);
    });

    btn_cancel.addEventListener("click", function () {
        reset_pad_empl();
    });

    $("#phone").on('input', function() {
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

      validate_form();
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

function fill_table_empl() {
    $.ajax({
        type: "POST",
        url: "controller/controller.php",
        data: {option: "fill_table"},
        cache: false,
        success: function(result) {
            var datas = JSON.parse(result);
            var cuerpoTabla = document.querySelector("#Table_empl tbody");

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

function close_modal_empl() {
    $("#Table_empl").DataTable().destroy();
    reset_pad_empl();
}

function reset_pad_empl() {
    btn_nav_new.classList.remove('active');
    btn_nav_show.classList.add('active');
    btn_nav_show.classList.remove('d-none');
    btn_nav_show.classList.remove('disabled');
    btn_nav_new.innerHTML = '<img src="img/Elementos/plus.svg" alt="" class="d-inline-block align-text-top">Nuevo';
    $("#nav-new").removeClass("show active");
    $("#nav-new").addClass("disabled");
    $("#nav-show").removeClass("disabled");
    $("#nav-show").addClass("show active");
    $("#input_user").addClass("d-none");
    $("#form_new_empl").trigger("reset");
}

function edit_empl(_usuario) {
    btn_nav_show.classList.remove('active');
    btn_nav_show.classList.add('disabled');
    btn_nav_show.classList.add('d-none');
    btn_nav_new.classList.add('active');
    btn_nav_new.innerHTML = '<img src="img/Elementos/plus.svg" alt="" class="d-inline-block align-text-top">Editar';
    $("#nav-show").addClass("disabled");
    $("#nav-show").removeClass("show active");
    $("#nav-new").addClass("show active");
    $("#nav-new").removeClass("disabled");
    $("#input_user").removeClass("d-none");
    $("#_user").val(_usuario.id);
}

function mayus(input) {
    var entrada = input.value;
    if ((input.id == 'name') || (input.id == 'first_name') || (input.id == 'last_name')) {
        entrada = entrada.replace(/[^a-z A-Z]/g, '');

        if(entrada.length == 1){
            entrada = entrada.toUpperCase();
        }

        input.value = entrada;
    }else if ((input.id == 'passwd') || (input.id == 'confPasswd')){
        entrada = entrada.replace(/[^a-z_A-Z0-9]/g, '');
        input.value = entrada;
    }else{
        entrada = entrada.replace(/[^a-z_A-Z0-9]/g, '');
        input.value = entrada;

        $.ajax({
            type: "POST",
            url: "controller/controller.php",
            data: {option: "user_repeat", user: input.value},
            cache: false,
            success: function(result) {
                var data = JSON.parse(result);
                if (input_user.value.length >= 1){
                    if(data == 1){
                        div_valid_user.classList.remove('valid-feedback');
                        div_valid_user.classList.add('invalid-feedback');
                        div_valid_user.innerHTML = '¡Ya existe el usuario!';
                        input_user.classList.remove('is-valid');
                        input_user.classList.add('is-invalid');
                        input_user.setAttribute('aria-describedby', 'div_valid_user');
                    }else{
                        div_valid_user.classList.remove('invalid-feedback');
                        div_valid_user.classList.add('valid-feedback');
                        div_valid_user.innerHTML = '¡Correccto!';
                        input_user.classList.remove('is-invalid');
                        input_user.classList.add('is-valid');
                        input_user.removeAttribute('aria-describedby');
                    }
                }else{
                    div_valid_user.classList.remove('invalid-feedback');
                    div_valid_user.classList.remove('valid-feedback');
                    div_valid_user.innerHTML = '';
                    input_user.classList.remove('is-invalid');
                    input_user.classList.remove('is-valid');
                    input_user.removeAttribute('aria-describedby');
                }       
            }
        });
    }
}

function validate_form() {
    Array.from(form_empl).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
            }
    
            form.classList.add('was-validated');
        }, false);
    });
}