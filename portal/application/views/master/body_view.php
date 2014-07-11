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
                    <div class="banner donate-banner2 animate-onscroll">
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
                            <p>Lorem ipsum dolor sit amet</p>
                        </a>
                    </div>

                    <div class="banner-wrapper">
                        <a class="banner animate-onscroll" href="<?php echo URL_MAIN ?>eventos/registrar">
                            <i class="icons icon-check margen_ico"></i>
                            <h4 class="letra-h4">Registra tu evento</h4>
                            <p>Nemo enim ipsam</p>
                        </a>
                    </div>

                    <div class="banner-wrapper">
                        <a class="banner animate-onscroll" href="<?php echo URL_MAIN ?>multimedia/publica">
                            <i class="icons icon-picture margen_ico"></i>
                            <h4 class="letra-h4">Publica Multimedia</h4>
                            <p>Fotos y Videos</p>
                        </a>
                    </div>

                    <div class="banner-wrapper">
                        <a class="banner animate-onscroll" href="<?php echo URL_MAIN ?>noticias/publica">
                            <i class="icons icon-picture margen_ico"></i>
                            <h4 class="letra-h4">Publica Noticias</h4>
                            <p>Pellentesque sed dolor</p>
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
                <div class="side-segment">
                    <h3 class="animate-onscroll no-margin-top"><i class="icons icon-news"></i> Últimas noticias</h3>
                </div>

                <!-- SECCION NOTICIA PRINCIPAL -->
                <?php $this->load->view("master/noticia_principal_view") ?>
                <!-- END -->	

                <!-- SECCION NOTICIAS IMPORTANTES -->
                <?php $this->load->view("master/noticias_importantes_view"); ?>
                <!-- END -->	

                <!-- SECCION CANCHAS FAVORITAS -->
                <?php $this->load->view("master/canchas_favoritas_view"); ?>
                <!-- END -->	




                <!-- /Owl Carousel -->						<!-- Banner Rotator -->
                <div class="banner-rotator animate-onscroll">
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

                </div>
                <!-- /Banner Rotator -->						
            </div>

            
            <!-- Sidebar -->
            <div class="col-lg-3 col-md-3 col-sm-4 sidebar">

                <!-- Featured Video -->
                <div class="sidebar-box white featured-video animate-onscroll">
                    <div class="side-segment">
                        <h3><i class="icons icon-video"></i> Video de la Semana</h3>
                    </div>
                    <iframe src="http://player.vimeo.com/video/37811493" width="500" height="320"></iframe> 
                    <a href="#" class="button transparent button-arrow">Más Videos</a>
                </div>
                <!-- /Featured Video -->						<!-- Upcoming Events -->
                <div class="sidebar-box white animate-onscroll">
                    <div class="side-segment">
                        <h3><i class="icons icon-calendar"></i> Últimos Eventos</h3>
                    </div>
                    <ul class="upcoming-events">

                        <!-- Event -->
                        <li>
                            <div class="date">
                                <span>
                                    <span class="day">25</span>
                                    <span class="month">DEC</span>
                                </span>
                            </div>

                            <div class="event-content">
                                <h6><a href="event-post-v2.html">Sed in lacus ut enim</a></h6>
                                <ul class="event-meta">
                                    <li><i class="icons icon-clock"></i> 4:00 pm - 6:00 pm</li>
                                    <li><i class="icons icon-location"></i> 340 W 50th St.New York</li>
                                </ul>
                            </div>
                        </li>
                        <!-- /Event -->

                        <!-- Event -->
                        <li>
                            <div class="date">
                                <span>
                                    <span class="day">5</span>
                                    <span class="month">JAN</span>
                                </span>
                            </div>

                            <div class="event-content">
                                <h6><a href="event-post-v2.html">Sed in lacus ut enim</a></h6>
                                <ul class="event-meta">
                                    <li><i class="icons icon-clock"></i> 4:00 pm - 6:00 pm</li>
                                    <li><i class="icons icon-location"></i> 340 W 50th St.New York</li>
                                </ul>
                            </div>
                        </li>
                        <!-- /Event -->

                        <!-- Event -->
                        <li>
                            <div class="date">
                                <span>
                                    <span class="day">8</span>
                                    <span class="month">JAN</span>
                                </span>
                            </div>

                            <div class="event-content">
                                <h6><a href="event-post-v2.html">Sed in lacus ut enim</a></h6>
                                <ul class="event-meta">
                                    <li><i class="icons icon-clock"></i> 4:00 pm - 6:00 pm</li>
                                    <li><i class="icons icon-location"></i> 340 W 50th St.New York</li>
                                </ul>
                            </div>
                        </li>
                        <!-- /Event -->

                    </ul>
                    <a href="#" class="button transparent button-arrow">Más eventos</a>
                </div>
                <!-- /Upcoming Events -->						<!-- Image Banner -->
                <!--                <div class="sidebar-box image-banner animate-onscroll">
                                    <a href="issues.html">
                                        <img src="<?php echo URL_IMG; ?>main-issues.jpg" alt="">
                                        <h3>The main issues</h3>
                                        <span class="button transparent button-arrow">Find out more</span>
                                    </a>
                                </div>
                                 /Image Banner 						 Flickr Photos 
                                <div class="sidebar-box white flickr-photos animate-onscroll">
                                    <div class="side-segment">
                                        <h3><i class="icons icon-picture"></i> Flickr Photos</h3>
                                    </div>
                                    <ul class="flickr-feed">
                                    </ul>
                                </div>-->
                <!-- /Flickr Photos -->	


                <div class="sidebar-box white animate-onscroll">
                    <div class="side-segment">
                        <h3><i class="icons icon-comment"></i> Testimonios</h3>
                    </div>
                    <!-- Owl Carousel -->
                    <div class="owl-carousel-container testimonial-carousel animate-onscroll">

                        <div class="owl-carousel" data-max-items="1">

                            <!-- Owl Item -->
                            <div>

                                <!-- Testimonial -->
                                <div class="testimonial">

                                    <div class="testimonial-content">
                                        <p>"Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis."<br>
                                            Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna." </p>
                                    </div>

                                    <div class="testimonial-author">
                                        <img src="<?php echo URL_IMG; ?>testimonials/profile1.jpg" alt="">
                                        <div class="author-meta">
                                            <span class="name">Gloria Mann,</span>
                                            <span class="location">Los Angeles</span>
                                        </div>
                                    </div>

                                </div>
                                <!-- /Testimonial -->

                            </div>
                            <!-- /Owl Item -->

                            <!-- Owl Item -->
                            <div>

                                <!-- Testimonial -->
                                <div class="testimonial">

                                    <div class="testimonial-content">
                                        <p>"Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Donec sit amet eros." </p>
                                    </div>

                                    <div class="testimonial-author">
                                        <img src="<?php echo URL_IMG; ?>testimonials/profile2.jpg" alt="">
                                        <div class="author-meta">
                                            <span class="name">Gloria Mann,</span>
                                            <span class="location">Los Angeles</span>
                                        </div>
                                    </div>

                                </div>
                                <!-- /Testimonial -->

                            </div>
                            <!-- /Owl Item -->

                            <!-- Owl Item -->
                            <div>

                                <!-- Testimonial -->
                                <div class="testimonial">

                                    <div class="testimonial-content">
                                        <p>"Ut tellus dolor, dapibus eget, elementum vel, cursus eleifend, elit. Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis."<br>
                                            Donec sit amet eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris fermentum dictum magna." </p>
                                    </div>

                                    <div class="testimonial-author">
                                        <img src="<?php echo URL_IMG; ?>testimonials/profile3.jpg" alt="">
                                        <div class="author-meta">
                                            <span class="name">Gloria Mann,</span>
                                            <span class="location">Los Angeles</span>
                                        </div>
                                    </div>

                                </div>
                                <!-- /Testimonial -->

                            </div>
                            <!-- /Owl Item -->

                        </div>

                        <div class="owl-header">

                            <div class="carousel-arrows">
                                <span class="left-arrow"><i class="icons icon-left-dir"></i></span>
                                <span class="right-arrow"><i class="icons icon-right-dir"></i></span>
                            </div>

                        </div>

                    </div>
                    <!-- /Owl Carousel -->	




                </div>
            </div>




            <!-- /Sidebar -->




        </div>

    </section>
    <!-- /Section -->

</section>