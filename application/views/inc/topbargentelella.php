        </div>
        <!-- /menu footer buttons -->
        </div>
        </div>

        <div id="fondo" class="top_nav">
          <div id="fondo"  class="nav_menu">
            <div    class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>
            <nav   class="nav navbar-nav ">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="<?php echo base_url(); ?>gentelella/javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                <font color="red"  >  <?php echo $this->session->userdata('login') ?> </font>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
               
                    <?php
                    echo form_open_multipart('usuarios/logout');
                    ?>
                    <button class="btn btn-danger col-md-11" type="submit"><i class="fa fa-sign-out pull-right"></i>Cerrar Sesión</button>
                    <?php
                    echo form_close();
                    ?>
                  </div>
                </li>

                <li role="presentation" class="nav-item dropdown open">
                

              </ul>
            </nav>
          </div>
        </div>
        </div>