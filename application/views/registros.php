<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Registro de quimicos</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <button type="button" style="width: 180px" class="btn btn-warning" data-toggle="modal" data-target=".registros" data-tipo="CAL HIDRATADA">CAL HIDRATADA</button>
            <button type="button" style="width: 180px" class="btn btn-primary" data-toggle="modal" data-target=".registros" data-tipo="FLOCULANTE 933">FLOCULANTE 933</button>
            <button type="button" style="width: 180px" class="btn btn-success" data-toggle="modal" data-target=".registros" data-tipo="COAGULANTE 958">COAGULANTE 958</button>
            <button type="button" style="width: 180px" class="btn btn-info" data-toggle="modal" data-target=".registros" data-tipo="ACIDO SULFURICO">ACIDO SULFURICO</button>
            <button type="button" style="width: 180px" class="btn btn-danger" data-toggle="modal" data-target=".registros" data-tipo="SAL">SAL</button>
        </div>
    </div>
</div>
<!-- modals -->
<!-- Small modal -->
<div class="modal fade registros" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">Modal title</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?=base_url()?>Registros/insert">
                    <label for="entrada">Entrada :</label>
                    <input type="text" id="tipo" name="tipo" hidden>
                    <input type="number" id="entrada" class="form-control" name="entrada" step="0.01" value="0">
                    <label for="salida">Salida:</label>
                    <input type="number" id="salida" class="form-control" name="salida" step="0.01" value="0">
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-trash-o"></i>Cancelar</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-upload"></i>Guardar</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>
<!-- /modals -->
<script>
    window.onload=function (e) {
        // console.log('a');
        $('.registros').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var tipo = button.data('tipo') // Extract info from data-* attributes
            $('#tipo').val(tipo);
            var modal = $(this)
            modal.find('.modal-title').text(tipo)
            // modal.find('.modal-body input').val(recipient)
        })
    }
</script>
