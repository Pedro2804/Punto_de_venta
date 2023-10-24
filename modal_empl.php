<!--START MODAL EMPLEADOS-->
<div class="modal fade" id="modal-empl" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="user-select: none;" >
        <div class="modal-content" style="max-height: 600px;">
            <div class="modal-header text-white" style="background: #808080;" >
                <h5 class="modal-title" id="staticBackdropLabel">EMPLEADOS</h5>
                <button type="button" class="btn-close btn-danger" id="btn_cerrar" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding: 0px !important;" >
                <nav class="navbar">
                    <div class="nav nav-tabs " id="nav-tab" role="tablist">
                        <button class="nav-link text-black active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                            <img src="img/Elementos/view.svg" alt="" class="d-inline-block align-text-top">Mostrar
                        </button>
                        <button class="nav-link text-black" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                            <img src="img/Elementos/plus.svg" alt="" class="d-inline-block align-text-top">Nuevo
                        </button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <table id="Tabla_empl" class="table table-hover table-borderless" cellspacing="0">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>Usuario</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>cipher</td>
                                    <td>Pedro</td>
                                    <td>Zoyoquila</td>
                                    <td>
                                        <img src="img/Elementos/edit.svg" title="Editar" width="30" class="d-inline-block align-text-top">
                                        <img src="img/Elementos/delete.svg" title="Eliminar" width="30" class="d-inline-block align-text-top">
                                    </td>
                                </tr>
                                <tr>
                                    <td>cipher</td>
                                    <td>Pedro</td>
                                    <td>Zoyoquila</td>
                                    <td>
                                        <img src="img/Elementos/edit.svg" title="Editar" width="30" class="d-inline-block align-text-top">
                                        <img src="img/Elementos/delete.svg" title="Eliminar" width="30" class="d-inline-block align-text-top">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade disabled" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <form class="row g-4 m-3">
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend">N</span>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" autofocus required/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend">P</span>
                                    <input type="text" class="form-control" id="paterno" name="paterno" placeholder="Apellido Paterno" required/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-text" id="inputGroupPrepend">M</span>
                                    <input type="text" class="form-control" id="materno" name="materno" placeholder="Apellido materno"required/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <img src="img/elementos/phone.svg" class="input-group-text">
                                    <input type="tel" class="form-control" maxlength="10" id="telefono" name="telefono" placeholder="Telefono"required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <img src="img/elementos/person.svg" class="input-group-text">
                                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class=" mb-3 input-group">
                                    <img src="img/elementos/password.svg" class="input-group-text">
                                    <input type="password" class="form-control" id="passwd" name="passwd" placeholder="Contraseña" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class=" mb-3 input-group">
                                    <img src="img/elementos/password.svg" class="input-group-text">
                                    <input type="password" class="form-control" id="confPasswd" name="confPasswd" placeholder="Confirmar contraseña" required/>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <h5>PERMISOS</h5>
                            </div>

                            <div class="col-md-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="empl">
                                    <label class="form-check-label" for="empl">Empleados</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="inv">
                                    <label class="form-check-label" for="inv">Inventario</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="cat">
                                    <label class="form-check-label" for="cat">Categoria</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="prov">
                                    <label class="form-check-label" for="prov">Proveedor</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="ventas">
                                    <label class="form-check-label" for="ventas">Ventas</label>
                                </div>
                            </div>

                            <div class="col-12 gap-2 d-flex justify-content-center">
                                <button type="button" class="btn btn-outline-dark" id="iniciarS">Guardar</button>
                                <button type="button" class="btn btn-outline-danger" id="ini">Cancelar</button>
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