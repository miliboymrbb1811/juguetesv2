<div class="right_col" role="main"><!-- Inicio Div Right Col Role Main -->
    <div class="container md-3"><!-- Inicio Div container md-3 -->
        <div class="row"><!-- Inicio Div row -->
            <div class="col-md-12 col-sm-12 "><!-- Inicio Div col-md-12 col-sm-12  -->
                <div class="x_panel bg-dark text-white"><!-- Inicio Div x_panel -->
                    <div class="x_title">
                        <h2>Actualizar categoría.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content"><!-- Inicio Div x_content -->
                        <?php 
                            echo form_open_multipart('categoria/index');
                        ?>
                            <button type="submit" name="buttonInhabilitados" class="btn btn-outline-success">
                            <i class="fa fa-arrow-circle-left"></i> Volver a categorías
                            </button>
                        <?php 
                            echo form_close();
                        ?>
                        <p class="text-muted font-13 m-b-30">
                            Usted va a editar una categoría de producto, por favor modifique el siguiente campo:
                        </p>
                        <?php            
                            foreach($infocategoria->result() as $row)
                            {
                            echo form_open_multipart('categoria/modificarbd');
                        ?>
                        <input type="hidden" name="idcategoria" value="<?php echo $row->idCategoria;?>">
                        <br>
                        <div class="item form-group has-feedback">
                            <label class="col-form-label col-md-1 label-align" for="nombrecategoria">Categoría:</label>
                            <div class="col-md-3">
                            <input type="text" name="nombrecategoria" value="<?php echo $row->numeroCategoria;?>" class="form-control has-feedback-left" required>
                            <span class="fa fa-list form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                        
                        <button type="button" class="btn btn-warning text-dark" data-toggle="modal" data-target="#modalConfirmacion">
                            <i class="fa fa-edit"></i> Modificar
                        </button><!---------------------------- llamada al boton modal  --------------------------->
                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->


<!--------------------------------------------- Modal ------------------------------------------------------>
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