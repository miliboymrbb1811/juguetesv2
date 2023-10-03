<div class="right_col" role="main">
    <!-- Inicio Div Right Col Role Main -->
    <div class="container md-3">
        <!-- Inicio Div container md-3 -->
        <div class="row">
            <!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12">
                <!-- Inicio Div col-md-12 col-sm-12 -->
                <div class="x_panel ">
                    <!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2><i class="fa fa-cubes"></i> Lista de producto deshabilitados.</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>

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
                                    echo form_open_multipart('producto/index2');
                                    ?>
                                    <button type="submit" name="buttonIndex" class="btn btn-outline-success">
                                        <i class="fa fa-arrow-circle-left"></i> Volver a producto
                                    </button>
                                    <?php
                                    echo form_close();
                                    ?>
                                    <br>
                                    <p class="text-muted font-13 m-b-30">
                                        Estimado administrador, los producto que usted está viendo a continuación no serán visibles al momento de realizar una compra o venta.
                                    </p>
                                    <table id="datatable-buttons" class="table table-primary table-striped " style="width:100%">
                                        <thead>
                                            <tr class="text-center table-danger text-dark">
                                                <th>Foto</th>
                                                <th>Marca</th>
                                                <th>Categoria</th>
                                                <th>Precio</th>
                                                <th>codigo</th>
                                                <th>Stock</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($producto->result() as $row) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?php
                                                        $foto = $row->foto;
                                                        if ($foto == "") {
                                                        ?>
                                                            <img src="<?php echo base_url(); ?>/uploads/products_images/sinImagen.jpg" width="30px">
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <img src="<?php echo base_url(); ?>uploads/products_images/<?php echo $foto; ?>" height="50px" class="mx-auto d-block">
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>

                                                    <td><?php echo $row->numeroTienda; ?></td>
                                                    <td><?php echo $row->numeroCategoria; ?></td>
                                                    <td><?php echo $row->precio; ?></td>
                                                    <td><?php echo $row->codigo; ?></td>
                                                    <td class="text-danger ">PRODUCTO DESHABILITADO</td>
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