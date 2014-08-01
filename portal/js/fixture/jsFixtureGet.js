$(function(){
                                         
    get_envivo();

    $('#link-noticias').on('click',function(){
        $('[id^=link-]').removeClass('active');
        $(this).addClass('active');
        $('#noticias-resultados').fadeIn();
        $('#fixture_content_show').fadeOut();

    });
    $('#link-posiciones').on('click',function(){
        get_posiciones();
        $('#fixture_content_show').fadeIn();
        $('#noticias-resultados').fadeOut();
        $('[id^=link-]').removeClass('active');
        $(this).addClass('active');

    });
    $('#link-goleadores').on('click',function(){
        get_goleadores();
        $('#fixture_content_show').fadeIn();
        $('#noticias-resultados').fadeOut();        
        $('[id^=link-]').removeClass('active');
        $(this).addClass('active');
    });
    $('#link-calendario').on('click',function(){
        get_calendario();
        $('#fixture_content_show').fadeIn();
        $('#noticias-resultados').fadeOut(); 
        $('[id^=link-]').removeClass('active');
        $(this).addClass('active');
    });
    $('#link-resultados').on('click',function(){
        get_resultados();
        $('#fixture_content_show').fadeIn();
        $('#noticias-resultados').fadeOut();
        $('[id^=link-]').removeClass('active');
        $(this).addClass('active');
    });



    
    
    
});

var link_host="http://localhost/canchas/portal/fixture";

function acciones(){

    

    $('a#previo-paginador,a#next-paginador').on('click',function(){
        var id=$(this).attr('value-data');
        
        console.log(id);
        if (window.location.hash=='#resultados') {
            get_resultados(id);
        }else{
            get_calendario(id);
        }

    });
    $('#fecha-selector').on('change',function(){            
        var id=$(this).val();

        if (window.location.hash=='#resultados') {
            get_resultados(id);
        }else{
            get_calendario(id);
        }
        
    });

    setTimeout(function(){

        $('.link-resultado').on('click',function(){
            get_resultados();
            $('#fixture_content_show').fadeIn();
            $('#noticias-resultados').fadeOut();
            $('[id^=link-]').removeClass('active');
            $(this).addClass('active');
        });

    },300);

    


}

function carga_loader(){
    $('#fixture_content_show').empty();
    $('#fixture_content_show').html('<div id="loader_image" class="text-center"><img src="http://solocanchas.com/portal/img/cargando.gif" class="img_loader" style="height: 50px;" /><br/>Cargando..</div>');
}
function carga_envio(){
    $('#resultados-envivo').empty();
    $('#resultados-envivo').html('<div id="loader_image" class="text-center"><img src="http://solocanchas.com/portal/img/cargando.gif" class="img_loader" style="height: 25px;" />Cargando Resultados en vivo..</div>');
}
function get_envivo(){

    carga_envio();
    $.ajax({
        type: "GET",
        url: link_host+"/get_envivo",
        cache: false,
        success: function(data) {

            $('#resultados-envivo').empty();
            $('#resultados-envivo').html(data);

            data_process_envivo();
        },
        error: function() { 
            alert("error");
        }              
    });

}
function get_goleadores(){
    carga_loader();
    $.ajax({
        type: "GET",
        url: link_host+"/get_goleadores",
        cache: false,
        success: function(data) {
            $('#fixture_content_show').empty();
            $('#fixture_content_show').html(data);

            data_process_goleadores();
        },
        error: function() { 
            alert("error");
        }              
    });
}

function get_posiciones(){
    carga_loader();
    $.ajax({
        type: "GET",
        url: link_host+"/get_posiciones",
        cache: false,
        success: function(data) {
            $('#fixture_content_show').empty();
            $('#fixture_content_show').html(data);

            data_process_posiciones();
        },
        error: function() { 
            alert("error");
        }              
    });
}

