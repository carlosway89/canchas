
<?php if ($breadcrumbs == "about_us_1") { ?>
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                    <h2 class="title"><?php echo lang("idioma.menu-opcion2-sub1"); ?></h2>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                    <div class="breadcrumbs pull-right">
                        <ul>
                            <li><?php echo lang("idioma.enlace-actual"); ?>:</li>
                            <li><a href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-inicio'); ?>"><i class="icon-home icon-1x"></i></a></li>
                            <li><a href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-quienes-somos'); ?>/<?php echo lang('idioma.controlador-quienes-somos-acerca'); ?>"><?php echo lang("idioma.menu-opcion2"); ?></a></li>
                            <li><a href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-quienes-somos'); ?>/<?php echo lang('idioma.controlador-quienes-somos-acerca'); ?>"><?php echo lang("idioma.menu-opcion2-sub1"); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($breadcrumbs == "about_us_3") { ?>
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                    <h2 class="title"><?php echo lang("idioma.menu-opcion2-sub3"); ?></h2>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                    <div class="breadcrumbs pull-right">
                        <ul>
                            <li><?php echo lang("idioma.enlace-actual"); ?>:</li>
                            <li><a href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-inicio'); ?>"><i class="icon-home icon-1x"></i></a></li>
                            <li><a href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-quienes-somos'); ?>/<?php echo lang('idioma.controlador-quienes-somos-acerca'); ?>"><?php echo lang("idioma.menu-opcion2"); ?></a></li>
                            <li><a href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-quienes-somos'); ?>/<?php echo lang('idioma.controlador-quienes-somos-equipo'); ?>"><?php echo lang("idioma.menu-opcion2-sub3"); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- SECCIÓN PRODUCTOS -->
<?php if ($breadcrumbs == "products_1") { ?>
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                    <h2 class="title"><?php echo lang('idioma.breadcrumbs-title3'); ?></h2>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                    <div class="breadcrumbs pull-right">
                        <ul>
                            <li><?php echo lang("idioma.enlace-actual"); ?>:</li>
                            <li><a href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-inicio'); ?>"><i class="icon-home icon-1x"></i></a></li>
                            <li><a href="<?php echo URL_MAIN; ?><?php echo $this->uri->segment(1); ?>/products/category/<?php echo lang('idioma.productos-texto-comparar'); ?>/"><?php echo lang('idioma.menu-opcion3'); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($breadcrumbs == "products_2") { ?>
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                    <h2 class="title"><?php echo lang('idioma.breadcrumbs-title4'); ?></h2>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                    <div class="breadcrumbs pull-right">
                        <ul>
                            <li><?php echo lang("idioma.enlace-actual"); ?>:</li>
                            <li><a href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-inicio'); ?>"><i class="icon-home icon-1x"></i></a></li>
                            <?php
                            if ($this->uri->segment(1) == "es") {
                                $name_prod = $cProdNombreEs;
                            } else {
                                $name_prod = $cProdNombreEn;
                            }
                            ?>
                            <li><a href="<?php echo URL_MAIN; ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-productos'); ?>/<?php echo lang('idioma.productos-texto-comparar'); ?>/"><?php echo lang('idioma.menu-opcion3'); ?></a></li>
                            <li><a href="<?php echo URL_MAIN; ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-productos-info'); ?>/<?php echo str_replace(" ", "-", $name_prod)."_".$nProdID."_".$nCatID."_".$nSubCatID; ?>"><?php echo lang('idioma.menu-opcion3-info'); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- END -->


<?php if ($breadcrumbs == "formas_compra_1") { ?>
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                    <h2 class="title"><?php echo lang("idioma.menu-opcion4"); ?></h2>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                    <div class="breadcrumbs pull-right">
                        <ul>
                            <li><?php echo lang("idioma.enlace-actual"); ?>:</li>
                            <li><a href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-inicio'); ?>"><i class="icon-home icon-1x"></i></a></li>
                            <li><a href="<?php echo URL_MAIN; ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-formas_compra'); ?>"><?php echo lang("idioma.menu-opcion4"); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($breadcrumbs == "especial_1") { ?>
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                    <h2 class="title"><?php echo lang("idioma.menu-opcion5"); ?></h2>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                    <div class="breadcrumbs pull-right">
                        <ul>
                            <li><?php echo lang("idioma.enlace-actual"); ?>:</li>
                            <li><a href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-inicio'); ?>"><i class="icon-home icon-1x"></i></a></li>
                            <li><a href="<?php echo URL_MAIN; ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-especiales'); ?>"><?php echo lang("idioma.menu-opcion5"); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<?php if ($breadcrumbs == "contact_1") { ?>
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                    <h2 class="title"><?php echo lang('idioma.menu-opcion6'); ?></h2>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                    <div class="breadcrumbs pull-right">
                        <ul>
                            <li><?php echo lang("idioma.enlace-actual"); ?>:</li>
                            <li><a href="<?php echo URL_MAIN ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-inicio'); ?>"><i class="icon-home icon-1x"></i></a></li>
                            <li><a href="<?php echo URL_MAIN; ?><?php echo $this->uri->segment(1); ?>/<?php echo lang('idioma.controlador-contactos'); ?>"><?php echo lang('idioma.menu-opcion6'); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>