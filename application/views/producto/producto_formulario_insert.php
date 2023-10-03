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
                        <h2>Insertar nuevo producto.</h2>
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
                            Usted va a insertar un nuevo producto, por favor llene el siguiente campo:
                        </p>
                        <?php
                        echo form_open_multipart('producto/agregarbd');
                        ?>
                        <div class="item form-group has-feedback">

                            <label class="col-form-label col-md-1 label-align" for="marca">Nombre:</label>
                            <div class="col-md">
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo set_value('nombre'); ?>">

                                 
                            </div>
                        </div>
                        <div class="item form-group has-feedback">

                            <label class="col-form-label col-md-1 label-align" for="marca">Marca:</label>
                            <div class="col-md">
                                <select class="form-control" name="idmarca">
                                    <?php
                                    $marca = $this->db->query(
                                        "SELECT idMarca, numeroTienda FROM marca WHERE estado=1"
                                    );
                                    foreach ($marca->result() as $row) {
                                    ?>
                                        <option value="<?php echo $row->idMarca; ?>">
                                            <?php echo $row->numeroTienda; ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <label class="col-form-label col-md-1 label-align" for="idcategoria">Categoría:</label>
                            <div class="col-md">
                                <select class="form-control" name="idcategoria">
                                    <?php
                                    $categoria = $this->db->query("SELECT idCategoria, numeroCategoria FROM categoria WHERE estado=1");
                                    foreach ($categoria->result() as $row) {
                                    ?>
                                        <option value="<?php echo $row->idCategoria; ?>">
                                            <?php echo $row->numeroCategoria; ?>
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
                                <input type="text" name="codigo" class="form-control has-feedback-left" value="<?php echo set_value('codigo'); ?>">
                                <span class="fa fa-paint-brush form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('codigo'); ?>
                            </div>
                            <label class="col-form-label col-md-1 label-align" for="stock">Stock:</label>
                            <div class="col-md">
                                <input type="number" name="stock" class="form-control has-feedback-left" value="<?php echo set_value('stock'); ?>">
                                <span class="fa fa-cubes form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('stock'); ?>
                            </div>
                        </div>
                        <div>
                            <div class="item form-group">
                            <label class="col-form-label col-md-1 label-align" for="descripcion">Precio Ch.:</label>
                                <div class="col-md">
                                    <input type="number"  name="descripcion" class="form-control has-feedback-left" value="<?php echo set_value('descripcion'); ?>">
                                    <span class="fa fa-cube form-control-feedback left" aria-hidden="true"></span>
                                    <?php echo form_error('descripcion'); ?>
                                </div>
                            <label class="col-form-label col-md-1 label-align" for="precio">Precio:</label>
                            <div class="col-md">
                                <input type="number"  name="precio" class="form-control has-feedback-left" value="<?php echo set_value('precio'); ?>">
                                <span class="fa fa-money form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('precio'); ?>
                            </div>
                               
                            </div>
                        </div>
                        <div class="item form-group has-feedback">

                           
                                    <label class="col-form-label col-md-1 label-align">Imagen</label>
                                <div class="col-md">
                                    <input type="file"  class="form-control" name="archivoImagen" id="archivoImagen"  onchange='readURL(this);'/>
                                </div>
                           
                            <div class="col-md">
                                <img id="blah" width="200" height="170" src="<?php echo  base_url(); ?>uploads/products_images/sinImagen.jpg" alt="">
                            </div>

                          
                        </div>


                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-plus-circle"></i> Insertar
                        </button>
                        <?php
                        echo form_close();
                        ?>
                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->


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