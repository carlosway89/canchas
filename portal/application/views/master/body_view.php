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
                    <div class="banner_new donate-banner2">
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
                            <h4 class="letra-h4">Registrar eventos</h4>
                            <p>Registra tus eventos importantes</p>
                        </a>
                    </div>

                    <div class="banner-wrapper">
                        <a class="banner animate-onscroll" href="<?php echo URL_MAIN ?>canchas">
                            <i class="icons icon-right-hand margen_ico"></i>
                            <h4 class="letra-h4">Reservar Canchas</h4>
                            <p>Buscas tus Canchas y Reservalas</p>
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
                
                	
                <!-- SECCION CANCHAS IMPORTANTES TOP1-->
                <?php $this->load->view("canchas/cancha_top1"); ?>
                <!-- END -->
                
                <!-- SECCION CANCHAS FAVORITAS -->
                <?php $this->load->view("canchas/canchas_favoritas_view"); ?>
                <!-- END -->

                <!-- SECCION NOTICIAS IMPORTANTES -->
                <?php $this->load->view("noticias/noticias_importantes_view"); ?>
                <!-- END -->	

                <div class="">
                    <?php 
                for($i=0;$i<count($list_publicidad);$i++) { 

                    if($list_publicidad[$i]['cMultTitulo']=='abajo'){
                    ?>
                    <img src="<?= $list_publicidad[$i]['cMultLink']; ?>" style="width: 100%;" alt="banner abajo solocanchas" />
                <?php 
                    }
                }
                ?>
                </div>
                <!-- /Banner Rotator -->						
            </div>


            <!-- Sidebar -->
            <div class="col-lg-3 col-md-3 col-sm-4 sidebar">

                <!-- Informacion -->
                <div class="sidebar-box white featured-detalle ">
                    <div class="side-segment">
                        <h3><i class="icons icon-info-circled"></i> SOLO CANCHAS</h3>
                    </div>
                    <p style="text-align: justify;">
                        SoloCanchas es la única guía que reúne información de los mejores centros deportivos del pais, nuestros anunciantes cuentan 
                        con todo tipo de actividades relacionadas al entrenamiento y bienestar físico. El portal brinda toda la 
                        información necesaria para conocer y contactarse con centros deportivos a nivel nacional. 
                    </p>
                </div>
                <!-- /Informacion -->

                <!-- Publicidad de Anuncios -->
                <br />
                <div class="">
                <?php 
                for($i=0;$i<count($list_publicidad);$i++) { 

                    if($list_publicidad[$i]['cMultTitulo']=='derecha'){
                    ?>
                    <img src="<?= $list_publicidad[$i]['cMultLink']; ?>" style="width: 100%;" alt="banner derecha solocanchas" />
                <?php 
                    }
                }
                ?>
                </div>
                <br />
                <!-- /Publicidad de Anuncios -->

                


                <div class="sidebar-box white animate-onscroll hidden-xs">
                    <div class="side-segment">
                        <h3><i class="icons icon-facebook-squared"></i> SOLOCANCHAS.COM</h3>
                    </div>
                    <div>
                        <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FSoloCanchasPeru&amp;width&amp;height=590&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=true&amp;show_border=true"  frameborder="0" style="border:none;  height:250px;background: #FFF;"></iframe>
                    </div>
                </div>


                <!-- <div class="sidebar-box white animate-onscroll hidden-xs">
                    <div class="side-segment">
                        <h3><i class="icons icon-youtube"></i> SOLOCANCHAS.COM</h3>
                    </div>
                    <div>

                    </div>
                </div> -->


                <!-- Image Banner -->
                
            </div>

            <!-- /Sidebar -->

        </div>

    </section>
    <!-- /Section -->

</section>
