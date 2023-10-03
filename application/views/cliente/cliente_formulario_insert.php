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
                        <h2>Insertar nuevo cliente.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content">
                        <!-- Inicio Div x_content -->
                        <?php
                        echo form_open_multipart('cliente/index');
                        ?>
                        <button type="submit" name="buttonInhabilitados" class="btn btn-outline-success">
                            <i class="fa fa-arrow-circle-left"></i> Volver a clientes
                        </button>
                        <?php
                        echo form_close();
                        ?>
                        <br>
                        <p class="text-muted font-13 m-b-30">
                            Usted va a insertar un nuevo cliente, por favor llene el siguiente campo:
                        </p>
                        <?php
                        echo form_open_multipart('cliente/agregarbd');
                        ?>
                        <div class="item form-group has-feedback">

                            <label class="col-form-label col-md-1 label-align" for="nombre">nombre/s:</label>
                            <div class="col-md-3">
                                <input type="text" name="nombre" class="form-control has-feedback-left" value="<?php echo set_value('nombre'); ?>">
                                <span class="fa fa-male form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('nombre'); ?>
                            </div>

                            <label class="col-form-label col-md-1 label-align" for="primerapellido">Apellido/s:</label>
                            <div class="col-md-3">
                                <input type="text" name="primerapellido" class="form-control has-feedback-left" value="<?php echo set_value('primerapellido'); ?>">
                                <span class="fa fa-male form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('primerapellido'); ?>
                            </div>

                            <label class="col-form-label col-md-1 label-align" for="segundoapellido">Departamento:</label>
                            <div class="col-md-3">
                                <input type="text" name="segundoapellido" class="form-control has-feedback-left" value="<?php echo set_value('segundoapellido'); ?>">
                                <span class="fa fa-bookmark form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('segundoapellido'); ?>
                            </div>

                        </div>

                        <div class="item form-group has-feedback">
                            <label class="col-form-label col-md-1 label-align" for="numerocelular">Nro. Celular:</label>
                            <div class="col-md-3">
                                <input type="text" name="numerocelular" class="form-control has-feedback-left" value="<?php echo set_value('numerocelular'); ?>">
                                <span class="fa fa-mobile-phone form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('numerocelular'); ?>
                            </div>
                            <label class="col-form-label col-md-1 label-align" for="numeroci">Nro. Carnet:</label>
                            <div class="col-md-3">
                                <input type="text" name="numeroci" class="form-control has-feedback-left" value="<?php echo set_value('numeroci'); ?>">
                                <span class="fa fa-list-alt form-control-feedback left" aria-hidden="true"></span>
                                <?php echo form_error('numeroci'); ?>
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