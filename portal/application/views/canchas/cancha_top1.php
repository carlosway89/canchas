<div class="side-segment">
            <h3 class="animate-onscroll">
                <i class="icons icon-star"></i> Cancha Mas Visitada
            </h3>
        </div>
<?php foreach ($cancha_top1 as $cancha_top1) { ?>
    <div class="blog-post big animate-onscroll">

        <?php $url_nombre_cancha = replace_caracteres_raros($cancha_top1->cCanNombre); ?>
        <div class="post-image">
            <img src="<?php echo $cancha_top1->cCanFotoPortada; ?>" alt="solocanchas.com">
        </div>

        <h4 class="title-capital"><a href="<?php echo URL_MAIN; ?>canchas/informacion/<?php echo $url_nombre_cancha . "_" . $cancha_top1->nCanID; ?>" target="_blank">
                <?=$cancha_top1->cCanNombre ?>
            </a>
        </h4>

        <div class="post-meta">
            <span><i class="icons icon-location"></i><span><?php echo $cancha_top1->direccion; ?></span></span>
        </div>
        <p><?=$cancha_top1->cCanDescripcion?></p>
        <p>
            <i class="icons icon-home"></i> <?php echo $cancha_top1->provincia; ?>, <?php echo $cancha_top1->departamento; ?>
        </p>
        <p>
            <i class="icons icon-phone"></i> Teléfono: <?php echo $cancha_top1->telefono; ?>
        </p>
        <p>
            <i class="icons icon-flag-1"></i> Canchas:  <?php echo $cancha_top1->nro_canchas; ?>
        </p>

        <a href="<?php echo URL_MAIN; ?>canchas/informacion/<?php echo $url_nombre_cancha . "_" . $cancha_top1->nCanID; ?>" class="button read-more-button big button-arrow" target="_blank" >
            Ver Detalles
        </a>

    </div>
<?php } ?>