<div class="right_col" role="main">
    <!-- Inicio Div Right Col Role Main -->
    <div class="container md-3">
        <!-- Inicio Div container md-3 -->
        <div class="row">
            <!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 ">
                <!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel bg-dark text-white">
                    <!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2>Actualizar datos del producto.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content">
                        <!-- Inicio Div x_content -->


                        <?php
                        echo form_open_multipart('producto/index');
                        ?>
                        <button type="submit" name="buttonInhabilitados" class="btn btn-outline-success">
                            <i class="fa fa-arrow-circle-left"></i> Volver a producto
                        </button>
                        <?php
                        echo form_close();
                        ?>
                        <br>
                        <p class="text-muted font-13 m-b-30">
                            Usted está por editar un producto, por favor llene el siguiente campo:
                        </p>
                        <?php
                        foreach ($infoproducto->result() as $row) {
                            echo form_open_multipart('producto/modificarbd');
                        ?>


                            <input type="hidden" name="idproducto" value="<?php echo $row->idProducto; ?>">
                            <br>
                            <div class="item form-group has-feedback">

                                <label class="col-form-label col-md-1 label-align" for="marca">Nombre:</label>
                                <div class="col-md">
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row->nombreProducto; ?>">
                                </div>
                            </div>
                            <div class="item form-group has-feedback">
                                <label class="col-form-label col-md-1 label-align" for="marca">Marca:</label>
                                <div class="col-md">
                                    <select class="form-control" name="idmarca">
                                        <option value="<?php echo $row->idMarca; ?>">
                                            <?php echo $row->numeroTienda; ?>
                                        </option>
                                        <?php
                                        $marca = $this->db->query(
                                            "SELECT idMarca, numeroTienda FROM marca WHERE estado=1"
                                        );
                                        foreach ($marca->result() as $rowMarca) {
                                        ?>
                                            <option value="<?php echo $rowMarca->idMarca; ?>">
                                                <?php echo $rowMarca->numeroTienda; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>

                                <label class="col-form-label col-md-1 label-align" for="idcategoria">Categoría:</label>
                                <div class="col-md">
                                    <select class="form-control" name="idcategoria">
                                        <option value="<?php echo $row->idCategoria; ?>">
                                            <?php echo $row->numeroCategoria; ?>
                                        </option>
                                        <?php
                                        $categoria = $this->db->query(
                                            "SELECT idCategoria, numeroCategoria FROM categoria WHERE estado=1"
                                        );
                                        foreach ($categoria->result() as $rowCategoria) {
                                        ?>
                                            <option value="<?php echo $rowCategoria->idCategoria; ?>">
                                                <?php echo $rowCategoria->numeroCategoria; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="item form-group has-feedback">
                                
                                <label class="col-form-label col-md-1 label-align" for="codigo">codigo:</label>
                                <div class="col-md">
                                    <input type="text" name="codigo" placeholder="codigo" value="<?php echo $row->codigo; ?>" class="form-control has-feedback-left">
                                    <span class="fa fa-paint-brush form-control-feedback left" aria-hidden="true"></span>
                                </div>
                                <label class="col-form-label col-md-1 label-align" for="stock">Stock:</label>
                                <div class="col-md">
                                    <input type="number"  name="stock" placeholder="Stock" value="<?php echo $row->stock; ?>" class="form-control has-feedback-left">
                                    <span class="fa fa-cubes form-control-feedback left" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-1 label-align" for="descripcion">PrecioCh.:</label>
                                <div class="col-md">
                                    <input type="number"  name="descripcion" class="form-control has-feedback-left" value="<?php echo $row->descripcion; ?>">
                                    <span class="fa fa-cube form-control-feedback left" aria-hidden="true"></span>
                                    <?php echo form_error('descripcion'); ?>
                                </div>
                                <label class="col-form-label col-md-1 label-align" for="precio">Precio:</label>
                                <div class="col-md">
                                    <input type="number"  name="precio" placeholder="Precio" value="<?php echo $row->precio; ?>" class="form-control has-feedback-left">
                                    <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="item form-group has-feedback">

                                
                                    <label class="col-form-label col-md-1 label-align">Imagen</label>
                                        <div class="col-md">
                                            <input type="file" class="form-control" name="archivoImagen" id="archivoImagen" onchange='readURL(this);' />
                                        </div>
                         
                                <div class="col-md">
                                    <?php
                                    if ($row->foto) {
                                    ?>
                                        <img id="blah" width="200" height="170" src="<?php echo  base_url(); ?>uploads/products_images/<?php echo $row->foto ?>" alt="producto" class="img-fluid" />
                                        <input type="text" hidden class="form-control" name="nombreimagen" id="nombreimagen" value="<?php echo $row->foto ?>"/>
                                      

                                    <?php
                                    } else {
                                    ?>
                                        <img id="blah" width="200" height="170" src="<?php echo  base_url(); ?>uploads/products_images/sinImagen.jpg" alt="Producto" class="img-fluid" />
                                      

                                    <?php } ?>
                                </div>
                            </div>
                    </div>



                    <button type="button" class="btn btn-warning text-dark" data-toggle="modal" data-target="#modalConfirmacion">
                        <i class="fa fa-edit"></i> Modificar
                    </button>

                </div><!-- Fin Div x_content -->
            </div><!-- Fin Div x_panel -->
        </div><!-- Fin Div col-md-12 col-sm-12  -->
    </div><!-- Fin Div row -->
</div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->




<!-- Modal -->
<div class="modal fade" id="modalConfirmacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content  alert alert-warning  ">
            <div class="modal-content  alert-secondary">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Confirmación Edición</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Estás seguro de editarlo?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </div>
        </div>
    </div>

<?php
                            form_close();
                        }
?>




<script>
   function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(300)
                    .height(170);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>