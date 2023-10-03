<div class="right_col" role="main">
    <!-- Inicio Div Right Col Role Main -->
    <div class="container md-3">
        <!-- Inicio Div container md-3 -->
        <div class="row">
            <!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12">
                <!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel">
                    <!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <TITle><i class="fa fa-suitcase"></i> Empleados.</TITle>
                        <h2><i class="fa fa-suitcase"></i> Empleados.</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content">
                        <!-- Inicio Div x_content -->
                        <div class="row">
                            <!-- Inicio Div row 2 -->
                            <div class="col-sm-12">
                                <!-- Inicio Div col-sm-12 2 -->
                                <div class="card-box table-responsive">
                                    <!-- Inicio Div card-box table-responsive -->
                                    <div class="btn-group" style="float: right ">
                                        <!--------------------------------------------boton para visualisar empleados desavilitados ----------------------------
                                        <?php
                                        //echo form_open_multipart('empleado/deshabilitados');
                                        ?>
                                        <button type="submit" name="buttonDeshabilitados" class="btn btn-info">
                                            <i class="fa fa-eye"></i> Empleados Deshabilitados
                                        </button>
                                        <?php
                                        //  echo form_close();
                                        ?> 
 ------------------------------------------------------------------------------------------------------------------>
                                        <?php
                                        echo form_open_multipart('empleado/agregar');
                                        ?>
                                        <button type="submit" class="btn  btn-round  btn-success">
                                            <i class="fa fa-plus-circle"></i> Insertar Empleado
                                        </button>
                                        <?php
                                        echo form_close();
                                        ?>
                                    </div>
                                    <br><br>
                                    <p class="text-muted font-13 m-b-30">
                                        En esta tabla se visualizan a todos los empleados activos
                                    </p>
                                   <table id="datatable-buttons" class="table table-primary table-striped " style="width:100%">
                                        <thead>
                                            <tr class="text-center table-danger text-dark">
                                                <th>Nombre</th>
                                                <th>Apellido paterno</th>
                                                <th>Apellido materno</th>
                                                <th>N°. Celular</th>
                                                <th>N°. Carnet</th>
                                                <th>Fecha de ingreso</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($empleado->result() as $row) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row->nombre; ?></td>
                                                    <td><?php echo $row->primerApellido; ?></td>
                                                    <td><?php echo $row->segundoApellido; ?></td>
                                                    <td align="center"><?php echo $row->numeroCelular; ?></td>
                                                    <td ><?php echo $row->numeroCI; ?></td>
                                                    <td align="center"><?php echo formatearFechaMasHora($row->fechaRegistro); ?></td>

                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <?php echo form_open_multipart('empleado/modificar'); ?>
                                                            <input type="hidden" name="idempleado" value="<?php echo $row->idEmpleado; ?>">
                                                            <button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <?php echo form_close(); ?>

                                                            <button class="btn btn-outline-danger" data-toggle="tooltip" onclick="return confirm_modalmodificar(<?php echo $row->idEmpleado; ?>)" data-placement="top" title="Deshabilitar">
                                                                <i class="fa fa-toggle-off"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                </div><!-- Inicio Div card-box table-responsive -->
                            </div><!-- Fin Div col-sm-12 2 -->
                        </div><!-- Fin Div row 2 -->
                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->


<!--------------------------------------------------------- Modal -------------------------------------------------->
<div class="modal fade" id="modalConfirmacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content alert alert-danger ">
            <div class="modal-content alert-secondary ">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"> Confirmación Deshabilitar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Estás seguro de Deshabilitar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancelar</button>
                    <a id="url-delete" type="submit" class="btn btn-outline-danger"><i class="fa fa-check-circle-o"></i> Deshabilitar</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirm_modalmodificar(id) {
            var url = '<?php echo base_url() . "index.php/empleado/deshabilitarbd/"; ?>';
            $("#url-delete").attr('href', url + id);
            // jQuery('#confirmar').modal('show', {backdrop: 'static'});
            $('#modalConfirmacion').modal('show');
        }
    </script>