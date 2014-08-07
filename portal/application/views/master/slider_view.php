<!-- Revolution Slider -->
<div class="tp-banner-container main-revolution">
    <span class="Apple-tab-span"></span>
    <div class="tp-banner">
        <ul>
            <?php 
            for($i=0;$i<count($list_publicidad);$i++) { 

                if($list_publicidad[$i]['cMultTitulo']=='principal'){
                    ?>
            <li data-transition="papercut" data-slotamount="7">
                <img src="<?= $list_publicidad[$i]['cMultLink']; ?>" alt="solocanchas.com">
            </li>
            <?php 
                }
            }
            ?>
        </ul>
    </div>
</div>
<!-- /Revolution Slider -->