<script type="text/javascript">


var data_filtro=0;
var owl;
function clicked(event){

    console.log('clicked by filtro');
    var link=$(event.currentTarget).find('a');
    var departamento=link.attr('data-value-dep');
    var provincia=link.attr('data-value-pro');
    var distrito=link.attr('data-value-dis');

    $("#filtro-seleccionado").owlCarousel();
    owl = $("#filtro-seleccionado").data('owlCarousel');    
    $('#filtro-seleccionado>.owl-wrapper-outer').remove();

    get_canchas(departamento,provincia,distrito);

}

function carga_loader(){
    $('#filtro-seleccionado').html('<div id="loader_image" class="text-center"><img src="http://solocanchas.com/portal/img/cargando.gif" class="img_loader" style="height: 50px;" /><br/>Cargando..</div>');
}

function get_canchas(departamento,provincia,distrito){

    carga_loader();

    $.ajax({
        type: "POST",
        url: "<?=URL_MAIN?>canchas/busqueda_filtros/"+departamento+"/"+provincia+"/"+distrito,
        cache: false,
        dataType: "json",
        data: {
        },
        success: function(data) {

            data_filtro=data;

            $(document).trigger('mostrar-filtro');


        },
        error: function() { 
            alert("error");
        }              
    });

}
</script>

<div class="owl-carousel-container">
    <div class="owl-header">
        <div class="side-segment">
            <h3 class="animate-onscroll">
                <i class="icons icon-star"></i>Ciudades mas buscadas
            </h3>
        </div>

        <div class="carousel-arrows animate-onscroll">
            <span class="left-arrow"><i class="icons icon-left-dir"></i></span>
            <span class="right-arrow"><i class="icons icon-right-dir"></i></span>
        </div>
    </div>
    <div class="owl-header tab-filtro-ciudad">
                    
        <!-- Tabs -->
        <div class="tabs">
            
            <div class="tab-header">
                <ul>
                    <li onClick="clicked(event);"><a class="link-filtros" href="#trujillo" data-value-dep="13" data-value-pro="1" data-value-dis="1350" ><h6>Trujillo</h6></a></li> 
                    <li onClick="clicked(event);"><a class="link-filtros" href="#piura" data-value-dep="20" data-value-pro="1" data-value-dis="1752" ><h6>Piura</h6></a></li>
                    <li onClick="clicked(event);"><a class="link-filtros" href="#lima" data-value-dep="15" data-value-pro="1" data-value-dis="1510" ><h6>Lima</h6></a></li>
                    <li onClick="clicked(event);"><a class="link-filtros" href="#chimbote" data-value-dep="2" data-value-pro="18" data-value-dis="1" ><h6>Chimbote</h6></a></li>
                    <li onClick="clicked(event);"><a class="link-filtros" href="#chiclayo" data-value-dep="14" data-value-pro="1" data-value-dis="1433" ><h6>Chiclayo</h6></a></li>
                    <li onClick="clicked(event);"><a class="link-filtros" href="#cajamarca" data-value-dep="4" data-value-pro="1" data-value-dis="553"  ><h6>Arequipa</h6></a></li>                    
                                                         
                </ul>
            </div>
            <br>  

        </div>
        <!-- /Tabs -->                  
    </div>
    <div id="filtro-seleccionado" class="owl-carousel" data-max-items="3">

        <?php 
        //$canchas_filtro="<script> document.write(data_canchas) </script>";
        foreach ($canchas_filtro as $canchas_filtro) { ?>
            <?php $url_nombre_cancha = replace_caracteres_raros($canchas_filtro->cCanNombre); ?>
            <!-- Owl Item -->
            <div>
                <!-- Cancha Item -->
                <div class="blog-post animate-onscroll">
                    <div class="post-image">
                        <a href="<?php echo URL_MAIN; ?>canchas/informacion/<?php echo $url_nombre_cancha . "_" . $canchas_filtro->nCanID; ?>" target="_blank">
                            <img src="<?php echo $canchas_filtro->cCanFotoPortada; ?>" alt="solocanchas.com">
                        </a>
                    </div>

                    <h4 class="post-title">
                        <a href="<?php echo URL_MAIN; ?>canchas/informacion/<?php echo $url_nombre_cancha . "_" . $canchas_filtro->nCanID; ?>" target="_blank">
                           <?php echo $canchas_filtro->cCanNombre; ?>
                        </a>
                    </h4>

                    <p>
                        <i class="icons icon-location"></i> Dirección: <?php echo $canchas_filtro->direccion; ?>
                    </p>
                    <p>
                        <i class="icons icon-home"></i> <?php echo $canchas_filtro->provincia; ?>, <?php echo $canchas_filtro->departamento; ?>
                    </p>
                    <p>
                        <i class="icons icon-phone"></i> Teléfono: <?php echo $canchas_filtro->telefono; ?>
                    </p>
                    <p>
                        <i class="icons icon-flag-1"></i> Canchas:  <?php echo $canchas_filtro->nro_canchas; ?>
                    </p>
                    <?php 
                        if ($menu_home=='canchas') {

                    ?>
                    <a class="button donate btn_reservar fancybox media-icon" href="#modal-cancha-reservar-<?=$canchas_filtro->nCanID?>" ><i class="icons icon-right-hand"></i> Reservar</a>
                    <?php }?>
                </div>
                <!-- /Cancha Item -->
                
                <!-- modal para reservar por Item-->
                <div id="modal-cancha-reservar-<?=$canchas_filtro->nCanID?>" style="width: 850px;height:550px;display: none;">
                    <?php 

                    $nCanEnlace=$canchas_filtro->nCanEnlace;

                    if(empty($nCanEnlace)){?>
                    <h3>Lo sentimos!!!</h3>
                    <div class="alert alert-warning">
                        Esta cancha aún no esta habilitada para reservas.
                    </div>
                    <?php 
                    }
                    else{?>
                    <iframe src="http://solocanchas.com/WebCanchas/frmReserva.aspx?IdEmpresa=<?=$nCanEnlace?>" width="100%" height="100%">
                    </iframe>
                    <?php
                    }
                    ?>
                </div>
                <!-- /modal reservar-->

            </div>
            <!-- /Owl Item -->
            
        <?php } ?>


        

    </div>
</div>


<script type="text/javascript">

    $(document).on('mostrar-filtro',function(){

         _.templateSettings.variable = "can"; 

        var url_template='<?URL_MAIN?>tmpls/canchas_filtro.html';

        $.ajax({
            url:      url_template,
            dataType: 'html',
            type:     'GET',
            async:    false,
            cache:    true
        }).done(function(html) {

            var template = _.template(html);

            $('#filtro-seleccionado').empty();        
            if (data_filtro==0) {
                $('#filtro-seleccionado').html('<div class="owl-item" style="width: 100%;"><div class="alert alert-info">No hay Canchas Disponibles</div></div><br></br>');
            }else{
                $.each(data_filtro,function(index,data){
                    owl.addItem(template(data) ,index);                    
                });
            }

        });         

    })
        
</script>

