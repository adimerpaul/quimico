<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Historial de registros del dia</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <p>En este pagina puedes ver tu registro del dia <code>Importante si te olvidades de un registro puedes contactar con el administrador</code> </p>
            <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                        <th class="column-title" style="display: table-cell;">Turno </th>
                        <th class="column-title" style="display: table-cell;">Stdinicio</th>
                        <th class="column-title" style="display: table-cell;">Ingreso</th>
                        <th class="column-title" style="display: table-cell;">Salida</th>
                        <th class="column-title" style="display: table-cell;">Stdfinal</th>
                        <th class="column-title" style="display: table-cell;">Tipo </th>
                        <th class="column-title no-link last" style="display: table-cell;"><span class="nobr">Responsable</span>
                        </th>

                    </tr>
                    </thead>

                    <tbody>
                    <?php
                    $query=$this->db->query("SELECT * FROM kardex WHERE dia=date(now()) AND idusuario='".$_SESSION['idusuario']."'");
                    foreach ($query->result() as $row){
                        echo "<tr class='even pointer'>
                                <td class=''>$row->turno</td>
                                <td class=''>$row->stdinicio</td>
                                <td class=''>$row->ingreso</td>
                                <td class=''>$row->salida</td>
                                <td class=''>$row->stdfinal</td>
                                <td class='a-right a-right'>$row->tipo</td>
                                <td class='last'>$row->responsable</td>
                            </tr>";
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
