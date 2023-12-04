(() => {
    'use strict'
    const form_mylogin = document.getElementById("mylogin");
    const formInputs = form_mylogin.querySelectorAll('.form-control');

    formInputs.forEach(input => {
        input.addEventListener('input', () => {
            input.value = input.value.replace(/[^a-z_A-Z0-9]/g, '');
        });
    });

    form_mylogin.addEventListener('submit', event => {
        if (!form_mylogin.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
            return;
        }

        event.preventDefault();
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
                            });
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
                            });
                        }
                }
                results[res]();
                $("#mylogin").trigger("reset");
                document.getElementById("user").focus();
            }
        });
    }, false);
})();