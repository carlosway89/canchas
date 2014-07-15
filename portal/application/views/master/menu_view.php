<!-- Lower Header -->
<div id="lower-header">

    <div class="container">

        <div id="menu-button">
            <div>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <span>Menu</span>
        </div>

        <ul id="navigation">

            <!-- Home -->
            <li class="home-button <?php if($menu_home == 'home') {  echo "current-menu-item"; } ?>">
                <a href="<?php echo URL_MAIN ?>"><i class="icons icon-home"></i></a>
            </li>
            <!-- /Home -->

            <!-- Pages -->
            <li class="<?php if($menu_home == 'canchas') {  echo "current-menu-item"; } ?>">
                <a href="<?php echo URL_MAIN ?>canchas">Canchas</a>
<!--                <ul>
                    <li><a href="about.html">About</a></li>
                    <li><a href="team.html">Team</a></li>
                    <li><a href="issues.html">Issues</a></li>
                    <li><a href="testimonials.html">Testimonials</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="page-right-sidebar.html">Page with right sidebar</a></li>
                    <li><a href="page-left-sidebar.html">Page with left sidebar</a></li>
                    <li><a href="page-fullwidth.html">Full width page</a></li>
                </ul>-->
            </li>
            <!-- /Pages -->

            <!-- Events -->
            <li>
                <a href="<?php echo URL_MAIN ?>">Academias</a>
<!--                <span>Academias</span>
                <ul>
                    <li><a href="event-calendar.html">Calendar</a></li>
                    <li><a href="event-post-v1.html">Event post style 1</a></li>
                    <li><a href="event-post-v2.html">Event post style 2</a></li>
                </ul>-->
            </li>
            <!-- /Events -->

            <!-- Media -->
            <li>
                <a href="<?php echo URL_MAIN ?>">Gimnasios</a>
<!--                <span>Gimnasios</span>
                <ul>
                    <li>
                        <span>Sortable Grid</span>
                        <ul>
                            <li><a href="media-sortable-1column-sidebar.html">1 Column with right sidebar</a></li>
                            <li><a href="media-sortable-2columns.html">2 Columns</a></li>
                            <li><a href="media-sortable-3columns.html">3 Columns</a></li>
                            <li><a href="media-sortable-3columns-sidebar.html">3 Columns with left sidebar</a></li>
                            <li><a href="media-sortable-4columns.html">4 Columns</a></li>
                        </ul>
                    </li>

                    <li>
                        <span>Grid with pagination</span>
                        <ul>
                            <li><a href="media-grid-1column-sidebar.html">1 Column with right sidebar</a></li>
                            <li><a href="media-grid-2columns.html">2 Columns</a></li>
                            <li><a href="media-grid-3columns.html">3 Columns</a></li>
                            <li><a href="media-grid-3columns-sidebar.html">3 Columns with left sidebar</a></li>
                            <li><a href="media-grid-4columns.html">4 Columns</a></li>
                        </ul>
                    </li>

                    <li>
                        <span>Classic gallery</span>
                        <ul>
                            <li><a href="media-classic-sortable-3columns.html">Sortable 3 Columns</a></li>
                            <li><a href="media-classic-sortable-3columns-sidebar.html">Sortable 3 Columns with right sidebar</a></li>
                            <li><a href="media-classic-sortable-4columns.html">Sortable 4 Columns</a></li>
                            <li><a href="media-classic-3columns.html">3 Columns</a></li>
                            <li><a href="media-classic-3columns-sidebar.html">3 Columns with left sidebar</a></li>
                            <li><a href="media-classic-4columns.html">4 Columns</a></li>
                        </ul>
                    </li>

                    <li>
                        <span>Single portfolio post</span>
                        <ul>
                            <li><a href="portfolio-single-fullwidth.html">Fullwidth</a></li>
                            <li><a href="portfolio-single-sidebar.html">With Sidebar</a></li>
                            <li><a href="portfolio-single-extended.html">Extended Image Slideshow</a></li>
                        </ul>
                    </li>
                </ul>-->
            </li>
            <!-- /Media -->

            <!-- Get Involved -->
            <li >
                <a href="get-involved.html">Campeonatos</a>
            </li>
            <!-- /Get Involved -->

            <!-- Features -->
            <li class="<?php if($menu_home == 'contacto') {  echo "current-menu-item"; } ?>">
            
                <a href="<?php echo URL_MAIN; ?>contactenos">Contáctenos</a>
<!--                <span>Contactanos</span>
                <ul>
                    <li><a href="features-typography.html">Typography</a></li>
                    <li><a href="features-shortcodes.html">Shortcodes</a></li>
                </ul>-->
            </li>
            <!-- /Features -->

            <!-- Blog -->
<!--            <li>
                <span>Blog</span>
                <ul>
                    <li><a href="blog-v1.html">Blog style 1 with right sidebar</a></li>
                    <li><a href="blog-v2.html">Blog style 2 with left sidebar</a></li>
                    <li><a href="blog-fullwidth.html">Full width blog</a></li>
                    <li><span>Single blog post</span>
                        <ul>
                            <li><a href="blog-single-sidebar.html">With sidebar</a></li>
                            <li><a href="blog-single-fullwidth.html">Full width</a></li>
                        </ul>
                    </li>
                </ul>
            </li>-->
            <!-- /Blog -->

            <!-- Shop -->
<!--            <li>
                <span>Shop</span>
                <ul>
                    <li><a href="shop-frontpage.html">Front page</a></li>
                    <li><a href="shop-productpage.html">Product page</a></li>
                    <li><a href="shop-cart.html">Shopping cart</a></li>
                    <li><a href="shop-checkout.html">Checkout</a></li>
                </ul>
            </li>-->
            <!-- /Shop -->

            <!-- Donate -->
            <li class="donate-button ">
                <a class="media-icon" rel="prettyPhoto[registro-usuarios]" href="<?php echo URL_MAIN; ?>registro_usuarios?iframe=true&width=800&height=950"><i class="icons icon-users"></i> Registro de Usuarios</a>
            </li>
            <!-- /Donate -->

        </ul>
    </div>
</div>
<!-- /Lower Header -->