function get_calendario(id_fecha){
    var id_fecha=id_fecha?id_fecha:'';
    carga_loader();
    $.ajax({
        type: "GET",
        url: link_host+"/get_calendario/"+id_fecha,
        cache: false,
        success: function(data) {
            $('#fixture_content_show').empty();
            $('#fixture_content_show').html(data);

            data_process_calendario();
        },
        error: function() { 
            alert("error");
        }              
    });
}
function get_resultados(id_fecha){

    var id_fecha=id_fecha?id_fecha:'';
    carga_loader();
    $.ajax({
        type: "GET",
        url: link_host+"/get_resultado/"+id_fecha,
        cache: false,
        success: function(data) {
            $('#fixture_content_show').empty();
            $('#fixture_content_show').html(data);

            data_process_resultados();
        },
        error: function() { 
            alert("error");
        }              
    });
}
function data_process_envivo(){
    var resultados=$('#resultados-envivo');
    var tabla=resultados.find('#slider-partido-agenda');
    tabla.find('a').attr('href','#resultados');
    tabla.find('a').addClass('link-resultado');
    tabla.find('a:nth-child(4)').remove();
    var data=tabla.html();
    $('#resultados-envivo').html(data);
    acciones();

}
function data_process_posiciones(){
    var fixture=$('#fixture_content_show');
    var tabla=fixture.find('.tbl-clasificacion');
    var img=tabla.find('img');

    img.each(function() {
        var src=$(this).attr('src');
        src=src.replace('/f/i/escudos/20x20/','');
        $(this).attr('src','http://solocanchas.com/portal/img/escudos/'+src);
    });

    
    var data=tabla.html();
    $('#fixture_content_show').html("<div class='side-segment'><h3 class='animate-onscroll no-margin-top'><i class='icons icon-news'></i> Tabla de Posiciones</h3></div><table class='tabla-fixture'>"+data+"</table><br></br>");


}

function data_process_goleadores(){
    var fixture=$('#fixture_content_show');
    var tabla=fixture.find('.tbl-clasificacion');
    var select=fixture.find('div.pull-right').html();

    var data=tabla.html();
    $('#fixture_content_show').html("<div class='side-segment'><h3 class='animate-onscroll no-margin-top'><i class='icons icon-news'></i> Tabla de Goleadores</h3></div><table class='tabla-fixture'>"+data+"</table><br></br>");
    

}

function data_process_resultados(){
    var fixture=$('#fixture_content_show');
    var tabla=fixture.find('.tbl-clasificacion');
    var img=tabla.find('img');
    var ul=fixture.find('ul.pager').html();
    var select=fixture.find('div.pull-right>select').html();

    img.each(function() {
        var src=$(this).attr('src');
        src=src.replace('/f/i/escudos/20x20/','');
        $(this).attr('src','http://solocanchas.com/portal/img/escudos/'+src);
    });


    var data=tabla.html();

    $('#fixture_content_show').html("<div class='side-segment'><h3 class='animate-onscroll no-margin-top'><i class='icons icon-news'></i> Tabla de Resultados</h3></div><ul class='paginador-fixture list-inline'>"+ul+"</ul><br/><table class='tabla-fixture'>"+data+"</table><br><div class='pull-right'><select id='fecha-selector' class='form-control'>"+select+"</select></div><br></br>");

    var uri='http://depor.pe/estadisticas/peru/resultados/';
    var link_prv=fixture.find('.previous>a');
    var link_next=fixture.find('.next>a');
    
    var href_link=link_prv.attr('href');
    href_link=href_link.replace(uri,'');

    link_prv.attr('value-data',href_link);
    link_prv.attr('href','javascript:;');
    link_prv.attr('id','previo-paginador');

    href_link=link_next.attr('href');
    href_link=href_link.replace(uri,'');

    link_next.attr('value-data',href_link);
    link_next.attr('href','javascript:;');
    link_next.attr('id','next-paginador');

    acciones();
}
function data_process_calendario(){
    var fixture=$('#fixture_content_show');
    var tabla=fixture.find('.tbl-clasificacion');
    var img=tabla.find('img');
    var ul=fixture.find('ul.pager').html();
    var select=fixture.find('div.pull-right>select').html();
    

    img.each(function() {
        var src=$(this).attr('src');
        $(this).attr('src','http://depor.pe'+src);
    });


    var data=tabla.html();

    $('#fixture_content_show').html("<div class='side-segment'><h3 class='animate-onscroll no-margin-top'><i class='icons icon-news'></i> Calendario</h3></div><ul class='paginador-fixture list-inline'>"+ul+"</ul><br/><table class='tabla-fixture'>"+data+"</table><br><div class='pull-right'><select id='fecha-selector' class='form-control'>"+select+"</select></div><br></br>");

    var uri='http://depor.pe/estadisticas/peru/calendario/';
    var link_prv=fixture.find('.previous>a');
    var link_next=fixture.find('.next>a');

    var href_link=link_prv.attr('href');
    href_link=href_link.replace(uri,'');

    link_prv.attr('value-data',href_link);
    link_prv.attr('href','javascript:;');
    link_prv.attr('id','previo-paginador');

    href_link=link_next.attr('href');
    href_link=href_link.replace(uri,'');

    link_next.attr('value-data',href_link);
    link_next.attr('href','javascript:;');
    link_next.attr('id','next-paginador');


    acciones();

    
}


