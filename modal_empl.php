<?php
    if(!isset($_SESSION["global_user"])){
        header("Location: index.php");
    }
?>
<!--START MODAL EMPLEADOS-->
<div class="modal fade" id="modal-employees" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="user-select: none;" >
        <div class="modal-content" style="max-height: 600px;">
            <div class="modal-header text-white" style="background: #808080;" >
                <h5 class="modal-title" id="staticBackdropLabel">USUARIOS</h5>
                <button type="button" class="btn-close btn-danger" id="btn_close_modal_empl" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body " style="padding: 10px !important;" >
                <nav class="navbar">
                    <div class="nav nav-tabs " id="nav-tab" role="tablist">
                        <button class="nav-link text-black active" id="nav-btn-show" data-bs-toggle="tab" data-bs-target="#nav-show" type="button" role="tab" aria-controls="nav-show" aria-selected="true">
                            <img src="img/Elementos/view.svg" alt="" class="d-inline-block align-text-top">Mostrar
                        </button>
                        <button class="nav-link text-black" id="nav-btn-new" data-bs-toggle="tab" data-bs-target="#nav-new" type="button" role="tab" aria-controls="nav-new" aria-selected="false">
                            <img src="img/Elementos/plus.svg" alt="" class="d-inline-block align-text-top">Nuevo
                        </button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-show" role="tabpanel" aria-labelledby="nav-btn-show">
                        <table id="Table_empl" class="table table-hover table-borderless" cellspacing="0">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>Usuario</th>
                                    <th>Nombre</th>
                                    <th>Telefono</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade disabled" id="nav-new" role="tabpanel" aria-labelledby="nav-btn-new">    
                    <form id="form_new_empl" class="row g-4" >
                            <div class="col-md-12 d-none" id="id_user">
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <img src="img/elementos/client.svg" class="input-group-text">
                                        <input type="text" class="form-control" id="_user" name="_user" placeholder="" disabled/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend">N</span>
                                    <input type="text" class="form-control name" id="name" name="name" placeholder="Nombre" required/>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend">P</span>
                                    <input type="text" class="form-control name" id="first_name" name="first_name" placeholder="Apellido Paterno" required/>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend">M</span>
                                    <input type="text" class="form-control name" id="last_name" name="last_name" placeholder="Apellido materno" required/>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <img src="img/elementos/phone.svg" class="input-group-text">
                                    <input type="tel" class="form-control" maxlength="10" id="phone" name="phone" placeholder="Telefono" required/>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-4" id="div_show_user">
                                <div class="input-group">
                                    <img src="img/elementos/client.svg" class="input-group-text">
                                    <input type="text" class="form-control user" id="user" name="user" placeholder="Usuario" required/>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class=" mb-3 input-group">
                                    <img src="img/elementos/password.svg" class="input-group-text">
                                    <input type="password" class="form-control user" id="passwd" name="passwd" placeholder="Contraseña" required/>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class=" mb-3 input-group">
                                    <img src="img/elementos/password.svg" class="input-group-text">
                                    <input type="password" class="form-control user" id="confPasswd" name="confPasswd" placeholder="Confirmar contraseña" required/>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <h5>PERMISOS</h5>
                            </div>

                            <div class="col-md-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="switch_employee" name="empl">
                                    <label class="form-check-label" for="switch_employee" checked>Empleados</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="switch_inventory" name="inv">
                                    <label class="form-check-label" for="switch_inventory">Inventario</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="switch_client" name="prov">
                                    <label class="form-check-label" for="switch_client">Clientes</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="switch_prov" name="prov">
                                    <label class="form-check-label" for="switch_prov">Proveedores</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="switch_sale" name="sale">
                                    <label class="form-check-label" for="switch_sale">Ventas</label>
                                </div>
                            </div>

                            <div class="col-12 gap-2 d-flex justify-content-center">
                                <button type="submit" class="btn btn-outline-dark" id="save_empl">Guardar</button>
                                <button type="button" class="btn btn-outline-danger" id="cancel">Cancelar</button>
                            </div>
                        </form>                               
                    </div>
                </div>
            </div>
            <!--<div class="modal-footer"></div>-->
        </div>
    </div>
</div>
<!--END MODAL EMPLEADOS-->