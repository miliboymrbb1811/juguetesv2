<div class="login_wrapper" >
  <div class="animate form login_form ">
    <section class="login_content" id="superior">

      <?php
      echo form_open_multipart('Usuarios/validar', array('id' => 'form1', 'class' => 'from-control'));
      ?>
      <div id="aw" class="container md-2">
        <div id="identified1" class="card-body">
          <h1>Iniciar Sesión</h1>
          <div class="content-center">
           <img class="img-fluid rounded" src="<?php echo base_url() ?>img/logo.png">

          </div>
          <?php
          switch ($msg) {
            case '1':
              $mensaje = "Gracias por usar el sistema";
              break;
            case '2':
              $mensaje = "Usuario o contraseña inválida";
              break;
            case '3':
              $mensaje = "Acceso no válido, inicie cesión ";
              break;
            default:
              $mensaje = "  ";
              break;
          }
          ?>
          <h1 class="text-danger"><?php echo $mensaje; ?></h1>
          <br>
          <div class="col-md-12 form-group has-feedback-left">
            <input type="text" class="form-control has-feedback-left" name="login" placeholder="Ingrese su usuarios" value="milivoy" required>
            <span class="fa fa-user form-control-feedback left" aria-hidden="true">
            </span>
          </div>
          <div class="col-md-10 form-group has-feedback-left">
          
              <span class="fa fa-key form-control-feedback left" aria-hidden="true">
              </span>
              <input id="Password" type="password" class="form-control has-feedback-left" name="password" value="admin" placeholder="Ingrese su contraseña" required>
          
          </div>
       
            <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
         


          <div>
            <button class="col btn btn-success" type="submit">
              <i class="fa fa-sign-in"></i> Ingresar
            </button>
          </div>
          <div class="clearfix"></div>
          <div class="separator">
            <div class="clearfix"></div>
            <div>
              <p>©2023 todos los derechos reservados.  SISmrbb by Milivoy-79958584.</p>
            </div>
          </div>
          <?php
          echo form_close();
          ?>
        </div>
      </div>
    </section>
  </div>
</div>