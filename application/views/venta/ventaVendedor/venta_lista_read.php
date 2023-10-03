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
                        <TItle> <i class="fa fa-shopping-cart"></i></i> Ventas </TItle>
                        <h2><i class="fa fa-shopping-cart"></i> Ventas.</h2>
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
                                    <div class="btn-group " style="float: right ">
                                        <!--------------------------boton para ver cliented desavilitado directo en la lista------------------------------->
                                        <!-- <?php
                                                //echo form_open_multipart('cliente/deshabilitados');
                                                ?>
                                        <button type="submit" name="buttonDeshabilitados" class="btn btn-info">
                                            <i class="fa fa-eye"></i> Clientes Deshabilitados
                                        </button>
                                        <?php
                                        //echo form_close();
                                        ?>-->
                                        <!-----------------------------------------------fin---------------------------------------------------------------->
                                        <?php
                                        echo form_open_multipart('venta/vistaAgregarVenta');
                                        ?>
                                        <button type="submit" class="btn btn-round  btn-success">
                                            <i class="fa fa-shopping-cart"></i> Registrar Venta
                                        </button>
                                        <?php
                                        echo form_close();
                                        ?>

                                    </div>
                                    <br><br>
                                    <p class="text-muted font-13 m-b-30">
                                        Estimado administrador, en esta seccion puede visualizar las ventas realizadas.
                                    </p>
                                    <!-- la tabla de abajo tenia un id por defecto que ordenaba los tr el id se llama  datatable-buttons-->
                                    <table id="datatable-buttons" class="table table-dark table-striped" style="width:100%">
                                        <thead>
                                            <tr class="text-center table-dark text-dark">
                                
                                               <th>Cliente</th>
                                                <th>Total</th>
                                                <th>Estado</th>
                                                <th>fechaRegistro</th>
                                                <th>Reporte</th>
                                         
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($venta->result() as $row) {
                                            ?>
                                                <tr>
        
                                                <td><?php echo $row->nombreCliente; ?></td>
                                                    <td> <?php echo $row->total  ?></td>
                                                    <td><?php
                                                        if ($row->estado) {
                                                            echo "Activo";
                                                        } else {
                                                            echo "Desactivado";
                                                        }

                                                        ?></td>
                                                    <td><?php echo $row->fechaRegistro; ?></td>



                                                    <td  class="text-center">
                                                        <a ><?php  echo form_open_multipart('venta/reportepdf1'); ?>
                                                        <input type="hidden" name="idventa" value="<?php echo $row->idVenta; ?>">
                                                       <button    formtarget="_blank" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="detalle de la venta">
                                                            <i class="fa fa-file-pdf-o"></i>
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
                            </div><!-- Fin Div col-sm-12 2 -->
                        </div><!-- Fin Div row 2 -->
                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->
