<div class="side-segment">
            <h3 class="animate-onscroll">
                <i class="icons icon-star"></i> Noticia Principal
            </h3>
        </div>
<?php foreach ($noticia_principal as $noticia_principal) { ?>
    <div class="blog-post big animate-onscroll">

        <?php
        $titulo_noticia_principal = replace_caracteres_raros($noticia_principal->cInfoTitulo);
        ?>

        <div class="post-image">
            <img src="<?php echo $noticia_principal->foto_noticia; ?>" alt="solocanchas.com">
        </div>

        <h4 class="post-title"><a href="<?php echo URL_MAIN; ?>noticias/detalle/principal_<?php echo $noticia_principal->nInfoID; ?>">
                <?php echo $noticia_principal->cInfoTitulo; ?>
            </a>
        </h4>

        <div class="post-meta">
            <span>Por <a href="#"><?php echo $noticia_principal->cInfoAutor; ?></a></span>
            <span><?php echo $noticia_principal->dInfoFechaRegistro; ?></span>
        </div>

        <p><?php echo $noticia_principal->cInfoSumilla; ?></p>

        <a href="<?php echo URL_MAIN; ?>noticias/detalle/principal_<?php echo $noticia_principal->nInfoID; ?>" class="button read-more-button big button-arrow">
            Leer más
        </a>

    </div>
<?php } ?>