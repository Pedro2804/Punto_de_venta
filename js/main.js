(() => {
    'use strict'
    const form_mylogin = document.querySelector("#mylogin");
    const formInputs = form_mylogin.querySelectorAll('.form-control');

    formInputs.forEach(input => {
        input.addEventListener('input', () => {
            input.value = input.value.replace(/[^a-z_A-Z0-9]/g, '');
        });
    });

    form_mylogin.addEventListener('submit', event => {
        event.preventDefault();
        send_form();
    });

    async function send_form() {
        let datas = new FormData(form_mylogin);
        datas.append('option', 'login');

        let cons_server = await fetch("controller/controller.php", { method: "POST", body: datas });
        let res = await cons_server.json();

        if(typeof res === "string"){
            formInputs[0].focus();
            _alert("error", res);
        }else{
            if(res){
                form_mylogin.reset();
                window.location.href = "system.php";
            }
        }
    }

    function _alert(typ, message) {
        Swal.fire({
            icon: typ,
            title: message,
            timer: 1500,
            showConfirmButton: false
        });
    }
})();