<div class="sidebar-box white animate-onscroll">
                    <div class="side-segment">
                        <h3><i class="icons icon-calendar"></i> Últimos Eventos</h3>
                    </div>
                    <ul class="upcoming-events">

                        <?php

                        for($i=0;$i<3;$i++) { 
                            ?>
                        <!-- Event -->
                        <li>
                            <div class="date">
                                <span>
                                    <span class="day"><?=date("d",strtotime($list_eventos[$i]['dEveStartTime']));?></span>
                                    <span class="month"><?=date("M",strtotime($list_eventos[$i]['dEveEndTime']));?></span>
                                </span>
                            </div>

                            <div class="event-content">
                                <h6><a href="<?php echo URL_MAIN ?>eventos/mostrar/<?=$list_eventos[$i]['nEveID']?>"><?=$list_eventos[$i]['cEveTitulo']?></a></h6>
                                <ul class="event-meta">
                                    <li><i class="icons icon-clock"></i> <?=date("H:i",strtotime($list_eventos[$i]['dEveStartTime']));?> - <?=date("H:i",strtotime($list_eventos[$i]['dEveEndTime']));?></li>
                                    <li><i class="icons icon-location"></i><?=$list_eventos[$i]['cEveDireccion']?></li>
                                </ul>
                            </div>
                        </li>
                        <!-- /Event -->
                        <?php }?>

                    </ul>
                    <a href="<?=URL_MAIN?>eventos" class="button transparent button-arrow">Más eventos</a>
                </div>