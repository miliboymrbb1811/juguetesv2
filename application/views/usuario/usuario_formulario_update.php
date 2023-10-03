<div class="right_col" role="main">
    <!-- Inicio Div Right Col Role Main -->
    <div class="container md-3">
        <!-- Inicio Div container md-3 -->
        <div class="row">
            <!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 ">
                <!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel bg-dark text-white ">
                    <!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2>Actualizar empleado.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content">
                        <!-- Inicio Div x_content -->
                        <?php
                        echo form_open_multipart('usuarios/inicio');
                        ?>
                        <button type="submit" name="buttonInhabilitados" class="btn btn-outline-success">
                            <i class="fa fa-arrow-circle-left"></i> Volver a usuarios
                        </button>
                        <?php
                        echo form_close();
                        ?>
                        <p class="text-muted font-13 m-b-30">
                            Usted va a editar un usuarios, por favor modifique el siguiente campo:
                        </p>
                        <?php
                        foreach ($infousuario->result() as $row) {
                            echo form_open_multipart('usuarios/modificarbd');
                        ?>
                            <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario; ?>">
                            <br>
                            <div class="item form-group has-feedback">
                                <label class="col-form-label col-md-1 label-align" for="login">Login:</label>
                                <div class="col-md-3">
                                    <input type="text" name="login" value="<?php echo $row->login; ?>" class="form-control has-feedback-left" required>
                                    <span class="fa fa-sign-in form-control-feedback left" aria-hidden="true"></span>
                                </div>
                                <label class="col-form-label col-md-1 label-align" for="password">Nueva contraseña:</label>
                                <div class="col-md-3">
                                    <input type="text" name="password" class="form-control has-feedback-left" required>
                                    <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                                </div>

                            </div>
                            <div class="item form-group">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label col-md-1 label-align">Imagen</label>
                                        <div class="col-md">
                                            <input type="file" class="form-control" name="archivoImagen" id="archivoImagen" onchange='readURL(this);' />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <?php
                                    if ($row->foto) {
                                    ?>
                                        <img id="blah" width="200" height="170" src="<?php echo  base_url(); ?>uploads/user_images/<?php echo $row->foto ?>" alt="usuarios" class="img-fluid" />
                                        <input type="text" hidden class="form-control" name="nombreimagen" id="nombreimagen" value="<?php echo $row->foto ?>" />


                                    <?php
                                    } else {
                                    ?>
                                        <img id="blah" width="200" height="170" src="<?php echo  base_url(); ?>uploads/user_images/sinImagen.jpg" alt="Producto" class="img-fluid" />


                                    <?php } ?>
                                </div>
                            </div>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalConfirmacion">
                                <i class="fa fa-edit"></i> Modificar
                            </button>
                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->



<!--------------------------------------------------------- Modal---------------------------------------------- -->
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
                    <button type="submit" class="btn btn-warning">Editar</button>
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