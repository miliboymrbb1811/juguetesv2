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
                        <h2>Insertar nuevo usuarios.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content">
                        <!-- Inicio Div x_content -->
                        <?php
                        echo form_open_multipart('usuarios/inicio');
                        ?>
                        <button type="submit" name="buttonInhabilitados" class="btn btn-outline-success">
                            <i class="fa fa-arrow-circle-left"></i> Volver a usuarios.
                        </button>
                        <?php
                        echo form_close();
                        ?>
                        <p class="text-muted font-13 m-b-30">
                            usted registrar un nuevo usuario en el sistema
                        </p>
                        <?php
                        echo form_open_multipart('usuarios/agregarbd');
                        ?>
                        <div class="item form-group has-feedback">
                            <label class="col-form-label col-md-1 label-align" for="usuarios">Empleado:</label>
                            <div class="col-md-3">
                                <select class="form-control" name="idempleado">
                                    <?php
                                    $empleado = $this->db->query(
                                        "  SELECT idEmpleado, persona.nombre, persona.primerApellido, persona.segundoApellido ,empleado.estado
                                        FROM empleado
                                        join persona on persona.idPersona=empleado.idPersona
                                         WHERE empleado.estado=1"
                                    );
                                    foreach ($empleado->result() as $row) {
                                    ?>
                                        <option value="<?php echo $row->idEmpleado; ?>"><?php echo $row->nombre; ?> <?php echo $row->primerApellido; ?> <?php echo $row->segundoApellido; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <div class="col-md-3">
                                </div>
                            </div>
                            <label class="col-form-label col-md-1 label-align" for="login">Login:</label>
                            <div class="col-md-3">
                                <input type="text" name="login" class="form-control has-feedback-left" value="<?php echo set_value('login'); ?>">
                                <span class="fa fa-sign-in form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('login');
                                if ($msg == '1') { ?>
                                    <p id="validar"> (*) este nombre de usuario ya esta en uso porfavor use otro </p>
                                <?php } ?>
                            </div>

                        </div>
                        <div class="item form-group has-feedback">
                            <label class="col-form-label col-md-1 label-align" for="login">Tipo:</label>
                            <div class="col-md-3">
                                <select class="form-control" name="tipo">
                                    <option value="admin">
                                        Administrador
                                    </option>
                                    <option value="vendedor">
                                        Vendedor
                                    </option>
                                </select>
                            </div>
                            <label class="col-form-label col-md-1 label-align" for="password">Contraseña:</label>
                            <div class="col-md-3">
                                <input type="text" name="password" class="form-control has-feedback-left" value="<?php echo set_value('password'); ?>">
                                <span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="item form-group has-feedback">
                        <br>
                        
                            <label class="col-form-label col-md-1 label-align">Imagen</label>
                            <div class="col-md">
                            <br>
                            <br>
                            <br>
                            <br>
                                <input type="file" class="form-control" name="archivoImagen" id="archivoImagen" onchange='readURL(this);' />
                            </div>
                            <div class="col-md" >
                                <img id="bla" width="200" height="170" src="<?php echo  base_url(); ?>uploads/user_images/sinImagen.jpg" alt="">
                            </div>
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
                $('#bla')
                    .attr('src', e.target.result)
                    .width(300)
                    .height(170);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>