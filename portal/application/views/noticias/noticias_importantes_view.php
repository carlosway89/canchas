<div class="owl-carousel-container">
    <div class="owl-header">
        <div class="side-segment">
            <h3 class="animate-onscroll">
                <i class="icons icon-news"></i> Noticias importantes
            </h3>
        </div>

        <div class="carousel-arrows animate-onscroll">
            <span class="left-arrow"><i class="icons icon-left-dir"></i></span>
            <span class="right-arrow"><i class="icons icon-right-dir"></i></span>
        </div>
    </div>

    <div class="owl-carousel" data-max-items="3">

        <?php foreach ($list_noticias as $list_noticias) { ?>
            <!-- Owl Item -->
            <div>
                <!-- Blog Post -->
                <div class="blog-post animate-onscroll">
                    <!-- Event Item -->
                    <div class="event-item">

                        <?php
                        $titulo_noticia = replace_caracteres_raros($list_noticias->cInfoTitulo);
                        ?>
                        <div class="event-image">
                            <a href="<?php echo URL_MAIN; ?>noticias/detalle/noticia_<?php echo $list_noticias->nInfoID; ?>">
                                <img src="<?php echo $list_noticias->foto_noticia; ?>" alt="solocanchas.com">
                            </a>
                        </div>

                        <div class="event-info">
                            <?php
                            $cadena_fecha1 = explode("/", $list_noticias->dInfoFechaRegistro);
                            $nombre_mes1 = toNameMonthAbreviatura($cadena_fecha1[1]);
                            $nro_dia1 = $cadena_fecha1[0];
                            ?>
                            <div class="date">
                                <span>
                                    <span class="day"><?php echo $nro_dia1; ?></span>
                                    <span class="month"><?php echo $nombre_mes1; ?></span>
                                </span>
                            </div>

                            <div class="event-content">
                                <h6>
                                    <a href="<?php echo URL_MAIN; ?>noticias/detalle/noticia_<?php echo $list_noticias->nInfoID; ?>">
                                        <?php echo $list_noticias->cInfoTitulo; ?>
                                    </a>
                                </h6>
                                <ul class="event-meta">
                                    <li><i class="icons icon-location"></i> <?=$list_noticias->cInfoLugar;?></li>
                                </ul>
                            </div>

                        </div>

                    </div>
                    <!-- /Event Item -->
                </div>
                <!-- /Blog Post -->
            </div>
            <!-- /Owl Item -->
        <?php } ?>

    </div>
</div>