<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?php echo URL_JS; ?>fancybox/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?php echo URL_JS; ?>fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />

<!-- Add Button helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="<?php echo URL_JS; ?>fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
<script type="text/javascript" src="<?php echo URL_JS; ?>fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

<!-- Add Thumbnail helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="<?php echo URL_JS; ?>fancybox/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
<script type="text/javascript" src="<?php echo URL_JS; ?>fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

<!-- Add Media helper (this is optional) -->
<script type="text/javascript" src="<?php echo URL_JS; ?>fancybox/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.fancybox').fancybox();
    });
</script>
<section id="content">

    <!-- Section -->
    <section class="section full-width-bg">
        <div class="row">

            <div class="col-lg-9 col-md-9 col-sm-8">
                <!-- Main Slider -->
                <?php $this->load->view("master/slider_view"); ?>
                <!-- /Main Slider -->
            </div>

            <div class="col-lg-3 col-md-3 col-sm-4 sidebar">
                <div class="banner-wrapper">
                    <div class="banner_new donate-banner2 animate-onscroll">
                        <div class="side-segment">
                            <h5>Búsqueda de <strong>Canchas</strong></h5>
                        </div>
                        <?php $this->load->view("master/form_search_canchas_view"); ?>
                    </div>
                </div>											
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">

                <div class="banners-inline">

                    <div class="banner-wrapper">
                        <a class="banner animate-onscroll" href="<?php echo URL_MAIN ?>eventos">
                            <i class="icons icon-calendar margen_ico"></i>
                            <h4 class="letra-h4">Buscar Eventos</h4>
                            <p>busca los eventos en el calendario</p>
                        </a>
                    </div>

                    <div class="banner-wrapper">
                        <a class="banner animate-onscroll" href="<?php echo URL_INTRANET ?>eventos/add" target="_blank">
                            <i class="icons icon-check margen_ico"></i>
                            <h4 class="letra-h4">Registra tu evento</h4>
                            <p>Registra tus eventos importantes</p>
                        </a>
                    </div>

                    <div class="banner-wrapper">
                        <a class="banner animate-onscroll" href="#">
                            <i class="icons icon-picture margen_ico"></i>
                            <h4 class="letra-h4">Publica Multimedia</h4>
                            <p>Publica tus Fotos y Videos</p>
                        </a>
                    </div>

                    <div class="banner-wrapper">
                        <a class="banner animate-onscroll" href="#">
                            <i class="icons icon-picture margen_ico"></i>
                            <h4 class="letra-h4">Torneos</h4>
                            <p>Crea tu torne de tu club</p>
                        </a>
                    </div>							
                </div>
            </div>
        </div>
    </section>
    <!-- /Section -->

    <!-- Section -->
    <section class="section full-width-bg gray-bg">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8">
                <div class="option-select text-center">
                    <a id="link-noticias" class="fixture-navegador active" href="#noticias">FUTBOL PERUANO</a>
                    <a id="link-posiciones" class="fixture-navegador" href="#posiciones">POSICIONES</a>
                    <a id="link-resultados" class="fixture-navegador" href="#resultados">RESULTADOS</a>
                    <!-- <a id="link-calendario" class="fixture-navegador" href="#calendario">CALENDARIO</a> -->
                    <a id="link-goleadores" class="fixture-navegador" href="#goleadores">GOLEADORES</a>
                    <div id="resultados-envivo"></div>
                </div><br>


                <div id="fixture_content_show" style="display:none">
                    <!--fixture content -->
                </div>
                <link href="<?= URL_CSS ?>externo/externo.css" rel="stylesheet" type="text/css" />
                <script type="text/javascript" src="<?php echo URL_JS; ?>fixture/jsFixtureGet.js"></script>

                <div id="noticias-resultados">
                    <!-- SECCION NOTICIAS IMPORTANTES -->
                    <?php $this->load->view("noticias/noticia_principal_view"); ?>
                    <!-- END -->

                    <!-- SECCION NOTICIAS IMPORTANTES -->
                    <?php $this->load->view("noticias/noticias_importantes_view"); ?>
                    <!-- END -->

                </div>
                	

                <!-- SECCION CANCHAS FAVORITAS -->
                <?php $this->load->view("canchas/canchas_favoritas_view"); ?>
                <!-- END -->	

                <!-- /Owl Carousel -->						<!-- Banner Rotator -->
                <!-- <div class="banner-rotator animate-onscroll">
                    <div class="flexslider banner-rotator-flexslider">
                        <ul class="slides">

                            <li id="flex_rotator_1">
                                <div class="banner-rotator-content">
                                    <h5>Campaign trial</h5>
                                    <h2>New York</h2>
                                    <span class="date">December 17th</span>
                                    <a href="#" class="button big button-arrow">Details</a>
                                </div>
                            </li>

                            <li id="flex_rotator_2">
                                <div class="banner-rotator-content">
                                    <h5>Campaign trial</h5>
                                    <h2>Corden</h2>
                                    <span class="date">April 12th</span>
                                    <a href="#" class="button big button-arrow">Details</a>
                                </div>
                            </li>

                            <li id="flex_rotator_3">
                                <div class="banner-rotator-content">
                                    <h5>Campaign trial</h5>
                                    <h2>Redhedge</h2>
                                    <span class="date">June 27th</span>
                                    <a href="#" class="button big button-arrow">Details</a>
                                </div>
                            </li>

                        </ul>

                    </div>

                </div> -->
                <div class="animate-onscroll">
                    <img src="<?php echo URL_IMG ?>ban.png" style="width: 100%;" />
                </div>
                <!-- /Banner Rotator -->						
            </div>


            <!-- Sidebar -->
            <div class="col-lg-3 col-md-3 col-sm-4 sidebar">

                <!-- Featured Video -->
                <div class="sidebar-box white featured-video animate-onscroll">
                    <div class="side-segment">
                        <h3><i class="icons icon-info-circled"></i> SOLO CANCHAS</h3>
                    </div>
                    <p style="text-align: justify;">
                        SoloCanchas es la única guía que reúne información de los mejores centros deportivos del pais, nuestros anunciantes cuentan 
                        con todo tipo de actividades relacionadas al entrenamiento y bienestar físico. El portal brinda toda la 
                        información necesaria para conocer y contactarse con centros deportivos a nivel nacional. 
                    </p>
                </div>
                <!-- /Featured Video -->

                <!-- Publicidad de Anuncios -->
                <br />
                <div class="animate-onscroll">
                    <img src="<?php echo URL_IMG ?>banner_anncia.png" style="width: 100%;" />
                </div>
                <br />
                <!-- /Publicidad de Anuncios -->

                <!-- Sección de Eventos -->
                <?php $this->load->view("master/ultimo_eventos_view"); ?>
                <!-- /Sección de Eventos -->						


                <div class="sidebar-box white animate-onscroll">
                    <div class="side-segment">
                        <h3><i class="icons icon-facebook-squared"></i> SOLOCANCHAS.COM</h3>
                    </div>
                    <div>
                        <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FSoloCanchasPeru&amp;width&amp;height=590&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=true&amp;show_border=true"  frameborder="0" style="border:none;  height:250px;background: #FFF;" allowTransparency="true"></iframe>
                    </div>
                </div>


                <div class="sidebar-box white animate-onscroll">
                    <div class="side-segment">
                        <h3><i class="icons icon-youtube"></i> SOLOCANCHAS.COM</h3>
                    </div>
                    <div>

                    </div>
                </div>


                <!-- Image Banner -->
                
            </div>




            <!-- /Sidebar -->




        </div>

    </section>
    <!-- /Section -->

</section>
