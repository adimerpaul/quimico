<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Control de usuarios</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <p>En esta seccion se realiza el control de usuarios para acceso y designacion de turnos</p>
            <button type="button" class="btn btn-success " data-toggle="modal" data-target=".registros" data-tipo="CAL HIDRATADA"> <i class="fa fa-plus"></i> Registro de usuario</button>
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title" style="display: table-cell;">Nombre</th>
                        <th class="column-title" style="display: table-cell;">Usuario</th>
                        <th class="column-title" style="display: table-cell;">Tipo</th>
                        <th class="column-title" style="display: table-cell;">Estado</th>
                        <th class="column-title" style="display: table-cell;">Turno</th>
                        <th class="column-title" style="display: table-cell;">fecha de registro</th>
                        <th class="column-title no-link last" style="display: table-cell;"><span class="nobr">Opciones</span>
                        </th>

                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $query=$this->db->query("SELECT * FROM usuario WHERE idusuario<>1");
                    foreach ($query->result() as $row){
                        if ($row->estado=='ACTIVO'){
                            $estado="<span class='badge badge-success '>ACTIVO</span>";
                            $b="<a href='".base_url()."usuario/baja/$row->idusuario'  class='badge badge-danger p-1 text-white baja'> <i class='fa fa-close'></i> Dar de baja</a>";
                        }else{
                            $estado="<span class='badge badge-warning '>INACTIVO</span>";
                            $b="<a href='".base_url()."usuario/baja/$row->idusuario'  class='badge badge-success p-1 text-white '> <i class='fa fa-check'></i> Dar de alta</a>";
                        }
                        echo "<tr class='even pointer'>
                                <td class=''>$row->nombre</td>
                                <td class=''>$row->usuario</td>
                                <td class=''>$row->tipo</td>
                                <td class=''>$estado</td>
                                <td class=''>$row->turno</td>
                                <td class=''>$row->fecha</td>
                                <td class='a-right a-right'> 
                                    <button class='badge badge-warning p-1 ' data-idusuario='$row->idusuario' data-toggle='modal' data-target='.modificar'> <i class='fa fa-pencil'></i> Modificar</button>
                                    <a href='".base_url()."usuario/eliminar/$row->idusuario'  class='badge badge-danger p-1 text-white eli'> <i class='fa fa-trash-o'></i> Eliminar</a>
                                    $b
                                </td>
                            </tr>";
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade registros" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">Registro de nuevo usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?=base_url()?>Usuario/insert" class="form-horizontal form-label-left">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nombre">Nombre completo <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" id="nombre" required="required" class="form-control " name="nombre">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="usuario">Usuario <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" id="usuario" name="usuario" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="turno" class="col-form-label col-md-3 col-sm-3 label-align">Turno</label>
                        <div class="col-md-9 col-sm-9 ">
                            <select name="turno" id="turno" class="form-control" required>
                                <option value="">Seleccionar..</option>
                                <option value="22 a 06">22 a 06</option>
                                <option value="06 a 14">06 a 14</option>
                                <option value="14 a 22">14 a 22</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Tipo <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
<!--                            <input id="tipo" class="date-picker form-control" name="tipo" required="required" type="text">-->
                            <select name="tipo" id="tipo" class="form-control" required>
                                <option value="">Seleccionar..</option>
                                <option value="admin">Admin</option>
                                <option value="trabajador">Trabajandor</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="password" class="date-picker form-control" name="password" required="required" type="password">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Repetir password <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="password2" class="date-picker form-control" required="required" type="password">
                            <span id="mensaje" class="badge-warning">las contraseñas no son iguales</span>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-trash-o"></i>Cancelar</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-upload"></i>Guardar</button>
                    </div>
                </form>
                <form method="post" action="<?=base_url()?>Registros/insert">
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modificar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">Registro de nuevo usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?=base_url()?>Usuario/modificar" class="form-horizontal form-label-left">
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nombre">Nombre completo <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" id="idusuario2" required="required"  name="idusuario" hidden>
                            <input type="text" id="nombre2" required="required" class="form-control " name="nombre">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="usuario">Usuario <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" id="usuario2" name="usuario" required="required" class="form-control">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="turno" class="col-form-label col-md-3 col-sm-3 label-align">Turno</label>
                        <div class="col-md-9 col-sm-9 ">
                            <select name="turno" id="turno2" class="form-control" required>
                                <option value="">Seleccionar..</option>
                                <option value="22 a 06">22 a 06</option>
                                <option value="06 a 14">06 a 14</option>
                                <option value="14 a 22">14 a 22</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Tipo <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                            <!--                            <input id="tipo" class="date-picker form-control" name="tipo" required="required" type="text">-->
                            <select name="tipo" id="tipo2" class="form-control" required>
                                <option value="">Seleccionar..</option>
                                <option value="admin">Admin</option>
                                <option value="trabajador">Trabajandor</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="password12" class="date-picker form-control" name="password" required="required" type="password">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align">Repetir password <span class="required">*</span>
                        </label>
                        <div class="col-md-9 col-sm-9 ">
                            <input id="password22" class="date-picker form-control" required="required" type="password">
                            <span id="mensaje2" class="badge-warning">las contraseñas no son iguales</span>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-trash-o"></i>Cancelar</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-upload"></i>Guardar</button>
                    </div>
                </form>
                <form method="post" action="<?=base_url()?>Registros/insert">
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload=function () {
        $('#mensaje').hide();
        $('#mensaje2').hide();
        $('#password2').keyup(function (e) {
            if ($('#password').val()!=$('#password2').val()){
                $('#mensaje').show();
            }else{
                $('#mensaje').hide();
            }
        });
        $('#password22').keyup(function (e) {
            if ($('#password12').val()!=$('#password22').val()){
                $('#mensaje2').show();
            }else{
                $('#mensaje2').hide();
            }
        });
        $('.eli').click(function (e) {
            if (!confirm('Seguro de eliminar?')){
                e.preventDefault();
            }
        });
        $('.baja').click(function (e) {
            if (!confirm('Seguro de dar de baja?')){
                e.preventDefault();
            }
        });
        $('.modificar').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var idusuario = button.data('idusuario') // Extract info from data-* attributes
            $.ajax({
                url:'Usuario/datos/'+idusuario,
                success:function (e) {
                    // console.log(e);
                    const datos=JSON.parse(e)[0];
                    console.log(datos);
                    $('#nombre2').val(datos.nombre);
                    $('#usuario2').val(datos.usuario);
                    $('#turno2').val(datos.turno);
                    $('#tipo2').val(datos.tipo);
                    $('#password12').val(datos.clave);
                    $('#password22').val(datos.clave);
                    $('#idusuario2').val(idusuario);
                }
            })
        })
    }
</script>
