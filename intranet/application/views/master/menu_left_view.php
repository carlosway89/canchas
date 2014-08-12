

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

            <ul class="nav nav-list">
                <li>
                    <?php
                    if ($this->uri->segment(1) == "manage") {
                        $clase_inicial = 'class="active"';
                    } else {
                        $clase_inicial = '';
                    }
                    ?>
                <li <?php echo $clase_inicial; ?>>
                    <a href="<?= URL_MAIN ?>manage">
                        <i class="icon-dashboard"></i>
                        <span class="menu-text"> PANEL </span>
                    </a>
                </li>
                <li>
                    <a href="http://solocanchas.com/SLGimnasio"  target="_blank" >
                        <i class=" icon-laptop "></i>
                        <span class="menu-text">
                            ADMINISTAR CANCHA
                        </span>
                    </a>
                </li>

                <?php
                $opciones = $this->loaders->get_menu();
                $count = count($opciones);
                for ($i = 0; $i < $count; $i++) {
                    ?>
                    <li <?php echo $opciones[$i]["active"]; ?>>
                        <a href="#" class="dropdown-toggle">
                            <i class="<?php echo $opciones[$i]["icon"]; ?>"></i>
                            <span class="menu-text"> <?php echo $opciones[$i]["menu"]; ?> </span>
                            <b class="arrow icon-angle-down"></b>
                        </a>
                        <?php
                        $count2 = count($opciones[$i]["datos"]);
                        echo '<ul ' . $opciones[$i]["ul"] . '>';
                        for ($j = 0; $j < $count2; $j++) {
                            ?>                              
                        <li <?= $opciones[$i]["datos"][$j]["li"]; ?> >
                            <a href="<?php echo URL_MAIN . $opciones[$i]["datos"][$j]["url"]; ?>">
                                <i class="icon-double-angle-right"></i>
                                <?php echo $opciones[$i]["datos"][$j]["value"]; ?>
                            </a>
                        </li>
                        <?php
                    }
                    echo '</ul>';
                    echo "</li>";
                }
                ?>
            </ul><!-- /.nav-list -->

            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
            </div>

            <script type="text/javascript">
                try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
            </script>
        </div>