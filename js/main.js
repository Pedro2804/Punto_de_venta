$(document).ready(function(){
    $("#usuario").keypress(function(e) {
        (e.which == 13) ? validar() : "";
    });

    $("#passwd").keypress(function(e) {
        (e.which == 13) ? validar() : "";
    });

    $("#iniciarS").click(function () {
        validar();
    });
});

function validar() {
    if($("#usuario").val() == "" || $("#passwd").val() == ""){
        $("#passwd")[0].reportValidity();
        $("#usuario")[0].reportValidity();
    }else{
        $.ajax({
            type: "POST",
            url: "controller/controller.php",
            data: $("#milogin").serialize(),
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
                            window.location.href = 'adm.php';
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
                $("#milogin").trigger("reset");
                $("#usuario").focus();
            }
        });
    }
}