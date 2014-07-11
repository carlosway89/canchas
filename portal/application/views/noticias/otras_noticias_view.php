<div class="row related-events">

    <div class="col-lg-12 col-md-12 col-sm-12 animate-onscroll">
        <div class="side-segment">
            <h3>Otras Noticias</h3>
        </div>
    </div>

    <?php $i = 1; ?>
    <?php foreach ($list_noticias as $list_noticias) { ?>
        <div class="col-lg-4 col-md-4 col-sm-4 animate-onscroll">

            <!-- Event Item -->
                    <div class="event-item">

                        <div class="event-image">
                            <a target="_blank" href="<?php echo URL_MAIN; ?>noticias/detalle/<?php echo str_replace(" ", "-", $list_noticias->cInfoTitulo); ?>_<?php echo $list_noticias->nInfoID; ?>">
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
                                    <a target="_blank" href="<?php echo URL_MAIN; ?>noticias/detalle/<?php echo str_replace(" ", "-", $list_noticias->cInfoTitulo); ?>_<?php echo $list_noticias->nInfoID; ?>">
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

        <?php $i++; ?>
    <?php } ?>

</div>