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

                <!-- Blog Post -->
                <div class="blog-post big animate-onscroll">

                    <div class="post-image">
                        <img src="<?php echo URL_IMG; ?>new-demo.jpg" alt="">
                    </div>

                    <h4 class="post-title"><a href="blog-single-sidebar.html">Argentina vs Holanda: albicelestes y tulipanes se enfrentan por semifinal de Brasil 2014</a></h4>

                    <div class="post-meta">
                        <span>by <a href="#">admin</a></span>
                        <span>October 01, 2013 11:28AM</span>
                    </div>

                    <p>Decisivo duelo se jugará a partir de las 3:00 p.m. (hora peruana) en el Arena de Sao Paulo. El ganador se enfrentará, el domingo 13 de julio, a la selección de Alemania..</p>

                    <a href="blog-single-sidebar.html" class="button read-more-button big button-arrow">Read More</a>

                </div>
                <!-- /Blog Post -->	











                <!-- Owl Carousel -->
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

                                        <div class="event-image">
                                            <img src="<?php echo URL_IMG; ?>noticias/<?php echo $list_noticias->foto_noticia; ?>" alt="">
                                        </div>

                                        <div class="event-info">

                                            <div class="date">
                                                <span>
                                                    <span class="day">25</span>
                                                    <span class="month">DEC</span>
                                                </span>
                                            </div>

                                            <div class="event-content">
                                                <h6><a href="#"><?php echo $list_noticias->cInfoTitulo; ?></a></h6>
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



















                <!-- Owl Carousel -->
                <div class="owl-carousel-container">
                    <div class="owl-header">
                        <div class="side-segment">
                            <h3 class="animate-onscroll">
                                <i class="icons icon-star"></i> Canchas Favoritas
                            </h3>
                        </div>

                        <div class="carousel-arrows animate-onscroll">
                            <span class="left-arrow"><i class="icons icon-left-dir"></i></span>
                            <span class="right-arrow"><i class="icons icon-right-dir"></i></span>
                        </div>
                    </div>

                    <div class="owl-carousel" data-max-items="3">
                        <!-- Owl Item -->
                        <div>
                            <!-- Blog Post -->
                            <div class="blog-post animate-onscroll">
                                <div class="post-image">
                                    <a href="<?php echo URL_MAIN ?>canchas/informacion/Villasports-Precursores">
                                        <img src="<?php echo URL_IMG; ?>img-demo-canchas/img-demo3.jpg" alt="">
                                    </a>
                                </div>

                                <h4 class="post-title"><a href="<?php echo URL_MAIN ?>canchas/informacion/Villasports-Precursores">VILLASPORTS PRECURSORES</a></h4>
                                <!--                                <div class="post-meta">
                                                                    <span>by <a href="#">admin</a></span>
                                                                    <span>October 01, 2013 11:28AM</span>
                                                                </div>-->
                                <!--                                <p>Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel.</p>-->

                                <p>
                                    <i class="icons icon-location"></i> Jr. Jose Aguilar Segura s/n
                                </p>
                                <p>
                                    <i class="icons icon-home"></i> Trujillo, La Libertad
                                </p>
                                <p>
                                    <i class="icons icon-phone"></i> 4510001 / 984471883
                                </p>
                                <p>
                                    <i class="icons icon-flag-1"></i> 3 Canchas
                                </p>
                                <a href="<?php echo URL_MAIN ?>canchas/informacion/Villasports-Precursores" class="button read-more-button big button-arrow">Read More</a>

                            </div>
                            <!-- /Blog Post -->
                        </div>
                        <!-- /Owl Item -->

                        <!-- Owl Item -->
                        <div>
                            <!-- Blog Post -->
                            <div class="blog-post animate-onscroll">
                                <div class="post-image">
                                    <a href="<?php echo URL_MAIN ?>canchas/informacion/Villasports-Precursores">
                                        <img src="<?php echo URL_IMG; ?>img-demo-canchas/img-demo4.jpg" alt="">
                                    </a>
                                </div>

                                <h4 class="post-title"><a href="<?php echo URL_MAIN ?>canchas/informacion/Villasports-Precursores">VILLASPORTS PRECURSORES </a></h4>

                                <!--                                <div class="post-meta">
                                                                    <span>by <a href="#">admin</a></span>
                                                                    <span>October 01, 2013 11:28AM</span>
                                                                </div>-->
                                <!--                                <p>Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel.</p>-->

                                <p>
                                    <i class="icons icon-location"></i> Jr. Jose Aguilar Segura s/n
                                </p>
                                <p>
                                    <i class="icons icon-home"></i> Trujillo, La Libertad
                                </p>
                                <p>
                                    <i class="icons icon-phone"></i> 4510001 / 984471883
                                </p>
                                <p>
                                    <i class="icons icon-flag-1"></i> 3 Canchas
                                </p>
                                <a href="<?php echo URL_MAIN ?>canchas/informacion/Villasports-Precursores" class="button read-more-button big button-arrow">Leer más</a>
                            </div>
                            <!-- /Blog Post -->
                        </div>
                        <!-- /Owl Item -->

                        <!-- Owl Item -->
                        <div>

                            <!-- Blog Post -->
                            <div class="blog-post animate-onscroll">
                                <div class="post-image">
                                    <a href="<?php echo URL_MAIN ?>canchas/informacion/Villasports-Precursores">
                                        <img src="<?php echo URL_IMG; ?>img-demo-canchas/img-demo5.jpg" alt="">
                                    </a>
                                </div>

                                <h4 class="post-title"><a href="<?php echo URL_MAIN ?>canchas/informacion/Villasports-Precursores">VILLASPORTS PRECURSORES</a></h4>

                                <!--                                <div class="post-meta">
                                                                    <span>by <a href="#">admin</a></span>
                                                                    <span>October 01, 2013 11:28AM</span>
                                                                </div>-->
                                <!--                                <p>Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel.</p>-->

                                <p>
                                    <i class="icons icon-location"></i> Jr. Jose Aguilar Segura s/n
                                </p>
                                <p>
                                    <i class="icons icon-home"></i> Trujillo, La Libertad
                                </p>
                                <p>
                                    <i class="icons icon-phone"></i> 4510001 / 984471883
                                </p>
                                <p>
                                    <i class="icons icon-flag-1"></i> 3 Canchas
                                </p>
                                <a href="<?php echo URL_MAIN ?>canchas/informacion/Villasports-Precursores" class="button read-more-button big button-arrow">Leer más</a>
                            </div>
                            <!-- /Blog Post -->
                        </div>
                        <!-- /Owl Item -->

                        <!-- Owl Item -->
                        <div>
                            <!-- Blog Post -->
                            <div class="blog-post animate-onscroll">
                                <div class="post-image">
                                    <a href="<?php echo URL_MAIN ?>canchas/informacion/Villasports-Precursores">
                                        <img src="<?php echo URL_IMG; ?>img-demo-canchas/img-demo6.jpg" alt="">
                                    </a>
                                </div>

                                <h4 class="post-title"><a href="<?php echo URL_MAIN ?>canchas/informacion/Villasports-Precursores">VILLASPORTS PRECURSORES</a></h4>

                                <!--                                <div class="post-meta">
                                                                    <span>by <a href="#">admin</a></span>
                                                                    <span>October 01, 2013 11:28AM</span>
                                                                </div>-->
                                <!--                                <p>Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel.</p>-->

                                <p>
                                    <i class="icons icon-location"></i> Jr. Jose Aguilar Segura s/n
                                </p>
                                <p>
                                    <i class="icons icon-home"></i> Trujillo, La Libertad
                                </p>
                                <p>
                                    <i class="icons icon-phone"></i> 4510001 / 984471883
                                </p>
                                <p>
                                    <i class="icons icon-flag-1"></i> 3 Canchas
                                </p>
                                <a href="<?php echo URL_MAIN ?>canchas/informacion/Villasports-Precursores" class="button read-more-button big button-arrow">Leer más</a>
                            </div>
                            <!-- /Blog Post -->
                        </div>
                        <!-- /Owl Item -->

                        <!-- Owl Item -->
                        <div>
                            <!-- Blog Post -->
                            <div class="blog-post animate-onscroll">
                                <div class="post-image">
                                    <a href="<?php echo URL_MAIN ?>canchas/informacion/Villasports-Precursores">
                                        <img src="<?php echo URL_IMG; ?>img-demo-canchas/img-demo7.jpg" alt="">
                                    </a>
                                </div>

                                <h4 class="post-title"><a href="<?php echo URL_MAIN ?>canchas/informacion/Villasports-Precursores">VILLASPORTS PRECURSORES </a></h4>

                                <!--                                <div class="post-meta">
                                                                    <span>by <a href="#">admin</a></span>
                                                                    <span>October 01, 2013 11:28AM</span>
                                                                </div>-->
                                <!--                                <p>Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel.</p>-->

                                <p>
                                    <i class="icons icon-location"></i> Jr. Jose Aguilar Segura s/n
                                </p>
                                <p>
                                    <i class="icons icon-home"></i> Trujillo, La Libertad
                                </p>
                                <p>
                                    <i class="icons icon-phone"></i> 4510001 / 984471883
                                </p>
                                <p>
                                    <i class="icons icon-flag-1"></i> 3 Canchas
                                </p>
                                <a href="<?php echo URL_MAIN ?>canchas/informacion/Villasports-Precursores" class="button read-more-button big button-arrow">Leer más</a>
                            </div>
                            <!-- /Blog Post -->
                        </div>
                        <!-- /Owl Item -->

                        <!-- Owl Item -->
                        <div>
                            <!-- Blog Post -->
                            <div class="blog-post animate-onscroll">

                                <div class="post-image">
                                    <a href="<?php echo URL_MAIN ?>canchas/informacion/Villasports-Precursores">
                                        <img src="<?php echo URL_IMG; ?>img-demo-canchas/img-demo8.jpg" alt="">
                                    </a>
                                </div>

                                <h4 class="post-title"><a href="<?php echo URL_MAIN ?>canchas/informacion/Villasports-Precursores">VILLASPORTS PRECURSORES</a></h4>

                                <!--                                <div class="post-meta">
                                                                    <span>by <a href="#">admin</a></span>
                                                                    <span>October 01, 2013 11:28AM</span>
                                                                </div>-->
                                <!--                                <p>Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante eu lacus. Vestibulum libero nisl, porta vel.</p>-->

                                <p>
                                    <i class="icons icon-location"></i> Jr. Jose Aguilar Segura s/n
                                </p>
                                <p>
                                    <i class="icons icon-home"></i> Trujillo, La Libertad
                                </p>
                                <p>
                                    <i class="icons icon-phone"></i> 4510001 / 984471883
                                </p>
                                <p>
                                    <i class="icons icon-flag-1"></i> 3 Canchas
                                </p>
                                <a href="<?php echo URL_MAIN ?>canchas/informacion/Villasports-Precursores" class="button read-more-button big button-arrow">Leer más</a>
                            </div>
                            <!-- /Blog Post -->
                        </div>
                        <!-- /Owl Item -->
                    </div>
                </div>

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