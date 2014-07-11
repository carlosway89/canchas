<section id="content">	

    <!-- Page Heading -->
    <section class="section page-heading animate-onscroll">

        <h1>Información de la Noticia seleccionada</h1>
        <p class="breadcrumb"><a href="<?php echo URL_MAIN; ?>">Inicio</a> / Información de la Noticia seleccionada</p>

    </section>
    <!-- Page Heading -->



    <!-- Section -->
    <section class="section full-width-bg gray-bg">

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12">

                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <!-- Blog Post -->
                        <div class="blog-post animate-onscroll">

                            <div class="post-content">

                                <div class="post-side-meta">
                                    <?php
                                    $cadena_fecha = explode("/", $cNotiFechaRegistro);
                                    $nombre_mes = toNameMonthAbreviatura($cadena_fecha[1]);
                                    $nro_dia = $cadena_fecha[0];
                                    ?>
                                    <div class="date">
                                        <span class="day"><?php echo $nro_dia; ?></span>
                                        <span class="month"><?php echo $nombre_mes; ?></span>
                                    </div>

                                    <a href="blog-single-sidebar.html"><div class="post-format">
                                            <i class="icons icon-doc-text-inv"></i>
                                        </div></a>

                                    <div class="post-comments">
                                        <a href="blog-single-sidebar.html#comments"><i class="icons icon-chat-empty"></i> 25</a>
                                    </div>

                                </div>

                                <div class="post-header">
                                    <h2><a><?php echo $cNotiTitulo; ?></a></h2>
                                    <div class="post-meta">
                                        <span>Por <a href="#"><?php echo $cNotiAutor; ?></a></span>
                                        <span>in <a href="#">Comentarios</a>, <a href="#">20</a></span>
                                    </div>
                                </div>

                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        $(".post-exceprt p").addClass("parrafo_justificado");
                                    });
                                </script>

                                <div class="post-exceprt">

                                    <blockquote class="iconic-quote">"<?php echo $cNotiSumilla; ?>"</blockquote>


                                    <img class="align-left animate-onscroll img_noticia" src="<?php echo URL_IMG; ?>noticias/<?php echo $cNotiFotoPortada; ?>" alt="">

                                    <p>
                                        <?php echo $cNotiDescripcion; ?>
                                    </p>

                                </div>

                            </div>

                        </div>
                        <!-- /Blog Post -->								

                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12" style="opacity: 1;">

                <!-- Tabs -->
                <div class="tabs">

                    <div class="tab-header">
                        <ul>
                            <li class="active-tab"><a href="#tab11"><h6>Fotos</h6></a></li>
                            <li><a href="#tab22"><h6>Videos</h6></a></li>
                            <li><a href="#tab33"><h6>Comentarios</h6></a></li>
                        </ul>
                    </div>

                    <div class="tab-content">

                        <div class="tab" id="tab11" style="display: block;">
                            <?php $this->load->view("noticias/fotos_noticia_seleccionada_view"); ?>  
                        </div>

                        <div class="tab" id="tab22" style="display: none;">
                            <p>Sed entum velit vel ipsum bibendum em lacus, itor et aliquam eget, iaculis id lacus. Praesent tudin. 
                                <br><br>
                                Aiquam eget, iaculis id lacus. Praesent tudin. Ut sem lacus, ttitor putate uam mi nec hendrerit.</p>
                            <p>Sed entum velit vel ipsum bibendum em lacus, itor et aliquam eget, iaculis id lacus. Praesent tudin. 
                                <br><br>
                                Aiquam eget, iaculis id lacus. Praesent tudin. Ut sem lacus, ttitor putate uam mi nec hendrerit.</p>
                        </div>

                        <div class="tab" id="tab33" style="display: none;">
                            <p>Sed entum velit vel ipsum bibendum em lacus, itor et aliquam eget, iaculis id lacus. Praesent tudin.</p>
                        </div>

                    </div>

                </div>
                <!-- /Tabs -->					
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12" style="opacity: 1;">
                <?php $this->load->view("noticias/otras_noticias_view"); ?>
            </div>
        </div>

    </section>
    <!-- /Section -->


<!--    <section class="section full-width-bg gray-bg">
    <div class="row">
        
    </div>
     /Post Comments 
</section>-->

</section>