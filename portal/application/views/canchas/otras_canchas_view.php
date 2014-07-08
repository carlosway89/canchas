<div class="row related-events">

    <div class="col-lg-12 col-md-12 col-sm-12 animate-onscroll">
        <div class="side-segment">
            <h3>Otras Canchas</h3>
        </div>
    </div>

    <?php $i = 1; ?>
    <?php foreach ($list_otrascanchas as $list_otrascanchas) { ?>
        <?php
        if ($i == 1) {
            $img_cancha = 'img-demo3.jpg';
        } else if ($i == 2) {
            $img_cancha = 'img-demo4.jpg';
        } else if ($i == 3) {
            $img_cancha = 'img-demo5.jpg';
        }
        ?>
        <div class="col-lg-4 col-md-4 col-sm-4 animate-onscroll">

            <!-- Event Item -->
            <div class="event-item">
                <div class="event-image">
                    <div class="media-item gallery-item no-margin-bottom">
                        <img src="<?php echo URL_IMG; ?><?php echo $img_cancha; ?>" alt="">
                        <div class="media-hover">
                            <div class="media-icons">
                                <a class="jackbox media-icon" data-group="media-jackbox" href="<?php echo URL_IMG; ?><?php echo $img_cancha; ?>"><i class="icons icon-eye"></i></a>
                                <a class="media-icon" href="<?php echo URL_MAIN; ?>canchas/informacion/<?php echo str_replace(" ", "-", $list_otrascanchas->cCanNombre) . "_" . $list_otrascanchas->nCanID; ?>"><i class="icons icon-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="event-info">
                    <div class="event-content">
                        <h6><a href="<?php echo URL_MAIN; ?>canchas/informacion/<?php echo str_replace(" ", "-", $list_otrascanchas->cCanNombre) . "_" . $list_otrascanchas->nCanID; ?>"><?php echo $list_otrascanchas->cCanNombre; ?></a></h6>
                        <ul class="event-meta">
                            <li><i class="icons icon-clock"></i> <?php echo $list_otrascanchas->direccion; ?></li>
                            <li><i class="icons icon-home"></i> <?php echo $list_otrascanchas->distrito; ?>, <?php echo $list_otrascanchas->departamento; ?></li>
                            <li><i class="icons icon-phone"></i> <?php echo $list_otrascanchas->direccion; ?></li>
                            <li><i class="icons icon-flag-1"></i> <?php echo $list_otrascanchas->direccion; ?></li>
                        </ul>
                    </div>
                </div>

            </div>
            <!-- /Event Item -->

        </div>

        <?php $i++; ?>
    <?php } ?>

</div>