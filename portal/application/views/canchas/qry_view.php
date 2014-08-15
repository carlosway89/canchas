<section id="content">	

    <!-- Page Heading -->
    <section class="section page-heading animate-onscroll">

        <h1>Búsqueda de Canchas</h1>
        <p class="breadcrumb"><a href="<?php echo URL_MAIN; ?>">Inicio</a> / Búsqueda de Canchas</p>

    </section>
    <!-- Page Heading -->

    <!-- Section -->
    <section class="section full-width-bg gray-bg">

        <div class="row">

            <?php 
            
            if (count($list_canchas) > 0) { ?>

                <!-- <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="media-filters" style="opacity: 1;">

                        <div class="filter-filtering">

                            <label>Buscar por:</label>
                            <ul class="filter-dropdown">
                                <li><span>Nombre</span>
                                    <ul>
                                        <li data-filter="all" class="filter">Nombre</li>
                                        <li data-filter=".category-campaign" class="filter">Precio</li>
                                    </ul>
                                </li>
                            </ul>

                        </div>

                        <div class="filter-sorting">
                            <input type="text" class="clase_input" />
                        </div>

                        <div class="filter-sorting" style="vertical-align: top;margin-left: 10px;">
                            <a class="button medium2 cursor_pointer" id="btn_fnd_canchas_qry">
                                Buscar algo
                            </a>

                        </div>

                        <script type="text/javascript">
                            $(function(){   
                                // ACCION COMBO DEPARTAMENTO -> BUSCAR PROVINCIAS Y DISTRITOS
                                $("#btn_fnd_canchas_qry").bind('click', function(event){
                                    alert("buscando");
                                }); 
           
                            });    
                        </script>

                    </div>
                </div> -->

                <div class="col-lg-12 col-md-12 col-sm-12">
                    
                    <div class="owl-carousel-container">
                        <div class="owl-header">
                            <div class="side-segment">
                                <h3 class="animate-onscroll">
                                    Registro de Canchas Encontradas
                                </h3>
                            </div>

                            <div class="carousel-arrows animate-onscroll">
                                <span class="left-arrow"><i class="icons icon-left-dir"></i></span>
                                <span class="right-arrow"><i class="icons icon-right-dir"></i></span>
                            </div>
                        </div>

                        <div class="owl-carousel" data-max-items="4">

                            <?php foreach ($list_canchas as $list_canchas) { ?>
                                <?php $url_nombre_cancha = replace_caracteres_raros($list_canchas->cCanNombre); ?>
                                <!-- Owl Item -->
                                <div>
                                    <!-- Blog Post -->
                                    <div class="blog-post animate-onscroll">
                                        <div class="post-image">
                                            <a href="<?php echo URL_MAIN; ?>canchas/informacion/<?php echo $url_nombre_cancha . "_" . $list_canchas->nCanID; ?>">
                                                <img src="<?php echo $list_canchas->cCanFotoPortada; ?>" alt="solocanchas.com">
                                            </a>
                                        </div>

                                        <h4 class="post-title">
                                            <a href="<?php echo URL_MAIN; ?>canchas/informacion/<?php echo $url_nombre_cancha . "_" . $list_canchas->nCanID; ?>">
                                               <?php echo $list_canchas->cCanNombre; ?>
                                            </a>
                                        </h4>

                                        <p>
                                            <i class="icons icon-location"></i> Dirección: <?php echo $list_canchas->direccion; ?>
                                        </p>
                                        <p>
                                            <i class="icons icon-home"></i> <?php echo $list_canchas->provincia; ?>, <?php echo $list_canchas->departamento; ?>
                                        </p>
                                        <p>
                                            <i class="icons icon-phone"></i> Teléfono: <?php echo $list_canchas->telefono; ?>
                                        </p>
                                        <p>
                                            <i class="icons icon-flag-1"></i> Canchas:  <?php echo $list_canchas->nro_canchas; ?>
                                        </p>
                                        <a href="<?php echo URL_MAIN; ?>canchas/informacion/<?php echo $url_nombre_cancha . "_" . $list_canchas->nCanID; ?>" class="button read-more-button big button-arrow">Ver detalle</a>

                                    </div>
                                    <!-- /Blog Post -->
                                </div>
                                <!-- /Owl Item -->
                            <?php } ?>

                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-lg-12 col-md-12 col-sm-12" style="opacity: 1;">
                    <div class="alert-box info">
                        <p><strong>Lo Sentimos!</strong> No se han encontrado registros de canchas con tu búsqueda. </p>
                        <i class="icons icon-cancel-circle-1"></i>
                    </div>
                </div>
            <?php } ?>

        </div>

    </section>
    <!-- /Section -->

</section>