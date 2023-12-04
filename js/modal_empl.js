const btn_close_modal = document.getElementById('btn_close_modal_empl');
const btn_nav_show = document.getElementById("nav-btn-show");
const btn_nav_new = document.getElementById("nav-btn-new");
const form_empl = document.querySelectorAll('.needs-validation');
const btn_save_empl = document.getElementById("save_empl");
const btn_cancel = document.getElementById("cancel");

const input_name = document.querySelectorAll('.name');
const input_phone = document.getElementById("phone");
const input_user = document.querySelectorAll('.user');
let users;

$(document).ready(function () {
    list_users();

    btn_close_modal.addEventListener("click", function () {
        close_modal_empl();
    });

    input_name.forEach(input => {
        input.addEventListener("input", () => {
            var entrada = input.value;
            entrada = entrada.replace(/[^a-z A-Z]/g, '');

            if(entrada.length == 1){
                entrada = entrada.toUpperCase();
            }

            if (entrada[0] == ' ' || entrada[entrada.length - 1] == ' '){
                input.classList.add("is-invalid");
                input.nextElementSibling.innerHTML = '!No debe empezar ni terminar con espacio¡';
            }else{
                input.classList.remove("is-invalid");
                input.nextElementSibling.innerHTML = '';
            }

            input.value = entrada;
        });
    });

    input_phone.addEventListener("input", () => {
        var valor = input_phone.value;

        valor = valor.replace(/[^0-9]/g, '');
    
        if (valor.length === 10) {
          valor = '(' + valor.substr(0, 3) + ') ' + valor.substr(3, 3) + '-' + valor.substr(6, 4);
        }
    
        input_phone.value = valor;
    });

    input_user.forEach(input => {
        input.addEventListener("input", () => {
            var entrada = input.value;
            var val = '';
            entrada = entrada.replace(/[^a-z_A-Z0-9]/g, '');

            val = (entrada[0] == '_' || entrada[entrada.length - 1] == '_') ? '!No debe empezar ni terminar con _ ¡' : '';

            if (input.id == "user"){
                if (users != undefined && users.includes(entrada)){
                    val = '!El usuario ya existe¡';
                }
            }else{
                var passwd = document.getElementById("passwd");
                var confPasswd = document.getElementById("confPasswd");

                if ((passwd.value != "") && (confPasswd.value != "") && (passwd.value != confPasswd.value)){
                    val = '!La contraseña no coincide¡';
                }

                if ((passwd.value != "") && (confPasswd.value != "") && (passwd.value == confPasswd.value)){
                    passwd.classList.remove("is-invalid");
                    passwd.nextElementSibling.innerHTML = '';
                    confPasswd.classList.remove("is-invalid");
                    confPasswd.nextElementSibling.innerHTML = '';
                }
            }

            if(val != ''){
                input.classList.add("is-invalid");
                input.nextElementSibling.innerHTML = val;
            }else{
                input.classList.remove("is-invalid");
                input.nextElementSibling.innerHTML = '';
            }

            input.value = entrada;
        });
    });

    btn_cancel.addEventListener("click", function () {
        reset_pad_empl();
    });

      validate_form();
});

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

function list_users() {
    $.ajax({
        type: "POST",
        url: "controller/controller.php",
        data: {option: "user_repeat"},
        cache: false,
        success: function(result) {
            users = JSON.parse(result)
        },
        error: function(error) {
            console.error(error);
        }
    });
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