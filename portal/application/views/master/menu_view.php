<!-- Lower Header -->
<div id="lower-header">

    <div class="container">

        <div id="menu-button">
            <div>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <span>Menu</span>
        </div>

        <ul id="navigation">

            <!-- Home -->
            <li class="home-button <?php if($menu_home == 'home') {  echo "current-menu-item"; } ?>">
                <a href="<?php echo URL_MAIN ?>"><i class="icons icon-home"></i></a>
            </li>
            <!-- /Home -->

            <!-- Canchas -->
            <li class="<?php if($menu_home == 'canchas') {  echo "current-menu-item"; } ?>">
                <a href="<?php echo URL_MAIN ?>canchas">Canchas</a>
            </li>
            <!-- /Canchas -->

            <!-- Academias -->
            <li>
                <a href="<?php echo URL_MAIN ?>">Academias</a>
            </li>
            <!-- /Academias -->

            <!-- Gimnasios -->
            <li>
                <a href="<?php echo URL_MAIN ?>">Gimnasios</a>
            </li>
            <!-- /Gimnasios -->

            <!-- Campeonatos -->
            <li >
                <a href="#">Campeonatos</a>
            </li>
            <!-- /Campeonatos -->

            <!-- Contactenos -->
            <li class="<?php if($menu_home == 'contacto') {  echo "current-menu-item"; } ?>">
                <a href="<?php echo URL_MAIN; ?>contactenos">Cont&aacute;ctenos</a>
            </li>
            <!-- /Contactenos -->

            <!-- Registro de Usuarios -->
            <li class="registro-button ">
                <?php 
                if ($this->session->userdata("Nombres") == "") {?>
                <a class="fancybox media-icon" href="#inline1"><i class="icons icon-users"></i> Registro de Usuarios</a>
<!--                <a class="fancybox media-icon" href="<?php echo URL_MAIN; ?>registro_usuarios?iframe=true&width=800&height=950"><i class="icons icon-users"></i> Registro de Usuarios</a>-->
                <?php }else {?>

                <a class="fancybox media-icon" href="<?php echo URL_INTRANET; ?>"><i class="icons icon-login"></i> Ir al Panel</a>

                <?php }?>

            </li>
            <!-- /Registro de Usuarios -->

        </ul>
    </div>
</div>
<!-- /Lower Header -->