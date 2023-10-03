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
                        <h2>Actualizar nueva Venta.</h2>
                        <div class="clearfix">
                        </div>
                    </div>
                    <div class="x_content">
                        <!-- Inicio Div x_content -->
                        <?php
                        echo form_open_multipart('venta/index');
                        ?>
                        <button type="submit" name="buttonInhabilitados" class="btn btn-outline-success">
                            <i class="fa fa-arrow-circle-left"></i> Volver a lista de ventas
                        </button>
                        <?php
                        echo form_close();
                        ?>
                        <br>
                        <p class="text-muted font-13 m-b-30">
                            Usted va a Actualizar una nueva venta, por favor llene el siguiente campo:
                        </p>
                        <?php            
                            
                            echo form_open_multipart('venta/modificarVenta');

                            foreach($venta->result() as $row )
                            {
                        ?>
                        <?php
                        echo form_open_multipart('venta/insertVenta');
                        ?>
                        <div class="item form-group has-feedback">

                            <label class="col-form-label col-md-1 label-align" for="nombre">Nombre Cliente:</label>
                            <div class="col-md-3">
                                <input type="search" class="form-control" value="<?php echo $row->nombre;?>" name="nombre" id="nombre" placeholder="Escriba algun nombre" />
                                <div id="suggestions">
                                    <ul id="autoSuggestionsList"></ul>
                                </div>

                            </div>

                            <label class="col-form-label col-md-1 label-align" for="primerapellido">Apellidos:</label>

                            <div class="col-md-3">
                                <input id="apellidos" disabled class="form-control" value="<?php echo $row->primerApellido;?>"></input>
                                <?php echo form_error('Categoria'); ?>
                            </div>

                            <label class="col-form-label col-md-1 label-align" for="Cantidad">Carnet Identidad:</label>
                            <div class="col-md-3">
                                <input name="carnet" disabled id="carnet" class="form-control" value="<?php echo $row->numeroCI;?>"></input>
                            </div>
                            <input  hidden  name="idclient" id="idclient" value="<?php echo $row->idCliente;?>">
                            <input  hidden name="idUsuario" id="idUsuario" value="0">

                        </div>

                        <div class="item form-group has-feedback">

                            <label class="col-form-label col-md-1 label-align" for="nombre">Nombre Producto:</label>
                            <div class="col-md-3">
                                <input type="search" class="form-control" value="<?php echo $row->nombreProducto;?>" name="producto" id="producto" placeholder="Escriba nombre del producto" />
                            <input type="hidden" name="producto1" id="producto1" value="">

                            </div>

                            <label class="col-form-label col-md-1 label-align" >Marca:</label>

                            <div class="col-md-3">
                                <input type="text" disabled  class="form-control" value="<?php echo $row->numeroTienda;?>" name="marca" id="marca" placeholder="Escriba alguna marca" />
                            <input type="hidden" name="marca1" id="marca1" value="">

                            </div>

                            <label class="col-form-label col-md-1 label-align" for="Cantidad">Precio Unitario:</label>
                            <div class="col-md-3">
                                <input name="precioU" disabled id="precioU" class="form-control" value="<?php echo $row->precio;?>"></input>
                                <input type="hidden" name="precioU1" id="precioU1" value="0">

                            </div>
                            <input type="hidden" name="idProducto" id="idProducto" value="0">
                            <input type="hidden" name="idVenta" id="idVenta" value="<?php echo $row->idVenta;?>">
                        </div>


                        <div class="item form-group has-feedback">
                            <label class="col-form-label col-md-1 label-align" for="numerocelular">Cantidad:</label>
                            <div class="col-md-3">
                                <input type="number" id="cantidad" value="<?php echo $row->cantidad;?>"  name="cantidad" class="form-control" placeholder="0">
                                <?php echo form_error('numerocelular'); ?>
                            </div>
                            <label class="col-form-label col-md-1 label-align">Total:</label>
                            <div class="col-md-3">
                                <input type="number" disabled name="totalPrecio" value="<?php echo $row->precioTotal;?>" id="totalPrecio" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-plus-circle"></i> Actualizar
                        </button>
                        <?php
                            }
                        echo form_close();
                        ?>
                    </div><!-- Fin Div x_content -->
                </div><!-- Fin Div x_panel -->
            </div><!-- Fin Div col-md-12 col-sm-12  -->
        </div><!-- Fin Div row -->
    </div><!-- Fin Div container md-3 -->
</div><!-- Fin Right Col Role Main -->

<!-- ✅ Load CSS file for jQuery ui  -->
<link href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />

<!-- ✅ load jQuery ✅ -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- ✅ load jQuery UI ✅ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>

    $("#producto").autocomplete({
        source: function(request, response) {
            // Fetch data
            $.ajax({
                url: "<?= base_url() ?>index.php/venta/productList",
                type: 'post',
                dataType: "json",
                data: {
                    search: request.term
                },
                success: function(data) {
                    console.log(data);
                    response(data);
                }
            });
        },
        select: function(event, ui) {
            // Set selection
            
            // $("#producto").attr('value', ui.item.nombre);
            // $("#marca").attr('value', ui.item.marca);
            // $("#categoria").attr('value', ui.item.categoria);
            // $("#precioU").attr('value', ui.item.precioUnitario);
            // $("#idProducto").attr('value', ui.item.idProducto);

            $('#producto').val(ui.item.nombre); // display the selected text
            $('#marca').val(ui.item.marca); // display the selected text
            $('#precioU').val(ui.item.precioUnitario); // save selected id to input
            $('#idProducto').val(ui.item.idProducto); // save selected id to input


            return false;
        }
    });


  $("#nombre").autocomplete({
        source: function(request, response) {
            // Fetch data
            $.ajax({
                url: "<?= base_url() ?>index.php/venta/clientList",
                type: 'post',
                dataType: "json",
                data: {
                    search: request.term
                },
                success: function(data) {
                    console.log(data);
                    response(data);
                }
            });
        },
        select: function(event, ui) {
            // Set selection
            $('#nombre').val(ui.item.value); // display the selected text
            $('#apellidos').val(ui.item.primerApellido + ' ' + ui.item.segundoApellido ); // save selected id to input
            $('#carnet').val(ui.item.carnet); // save selected id to input
            $('#idclient').val(ui.item.idPersona); // save selected id to input
            return false;
        }
    });  


    

$(document).ready(function(){
	$("#cantidad").keyup(function(event){
         const totalT = $("#precioU").val() * $("#cantidad").val();
        $("#totalPrecio").attr('value', totalT);
	}); 
});



const search = document.getElementById('nombre');
const apellidos = document.getElementById('apellidos');
const carnet = document.getElementById('carnet');

search.addEventListener('input', evt => {
    if(!evt.inputType && search.value === ''){
        apellidos.value = 'Sin apellidos';
        carnet.value = 'Sin carnet Identidad';
  }
});


 
const search2 = document.getElementById('producto');
const marca = document.getElementById('marca');
const precioU = document.getElementById('precioU');

search2.addEventListener('input', evt => {
    if(!evt.inputType && search2.value === ''){
         marca.value = 'Sin marca';
         precioU.value = 'Sin precio Unitario';
  }
});
</script>