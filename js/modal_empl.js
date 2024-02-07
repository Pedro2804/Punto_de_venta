const btn_close_modal = document.querySelector('#btn_close_modal_empl');
const btn_nav_show = document.querySelector("#nav-btn-show");
const btn_nav_new = document.querySelector("#nav-btn-new");
const nav_show = document.querySelector("#nav-show");
const nav_new = document.querySelector("#nav-new");
const is_valid_feed = document.querySelectorAll(".invalid-feedback");

const form_new_empl = document.querySelector('#form_new_empl');
const btn_cancel = document.querySelector("#cancel");

const div_id_user = document.querySelector("#id_user");
const input_name = document.querySelectorAll('.name');
const input_phone = document.querySelector("#phone");
const div_show_user = document.querySelector("#div_show_user");
const input_user = document.querySelectorAll('.user');
const input_switch = document.querySelectorAll('.form-check-input');

let _userval = "";

$(document).ready(function () {
    btn_close_modal.addEventListener("click", function () {
        close_modal_empl();
    });

    input_name.forEach(input => {
        input.addEventListener("input", () => {
            var entrada = input.value;
            entrada = entrada.replace(/[^a-z A-Z á-ú]/g, '');

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
        var aux = '';

        valor = valor.replace(/[^0-9]/g, '');
    
        if ((valor.length === 10) || (valor.length === 0)) {
            if (valor.length === 10){
                valor = '(' + valor.substr(0, 3) + ') ' + valor.substr(3, 3) + '-' + valor.substr(6, 4);
            }
            input_phone.classList.remove("is-invalid");
            aux = '';
        }else if (((valor.length > 0) && (valor.length < 10)) || (valor.length > 10)){
            input_phone.classList.add("is-invalid");
            aux = '¡Solo 10 caracteres!';
        }

        input_phone.nextElementSibling.innerHTML = aux;
    
        input_phone.value = valor;
    });

    input_user.forEach(input => {
        input.addEventListener("input", () => {
            var entrada = input.value;
            var val = '';
            entrada = entrada.replace(/[^a-z_A-Z0-9]/g, '');

            val = (entrada[0] == '_' || entrada[entrada.length - 1] == '_') ? '!No debe empezar ni terminar con _ ni espacio ¡' : '';

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

    form_new_empl.addEventListener('submit', event => {
        event.preventDefault();
        let ban = true;

        for (let i = 0; i < is_valid_feed.length; i++) {
            if(is_valid_feed[i].textContent !== ''){
                ban = false;
                break;
            }
        }

        if(ban){
            if(_userval == ""){
                save_empl();
            }else{
                update_empl();
            }
        }else{
            Swal.fire({
                icon: "error",
                title: 'Favor de verificar los datos',
                timer: 1500,
                showConfirmButton: false
            });
        }
    });
});

function fill_table_empl(){
    return new Promise(async (result) => {
        try {
            let datas = new FormData();
            datas.append('option', 'fill_table');
            datas.append('online', user_online);
            
            let cons_server = await fetch("controller/controller.php", { method: "POST", body: datas });
            let res = await cons_server.json();
            
            var cuerpoTabla = document.querySelector("#Table_empl tbody");
            let action = [];
        
            if(res.length > 0){
                res["usuario"].forEach(element => {
                    var fila = document.createElement("TR");
                    var index = ["Usuario", "Nombre", "Telefono", "Editar", "Eliminar"];

                    index.forEach(e => {
                        let celda = document.createElement("TD");
                        if(e !== "Editar" && e !== "Eliminar"){
                            if(e === "Usuario"){
                                action.push(element[e]);
                            }
                            celda.textContent = element[e];
                        }else{
                            celda.innerHTML =  element[e];
                        }
                        fila.appendChild(celda);
                    });
                    cuerpoTabla.appendChild(fila);
                });

                action.forEach(o => {
                    const edit = document.getElementById("edit_"+o);
                    const del = document.getElementById("delete_"+o);
                
                    edit.addEventListener("click", function() {
                        show_empl(o);
                    });
            
                    del.addEventListener("click", function() {
                        delete_empl(o);
                    });
                });
            }
            result(true);
        } catch (error) {
            result(false);
        }
    });
}

async function fill_table(){
    let res = await fill_table_empl();

    if(res){
        start_datatable();
    }else{
        Swal.fire({
            icon: 'error',
            title: 'No se pudo llenar la tabla',
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

function close_modal_empl() {
    data_table_empl.destroy();
    document.querySelector("#Table_empl tbody").innerHTML = '';
    reset_pad_empl();
}

function reset_pad_empl() {
    form_new_empl.reset();

    for (let i = 0; i < 3; i++) {
        input_name[i].classList.remove('is-invalid');
        input_user[i].classList.remove('is-invalid');
        input_name[i].nextElementSibling.innerHTML = '';
        input_user[i].nextElementSibling.innerHTML = '';
    }

    btn_nav_show.classList.add('active');
    btn_nav_show.classList.remove('disabled', 'd-none');
    btn_nav_new.classList.remove('active');
    btn_nav_new.innerHTML = '<img src="img/Elementos/plus.svg" alt="" class="d-inline-block align-text-top">Nuevo';
    
    nav_new.classList.remove("show", "active");
    nav_new.classList.add("disabled");
    nav_show.classList.remove("disabled");
    nav_show.classList.add("show", "active");

    div_id_user.classList.add("d-none");
    div_show_user.classList.remove("d-none");

    input_user[0].removeAttribute("disabled", "");
    _userval = "";
    
    for (let i = 1; i < input_user.length; i++) {
        input_user[i].setAttribute("required", "");
    }
}

async function show_empl(_usuario) {
    btn_nav_show.classList.remove('active');
    btn_nav_show.classList.add('disabled', 'd-none');
    btn_nav_new.classList.add('active');
    btn_nav_new.innerHTML = '<img src="img/Elementos/plus.svg" alt="" class="d-inline-block align-text-top">Editar';
    
    nav_new.classList.add("show", "active");
    nav_new.classList.remove("disabled");
    nav_show.classList.add("disabled");
    nav_show.classList.remove("show", "active");

    div_id_user.classList.remove("d-none");
    div_show_user.classList.add("d-none");

    input_user[0].setAttribute("disabled", "");

    document.querySelector("#_user").value = _usuario;
    _userval = _usuario;
    
    let datas = new FormData();
    datas.append('option', 'show_employee');
    datas.append('id', _userval);

    try {
        const consulta = await fetch("controller/controller.php", { method: 'POST', body: datas });
        let user = await consulta.json();

        _name = [user.user["Nombre"], user.user["APP"], user.user["APM"]];
        tel = user.user["Telefono"];
        persmissions = [user.user["Empleado"], user.user["Inventario"], user.user["Cliente"], user.user["Proveedor"], user.user["Venta"]];

        for (let i = 0; i < input_name.length; i++) {
            input_name[i].value = _name[i];
        }
        input_phone.value = tel;

        for (let i = 0; i < input_switch.length; i++) {
            input_switch[i].checked = persmissions[i] == 1 ? true : false;
        }

        input_user.forEach(input => input.removeAttribute("required"));

    } catch (error) {
        _alert("error", 'No se completó la petición');
        reset_pad_empl();
        console.error(error);
    }
}

function delete_empl(user) {
    Swal.fire({
        icon: 'question',
        title: '¿Seguro que quiere eliminar este usuario?',
        confirmButtonText: 'Si',
        cancelButtonText: 'No',
        confirmButtonColor: '#ff6600',
        cancelButtonColor: '#000000',
        iconColor: '#ff6600',
        showCloseButton: true,
        showConfirmButton: true,
        showCancelButton: true
    }).then((result) => {
        if (result.isConfirmed) {
            let datas = new FormData();
            datas.append("option", "delete_employee");
            datas.append("id", user);

            fetch("controller/controller.php", {method: "POST", body: datas})
            .then(res => res.json())
            .then(res => {
                Swal.fire({
                    icon: res ? 'success' : 'error',
                    title: res ? 'Usuario eliminado correctamente' : res,
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => {
                    if(res === true){
                        document.querySelector(`#delete_${user}`).remove();
                        document.querySelector(`#edit_${user}`).remove();
                        close_modal_empl();
                        fill_table();
                    }
                });
            })
        }
    })
}

function save_empl() {
    let datas = new FormData();
    datas.append("option", "save_empl");
        
    input_name.forEach(e => datas.append(e.id, e.value) );

    datas.append("phone", input_phone.value);

    input_user.forEach(e => datas.append(e.id, e.value) );

    input_switch.forEach(e => datas.append(e.id, e.checked ? 1 : 0) );

    fetch("controller/controller.php", { method: 'POST', body: datas})
    .then(res => res.json())
    .then(res => {
        Swal.fire({
            icon: res === true ? 'success' : "error",
            title: res === true ? 'Datos guardados correctamente' : res === false ? 'El usuario ingresado ya existe' : res,
            timer: 1500,
            showConfirmButton: false
        }).then(() => {
            if(res === true){
                close_modal_empl();
                fill_table();
            }
        });
    });
}

function update_empl() {
    let datas = new FormData();
    datas.append("option", "update_employee");
    datas.append("id_update", _userval);
        
    input_name.forEach(e => datas.append(e.id, e.value));

    datas.append("phone", input_phone.value);

    input_user.forEach(input => datas.append(input.id, input.value));

    input_switch.forEach(e => datas.append(e.id, e.checked ? 1 : 0));

    fetch("controller/controller.php", {method: "POST", body: datas})
    .then(res => res.json())
    .then(res => {
        Swal.fire({
            icon: res === true ? 'success' : "error",
            title: res === true ? 'Cambios guardados correctamente' :  res,
            timer: 1500,
            showConfirmButton: false
        }).then(() => {
            if(res === true){
                close_modal_empl();
                fill_table();
            }
        });
    })
}

function _alert(typ, message) {
    Swal.fire({
        icon: typ,
        title: message,
        timer: 1500,
        showConfirmButton: false
    });
}