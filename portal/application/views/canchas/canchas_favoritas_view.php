<div class="owl-carousel-container">
    <div class="owl-header">
        <div class="side-segment">
            <h3 class="animate-onscroll">
                <i class="icons icon-star"></i> Canchas Favoritas
            </h3>
        </div>

        <div class="carousel-arrows animate-onscroll">
            <span class="left-arrow"><i class="icons icon-left-dir"></i></span>
            <span class="right-arrow"><i class="icons icon-right-dir"></i></span>
        </div>
    </div>

    <div class="owl-carousel" data-max-items="3">

        <?php foreach ($list_canchas_favoritas as $list_canchas_favoritas) { ?>
            <?php $url_nombre_cancha = replace_caracteres_raros($list_canchas_favoritas->cCanNombre); ?>
            <!-- Owl Item -->
            <div>
                <!-- Blog Post -->
                <div class="blog-post animate-onscroll">
                    <div class="post-image">
                        <a href="<?php echo URL_MAIN; ?>canchas/informacion/<?php echo $url_nombre_cancha . "_" . $list_canchas_favoritas->nCanID; ?>">
                            <img src="<?php echo $list_canchas_favoritas->cCanFotoPortada; ?>" alt="">
                        </a>
                    </div>

                    <h4 class="post-title">
                        <a href="<?php echo URL_MAIN; ?>canchas/informacion/<?php echo $url_nombre_cancha . "_" . $list_canchas_favoritas->nCanID; ?>">
                           <?php echo $list_canchas_favoritas->cCanNombre; ?>
                        </a>
                    </h4>

                    <p>
                        <i class="icons icon-location"></i> Dirección: <?php echo $list_canchas_favoritas->direccion; ?>
                    </p>
                    <p>
                        <i class="icons icon-home"></i> <?php echo $list_canchas_favoritas->provincia; ?>, <?php echo $list_canchas_favoritas->departamento; ?>
                    </p>
                    <p>
                        <i class="icons icon-phone"></i> Teléfono: <?php echo $list_canchas_favoritas->telefono; ?>
                    </p>
                    <p>
                        <i class="icons icon-flag-1"></i> Canchas:  <?php echo $list_canchas_favoritas->nro_canchas; ?>
                    </p>
                    <a href="<?php echo URL_MAIN; ?>canchas/informacion/<?php echo $url_nombre_cancha . "_" . $list_canchas_favoritas->nCanID; ?>" class="button read-more-button big button-arrow">Ver detalle</a>

                </div>
                <!-- /Blog Post -->
            </div>
            <!-- /Owl Item -->
        <?php } ?>

    </div>
</div>