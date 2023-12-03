const user = document.getElementById("user");
const passwd = document.getElementById("passwd");
const btn_iniciar = document.getElementById("login");

user.addEventListener('keypress', function (e) {
    (e.charCode == 13) ? validate() : "";
});

passwd.addEventListener('keypress', function(e) {
    (e.charCode == 13) ? validate() : "";
});

btn_iniciar.addEventListener("click", function() {
    validate();
});

function validate() {
    if(user.value == "" || passwd.value == ""){
        passwd.reportValidity();
        user.reportValidity();
    }else{
        $.ajax({
            type: "POST",
            url: "controller/controller.php",
            data: $("#mylogin").serialize(),
            cache: false,
            success: function(result) {
                var res = JSON.parse(result);
                const results = {
                    0 : function(){
                            Swal.fire({
                                icon: 'error',
                                title: 'Usuario incorrecto',
                                timer: 1500,
                                showConfirmButton: false
                            })
                        },
                    1 : function(){
                            window.location.href = 'system.php';
                            /*Swal.fire({
                                icon: 'question',
                                title: '¿Cómo desea acceder?',
                                confirmButtonText: 'Adminstrador',
                                cancelButtonText: 'Cajero',
                                confirmButtonColor: '#ff6600',
                                cancelButtonColor: '#000000',
                                iconColor: '#ff6600',
                                showCloseButton: true,
                                showConfirmButton: true,
                                showCancelButton: true
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = 'adm.php';
                                } else if (result.dismiss === Swal.DismissReason.cancel) {
                                    window.location.href = 'cajero.php';
                                };
                            })*/
                        },
                    2 : function(){
                            Swal.fire({
                                icon: 'error',
                                title: 'Contraseña incorrecta',
                                timer: 1500,
                                showConfirmButton: false
                            })
                        }
                }
                results[res]();
                $("#mylogin").trigger("reset");
                user.focus();
            }
        });
    }
}