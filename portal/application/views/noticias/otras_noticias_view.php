<div class="row related-events">

    <div class="col-lg-12 col-md-12 col-sm-12 animate-onscroll">
        <div class="side-segment">
            <h3>Otras Noticias</h3>
        </div>
    </div>

    <?php $i = 1; ?>
    <?php foreach ($list_otrasnoticias as $list_otrasnoticias) { ?>
        <div class="col-lg-4 col-md-4 col-sm-4 animate-onscroll">

            <!-- Event Item -->
            <div class="event-item">
                <?php
                $titulo_noticia = replace_caracteres_raros($list_otrasnoticias->cInfoTitulo);
                ?>
                <div class="event-image">
                    <a href="<?php echo URL_MAIN; ?>noticias/detalle/<?php echo $titulo_noticia; ?>_<?php echo $list_otrasnoticias->nInfoID; ?>">
                        <img src="<?php echo $list_otrasnoticias->foto_noticia; ?>" alt="">
                    </a>
                </div>

                <div class="event-info">
                    <?php
                    $cadena_fecha2 = explode("/", $list_otrasnoticias->dInfoFechaRegistro);
                    $nombre_mes2 = toNameMonthAbreviatura($cadena_fecha2[1]);
                    $nro_dia2 = $cadena_fecha2[0];
                    ?>
                    <div class="date">
                        <span>
                            <span class="day"><?php echo $nombre_mes2 ?></span>
                            <span class="month"><?php echo $nro_dia2; ?></span>
                        </span>
                    </div>

                    <div class="event-content">
                        <h6>
                            <a href="<?php echo URL_MAIN; ?>noticias/detalle/<?php echo $titulo_noticia; ?>_<?php echo $list_otrasnoticias->nInfoID; ?>">
                                <?php echo $list_otrasnoticias->cInfoTitulo; ?>
                            </a>
                        </h6>
                        <ul class="event-meta">
                            <li><i class="icons icon-location"></i> <?=$list_otrasnoticias->cInfoLugar;?></li>
                        </ul>
                    </div>

                </div>

            </div>
            <!-- /Event Item -->

        </div>

        <?php $i++; ?>
    <?php } ?>

</div>