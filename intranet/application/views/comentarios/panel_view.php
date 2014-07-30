<div class="page-content">
    <div class="page-header">
        <h1>
            Comentarios
<!--            <small>
                <i class="icon-double-angle-right"></i>
                Registrar los datos de la nueva cancha
            </small>-->
        </h1>
    </div><!-- /.page-header -->
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->

            <div class="dialogs">

                <?php foreach ($list_comentarios as $list_comentarios) { ?>
                    <div class="itemdiv dialogdiv">
                        <div class="user">
                            <img alt="Alexa's Avatar" src="<?php echo URL_IMG; ?>avatars/avatar1.png" />
                        </div>

                        <div class="body">
                            <div class="time">
                                <i class="icon-time"></i>
                                <span class="green">4 sec</span>
                            </div>

                            <div class="name">
                                <a href="#"><?php echo $list_comentarios->cComcaNombrePersona; ?></a>
                            </div>
                            <div class="text">
                                <?php echo $list_comentarios->cComcaTexto; ?>
                            </div>

                            <div class="tools">
                                <a href="#" class="btn btn-minier btn-info">
                                    <i class="icon-only icon-share-alt"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>

<!--                <div class="itemdiv dialogdiv">
                    <div class="user">
                        <img alt="John's Avatar" src="<?php echo URL_IMG; ?>avatars/avatar.png" />
                    </div>

                    <div class="body">
                        <div class="time">
                            <i class="icon-time"></i>
                            <span class="blue">38 sec</span>
                        </div>

                        <div class="name">
                            <a href="#">John</a>
                        </div>
                        <div class="text">Raw denim you probably haven&#39;t heard of them jean shorts Austin.</div>

                        <div class="tools">
                            <a href="#" class="btn btn-minier btn-info">
                                <i class="icon-only icon-share-alt"></i>
                            </a>
                            <a href="#" class="btn btn-minier btn-info">
                                <i class="icon-only icon-share-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>-->

<!--                <div class="itemdiv dialogdiv">
                    <div class="user">
                        <img alt="Bob's Avatar" src="<?php echo URL_IMG; ?>avatars/user.jpg" />
                    </div>

                    <div class="body">
                        <div class="time">
                            <i class="icon-time"></i>
                            <span class="orange">2 min</span>
                        </div>

                        <div class="name">
                            <a href="#">Bob</a>
                            <span class="label label-info arrowed arrowed-in-right">admin</span>
                        </div>
                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque commodo massa sed ipsum porttitor facilisis.</div>

                        <div class="tools">
                            <a href="#" class="btn btn-minier btn-info">
                                <i class="icon-only icon-share-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>-->

<!--                <div class="itemdiv dialogdiv">
                    <div class="user">
                        <img alt="Jim's Avatar" src="<?php echo URL_IMG; ?>avatars/avatar4.png" />
                    </div>

                    <div class="body">
                        <div class="time">
                            <i class="icon-time"></i>
                            <span class="grey">3 min</span>
                        </div>

                        <div class="name">
                            <a href="#">Jim</a>
                        </div>
                        <div class="text">Raw denim you probably haven&#39;t heard of them jean shorts Austin.</div>

                        <div class="tools">
                            <a href="#" class="btn btn-minier btn-info">
                                <i class="icon-only icon-share-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>-->

<!--                <div class="itemdiv dialogdiv">
                    <div class="user">
                        <img alt="Alexa's Avatar" src="<?php echo URL_IMG; ?>avatars/avatar1.png" />
                    </div>

                    <div class="body">
                        <div class="time">
                            <i class="icon-time"></i>
                            <span class="green">4 min</span>
                        </div>

                        <div class="name">
                            <a href="#">Alexa</a>
                        </div>
                        <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>

                        <div class="tools">
                            <a href="#" class="btn btn-minier btn-info">
                                <i class="icon-only icon-share-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>-->
            </div>

            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->






