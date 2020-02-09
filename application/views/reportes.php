<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Generador de reportes</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form action="<?=base_url()?>Reportes/generar" method="post">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <label for="mes">Mes</label>
                        <select id="mes" class="form-control" required="" name="mes">
                            <option value="">Seleccionar..</option>
                            <option value="1">Enero</option>
                            <option value="2">Febrero</option>
                            <option value="3">Marzo</option>
                            <option value="4">Abril</option>
                            <option value="5">Mayo</option>
                            <option value="6">Junio</option>
                            <option value="7">Julio</option>
                            <option value="8">Agosto</option>
                            <option value="9">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                        </select>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <label for="anio">Año</label>
                        <input type="text" name="anio" class="form-control"  required value="<?=date('Y')?>">
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <label for="heard">Generar</label>
                        <button type="submit" class="btn btn-success btn-block"> <i class="fa fa-file-pdf-o"></i> Generar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    window.onload=function () {
        $('#mes').val(parseInt( <?=date('m')?>));
    }
</script>
