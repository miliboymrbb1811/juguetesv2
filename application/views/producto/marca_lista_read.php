<div class="right_col" role="main">
    <!-- Inicio Div Right Col Role Main -->
    <div class="container md-3">
        <!-- Inicio Div container md-3 -->
        <div class="row">
            <!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 ">
                <!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel">
                    <!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <title> <i class="fa fa-tag"></i> marca.</title>
                        <h2><i class="fa fa-tag"></i> marca.</h2>
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
                                    <?php
                                    echo form_open_multipart('marca/agregar');
                                    ?>
                                    <button type="submit" style="float: right " class=" btn btn-round btn-info">
                                        <!--style= "float: right " para alinear ala derecha -->
                                        <i class="fa fa-plus-circle"></i> Insertar Marca
                                    </button>
                                    <?php
                                    echo form_close();
                                    ?>
                                    <br>
                                    <p class="text-muted font-13 m-b-30">
                                        Estimado administrador, en esta seccion usted vera las marcas, usted puede modificarlo haciendo click en el botón "Modificar" en la columna de "Acciones":
                                    </p>

                                    <table id="datatable-buttons" class="table table-primary table-striped " style="width:100%">
                                        <thead>
                                            <tr class="text-center table-danger text-dark">
                                                <th>Marca</th>
                                                <th>Creado</th>
                                                <th>Modificado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($marca->result() as $row) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row->numeroTienda; ?></td>
                                                    <td class="text-center"><?php echo formatearFechaMasHora($row->fechaRegistro); ?></td>
                                                    <td class="text-center"><?php echo formatearFechaMasHora($row->fechaActualizacion); ?></td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <?php echo form_open_multipart('marca/modificar'); ?>
                                                            <input type="hidden" name="idmarca" value="<?php echo $row->idMarca; ?>">
                                                            <button class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Editar">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <?php echo form_close(); ?>

                                                            <button class="btn btn-outline-danger" data-toggle="tooltip" onclick="return confirm_modalFotos(<?php echo $row->idMarca; ?>)" data-placement="top" title="Deshabilitar">
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

            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-tag   "></i> Lista de marca deshabilitadas.</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <!-- Inicio Div card-box table-responsive -->
                                    <p class="text-muted font-13 m-b-30">
                                        Estas son las marcas que se encuentran deshabilitadas
                                    </p>
                                    <table id="datatable" class=" table table-dark table-striped" style="width:100%">
                                        <thead>
                                            <tr class="text-center table-dark text-dark">
                                                <th>Marca</th>
                                                <th>Creado</th>
                                                <th>Modificado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($marcadeshabilitados->result() as $rowdeshabilitados) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $rowdeshabilitados->numeroTienda; ?></td>
                                                    <td class="text-center"><?php echo formatearFechaMasHora($rowdeshabilitados->fechaRegistro); ?></td>
                                                    <td class="text-center"><?php echo formatearFechaMasHora($rowdeshabilitados->fechaActualizacion); ?></td>
                                                    <td class="text-center">
                                                        <?php echo form_open_multipart('marca/habilitarbd'); ?>
                                                        <input type="hidden" name="idmarca" value="<?php echo $rowdeshabilitados->idMarca; ?>">
                                                        <button class="btn btn-success">
                                                            <i class="fa fa-toggle-on"></i> Habilitar
                                                        </button>
                                                        <?php echo form_close(); ?>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div><!-- Inicio Div card-box table-responsive -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->


<!------------------------------------------------- Modal ------------------------------------------------------->
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
</div>




<script>
    function confirm_modalFotos(id) {
        var url = '<?php echo base_url() . "index.php/marca/deshabilitarbd/"; ?>';
        $("#url-delete").attr('href', url + id);
        // jQuery('#confirmar').modal('show', {backdrop: 'static'});
        $('#modalConfirmacion').modal('show');
    }
</script>