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
                        <title> <i class="fa fa-cubes"></i> producto </title>
                        <h2><i class="fa fa-cubes"></i> producto.</h2>
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

                                    <!-- Inicio Div card-box table-responsive -->
                                    <br><br>
                                    <!-- <p class="text-muted font-13 m-b-30">
                                        Hora Actual: <?php echo date('d/m/Y H:i:s') ?>
                                        <br>
                                        Tipo: <?php echo $this->session->userdata('tipo') ?>
                                        <br>
                                        ID: <?php echo $this->session->userdata('idusuario') ?>
                                        <br>
                                        Estos datos no serán visibles en el producto final.
                                    </p>-->


                                    <p>Estimado vendedor en esta sección puede ver los productos que estan disponibles, en la parte derecha puede ver el estado del stock</p>
                            
                                    <table id="datatable-buttons" class="table table-primary table-striped " style="width:100%">
                                        <thead>
                                            <tr class="text-center table-danger text-dark">
                                            <th>Foto</th>
                                            <th>Codigo</th>
                                            <th>descripcion</th>
                                                <th>Unidades por caja </th>
                                                <th>Cajas</th>
                                                <th>Precio Ch</th>
                                                <th>Precio venta</th>
                                                
                                                <th>Stock</th>
                                                
                                                <th>estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($producto->result() as $row) {
                                            ?>
                                                <tr>
                                                    <td class="text-center">
                                                        <?php

                                                        $foto = $row->foto;
                                                        if (!$foto) {
                                                        ?>
                                                            <img src="<?php echo  base_url(); ?>uploads/products_images/c" width="150" height="150">
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <img src="<?php echo base_url(); ?>uploads/products_images/<?php echo $foto; ?>" width="150" height="150">
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td style="text-align: center; vertical-align: middle; "><?php echo $row->codigo; ?></td>
                                                    <td style="text-align: center; vertical-align: middle; "><?php echo $row->nombreProducto; ?></td>
                                                    <td style="text-align: center; vertical-align: middle; "><?php echo $row->numeroCategoria; ?></td>
                                                    <td style="text-align: center; vertical-align: middle; "><?php echo $row->cajas; ?></td>
                                                    <th  style="text-align: center; vertical-align: middle; "><?php echo $row->descripcion; ?></th>
                                                    <td style="text-align: center; vertical-align: middle; "><?php echo $row->precio; ?></td>
                                                    
                                                    <td  style="text-align: center; vertical-align: middle; "><?php

                                                        ?>
                                                        <?php
                                                        if ($row->stock <= 100) {
                                                            echo "<font color=\"red\">$row->stock</font>";
                                                        } else {
                                                            echo "<font color=\"green\"> $row->stock</font>";
                                                        }
                                                        ?>
                                                    </td>
                                                    


                                                    <th  style="text-align: center; vertical-align: middle; ">
                                                        <?php
                                                         if ($row->stock >= 0.1 && $row->cajas <= 1) {
                                                            echo "<font color=\"orange\"><span class=\"spinner-grow\"></span><marquee scrollamount=\"30\" scrolldelay=\"1000\" loop=\"50\">Stock por agotarse</marquee></font>";
                                                        } else if ($row->cajas == 0) {
                                                            echo "<font color=\"red\"><span>  Stock agotado</marquee></font>";
                                                        } else if ($row->cajas >= 1) {
                                                            echo "<font color=\"green\"><span class=\"spinner-grow\"></span><marquee scrollamount=\"30\" scrolldelay=\"500\" loop=\"100\">Stock óptimo</marquee></font>";
                                                        }
                                                        ?>

                                                    </th>

                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <div class="col-md-12 col-sm-12">
                                        <div class="col-md"><br>
                                            <?php
                                            echo form_open_multipart('venta/vistaAgregarVenta');
                                            ?>
                                            <button type="submit" class="col-md btn btn-round  btn-success">
                                                <i class="fa fa-plus-circle"></i> Registrar Venta
                                            </button>
                                            <?php
                                            echo form_close();
                                            ?>
                                        </div>
                                    </div>
                            </div><!-- Fin Div col-sm-12 2 -->
                        </div><!-- Fin Div row 2 -->
                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->