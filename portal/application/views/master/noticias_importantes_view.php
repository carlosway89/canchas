<div class="owl-carousel-container">
    <div class="owl-header">
        <div class="side-segment">
            <h3 class="animate-onscroll">
                <i class="icons icon-star"></i> Noticias importantes
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
                        $validacion_array = Array(',', '"', '(', ')', '&', '/', "'", '%');
                        $titulo_noticia = str_replace($validacion_array, "", str_replace(" ", "-", $list_noticias->cInfoTitulo));
                        ?>
                        <div class="event-image">
                            <a target="_blank" href="<?php echo URL_MAIN; ?>noticias/detalle/<?php echo $titulo_noticia; ?>_<?php echo $list_noticias->nInfoID; ?>">
                                <img src="<?php echo URL_IMG; ?>noticias/<?php echo $list_noticias->foto_noticia; ?>" alt="">
                            </a>
                        </div>

                        <div class="event-info">

                            <div class="date">
                                <span>
                                    <span class="day">25</span>
                                    <span class="month">DEC</span>
                                </span>
                            </div>

                            <div class="event-content">
                                <h6>
                                    <a target="_blank" href="<?php echo URL_MAIN; ?>noticias/detalle/<?php echo $titulo_noticia; ?>_<?php echo $list_noticias->nInfoID; ?>">
                                        <?php echo $list_noticias->cInfoTitulo; ?>
                                    </a>
                                </h6>
                                <ul class="event-meta">
                                    <li><i class="icons icon-clock"></i> 4:00 pm - 6:00 pm</li>
                                    <li><i class="icons icon-location"></i> 340 W 50th St.New York</li>
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