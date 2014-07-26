

<div class="main-container" id="main-container">
    <script type="text/javascript">
        try{ace.settings.check('main-container' , 'fixed')}catch(e){}
    </script>

    <div class="main-container-inner">
        <a class="menu-toggler" id="menu-toggler" href="#">
            <span class="menu-text"></span>
        </a>

        <div class="sidebar" id="sidebar">
            <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
            </script>

            <div class="sidebar-shortcuts" id="sidebar-shortcuts">
                <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
                    <button class="btn btn-success">
                        <i class="icon-signal"></i>
                    </button>

                    <button class="btn btn-info">
                        <i class="icon-pencil"></i>
                    </button>

                    <button class="btn btn-warning">
                        <i class="icon-group"></i>
                    </button>

                    <button class="btn btn-danger">
                        <i class="icon-cogs"></i>
                    </button>
                </div>

                <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
                    <span class="btn btn-success"></span>

                    <span class="btn btn-info"></span>

                    <span class="btn btn-warning"></span>

                    <span class="btn btn-danger"></span>
                </div>
            </div><!-- #sidebar-shortcuts -->

            <ul class="nav nav-list">
                <li class="active">
                    <a href="<?= URL_MAIN ?>manage">
                        <i class="icon-dashboard"></i>
                        <span class="menu-text"> PANEL </span>
                    </a>
                </li>

                <li>
                    <a class="link-loading" href="<?= URL_MAIN ?>usuarios">
                        <i class=" icon-group "></i>
                        <span class="menu-text"> Usuarios </span>
                    </a>
                </li>

                <li>
                    <a href="<?= URL_MAIN ?>canchas">
                        <i class=" icon-globe "></i>
                        <span class="menu-text"> Canchas </span>
                    </a>
                </li>

                <li>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-desktop"></i>
                        <span class="menu-text"> Multimedia </span>

                        <b class="arrow icon-angle-down"></b>
                    </a>

                    <ul class="submenu">
                        <li>
                            <a href="<?= URL_MAIN ?>multimedia/fotos">
                                <i class="icon-double-angle-right"></i>
                                Fotos
                            </a>
                        </li>

                        <li>
                            <a href="<?= URL_MAIN ?>multimedia/videos">
                                <i class="icon-double-angle-right"></i>
                                Videos
                            </a>
                        </li>
                        <li>
                            <a href="<?= URL_MAIN ?>multimedia/noticias">
                                <i class="icon-double-angle-right"></i>
                                Noticias
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="<?= URL_MAIN ?>eventos">
                        <i class=" icon-bullhorn"></i>
                        <span class="menu-text"> Eventos </span>
                    </a>
                </li>



                <li>
                    <a href="<?= URL_MAIN ?>fixture">
                        <i class="icon-list-alt"></i>
                        <span class="menu-text"> Fixture </span>
                    </a>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle">
                        <i class="icon-edit"></i>
                        <span class="menu-text"> Mantenedores </span>

                        <b class="arrow icon-angle-down"></b>
                    </a>

                    <ul class="submenu">
                        <li>
                            <a href="<?= URL_MAIN ?>">
                                <i class="icon-double-angle-right"></i>
                                Uusuario
                            </a>
                        </li>

                        <li>
                            <a href="<?= URL_MAIN ?>">
                                <i class="icon-double-angle-right"></i>
                                Parametros
                            </a>
                        </li>

                        <li>
                            <a href="<?= URL_MAIN ?>">
                                <i class="icon-double-angle-right"></i>
                                Wysiwyg &amp; Markdown
                            </a>
                        </li>

                        <li>
                            <a href="<?= URL_MAIN ?>">
                                <i class="icon-double-angle-right"></i>
                                Dropzone File Upload
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="<?= URL_MAIN ?>">
                        <i class="icon-calendar"></i>

                        <span class="menu-text">
                            Torneos
                            <span class="badge badge-transparent tooltip-error" title="2&nbsp;Important&nbsp;Events">
                                <i class="icon-warning-sign red bigger-130"></i>
                            </span>
                        </span>
                    </a>
                </li>


            </ul><!-- /.nav-list -->

            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
            </div>

            <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
            </script>
        </div>