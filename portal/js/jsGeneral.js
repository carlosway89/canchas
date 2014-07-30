var ruta=window.location.host+"/canchas";
var pathname = window.location.pathname;

function msjCargando(){
    $('#mensajecarga').html('<div class="sms_carga"><center><br/><p><img  src="http://'+ruta+'/intranet/img/cargando.gif" /><h2 class="color_negro">Espere un Momento...</h2></p></center></div>');  
    document.getElementById("mensajecarga").style.opacity="0.6";  
    document.getElementById("mensajecarga").style.background="white";  
    document.getElementById("mensajecarga").style.visibility="visible";
}
 
function set_Date(cNotFecha, tipo){
    if(tipo=='NA'){//El datepicker 
        var c = new Date();
    
        var year_actual=c.getFullYear();
        var year=year_actual + 20;
        $("#"+cNotFecha).datepicker({
            changeYear: true,
            changeMonth: true,
            closeText: 'Cerrar',
            prevText: '&#x3c;Ant',
            nextText: 'Sig&#x3e;',
            currentText: 'Hoy',
            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
            dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
            dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
            weekHeader: 'Sm',
            dateFormat: 'dd/mm/yy',
            yearRange: "1935:"+year+"",
            firstDay: 0,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ''
        });
    }
    
    
    var f = new Date();
    
    var yearactual=f.getFullYear();
    $("#"+cNotFecha).datepicker({
        changeYear: true,
        changeMonth: true,
        closeText: 'Cerrar',
        prevText: '&#x3c;Ant',
        nextText: 'Sig&#x3e;',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        dateFormat: 'dd/mm/yy',
        firstDay: 0,
        yearRange: "1935:"+yearactual+"",
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    });
    $("#"+cNotFecha).attr("readonly", true); //inhabilita las cajas de texto
}

function ValidarRangoFechas(cNotFechaInicial, cNotFechaFinal, dateFormat){
    var formatoFecha = dateFormat == undefined ? "dd/mm/yy" : dateFormat;
    var dates = $( "#"+cNotFechaInicial+", #"+cNotFechaFinal+"" ).datepicker({
        changeYear: true,
        changeMonth: true,
        closeText: 'Cerrar',
        prevText: '&#x3c;Ant',
        nextText: 'Sig&#x3e;',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: formatoFecha,
        firstDay: 0,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: '',
        yearRange:'1970:2050',
        onSelect: function( selectedDate ) {
            var option = this.id == ""+cNotFechaInicial+"" ? "minDate" : "maxDate",
            instance = $( this ).data( "datepicker" ),
            date = $.datepicker.parseDate(
                instance.settings.dateFormat ||
                $.datepicker._defaults.dateFormat,
                selectedDate, instance.settings );
            dates.not( this ).datepicker( "option", option, date );
        }
    });
    $("#"+cNotFechaInicial).attr("readonly", true); 
    $("#"+cNotFechaFinal).attr("readonly", true); 
//    var myDate = new Date();
//    $("#"+cNotFechaInicial).datepicker('setDate',myDate);
}

function set_time(){
    $('.timepicker').timepicker({
        minuteStep: 5,
        modalBackdrop:true
    });
}



function hasEventListener(element, eventName, namespace) {
    var returnValue = false;
    var events = $(element).data("events");
    if (events) {
        $.each(events, function (index, value) {
            if (index == eventName) {
                if (namespace) {
                    $.each(value, function (index, value) {
                        if (value.namespace == namespace) {
                            returnValue = true;
                            return false;
                        }
                    });
                }
                else {
                    returnValue = true;
                    return false;
                }
            }
        });
    }
    return returnValue;
}

/* CREADOR DE DATA-TABLES - CONSTRUYE UNA GRILLA PAGINADA */
function paginaDataTable(dataTable) {
    // definiciones por defecto  
    dataTable["ordenaPor"] = (dataTable["ordenaPor"] != undefined) ? dataTable["ordenaPor"] : [[0,"desc"]]; 
    dataTable["desactOrdenaEn"] = (dataTable["desactOrdenaEn"] != undefined) ? dataTable["desactOrdenaEn"] : [];
    dataTable["filsXpag"] = ( dataTable["filsXpag"] != undefined) ?  dataTable["filsXpag"] : 10;
    dataTable["JQueryUI"] = (dataTable["JQueryUI"] != undefined) ? dataTable["JQueryUI"] : true;
    dataTable["functions"] = (dataTable["functions"] != undefined) ? dataTable["functions"] : "";
    
    // funcionalidad js           
    $("#"+dataTable["tabla"]+"").dataTable({
        "bJQueryUI"             :     dataTable["JQueryUI"],
        "iDisplayLength"        :     dataTable["filsXpag"],
        "oLanguage"             :     {
            "sEmptyTable"       :     "Tabla sin data disponible",
            "sInfo"             :     "Mostrando desde _START_ hasta _END_ de _TOTAL_ registros",
            "sInfoEmpty"        :     "Mostrando desde 0 hasta 0 de 0 registros",
            "sInfoFiltered"     :     "(filtrado de _MAX_ registros en total)",
            "sInfoPostFix"      :     "",
            "sInfoThousands"    :     ",",
            "sLengthMenu"       :     "Mostrar _MENU_ registros",
            "sLoadingRecords"   :     "Cargando...",
            "sProcessing"       :     "Procesando...",
            "sSearch"           :     "Buscar:",
            "sZeroRecords"      :     "No se encontraron resultados",
            "oPaginate"         :     {
                "sFirst"        :     "Primero",
                "sLast"         :     "Último",
                "sNext"         :     "Siguiente",
                "sPrevious"     :     "Anterior"
            },
            "sPaginationType": "bootstrap",
            "oAria"             : {
                "sSortAscending"    :     ": activar para Ordenar Ascendentemente",
                "sSortDescending"   :     ": activar para Ordendar Descendentemente"
            }
        },
        "fnDrawCallback": function(oSettings) {
            eval(dataTable["functions"]); // funcion ejecutada cuando cambia pagina
        },
        "aoColumnDefs"          :       [{            
            "aTargets"          :       dataTable["desactOrdenaEn"], // desactivar ordenamiento en cols... 
            "bSortable"         :       false     
        }],    
        "aaSorting"             :       dataTable["ordenaPor"]  
    });
}

/* CREA AUTOCOMPLETE - en evaluacion*/
function creaAutocomplete(autocomplete){
    $("#"+autocomplete["value"]+"").autocomplete({
        source: autocomplete["url"],
        minLength: 3,
        select: function(event, ui){            
            $("#"+autocomplete["id"]+"").val(ui.item.id);
            if (autocomplete["funcion"] != undefined) eval (autocomplete["funcion"]);                  
        }
    }); 
} 

/* LIMPIA UN FORMULARIO */
function limpiarForm(obj) {
    // enaviar asi: limpiarForm('#miForm');
    $(':input', $(obj)).each(function() {
        var type = this.type;
        var tag = this.tagName.toLowerCase();      
        if (type == 'text' || type == 'password' || tag == 'textarea' || type == 'hidden')
            this.value = '';       
        else if (type == 'checkbox' || type == 'radio')
            this.checked = false;
        else if (tag == 'select')
            this.selectedIndex = 0; //-1
    });
}


/* MASCARAS */
function mascaraCelular(obj){
    $(obj).mask("999-999-999");
}

function mascaraTelefono(obj){
    $(obj).mask("(999) 999999");
}

/* MENSAJERIA */

function msgLoading(obj,msg){
    if(msg == undefined){
        $(obj).html("<div id='msg_loading' style='color:#2D91D4;font-size:0.75em'><img src='http://"+ruta+"/intranet/img/loading.gif'/>&nbsp;Cargando ... por favor espere.</div>");
    }else{
        $(obj).html("<div id='msg_loading' style='color:#2D91D4;font-size:0.75em'><img src='http://"+ruta+"/intranet/img/loading.gif'/>&nbsp;"+" "+msg+"</div>");
    }
}

function msgAviso(obj,msg){ 
    if(msg == undefined){
        $(obj).html("<section class='infobox'><p>No se encontraron registros</p></section>");
    }else{
        $(obj).html("<section class='infobox'><p>"+msg+"</p></section>");
    }
}

function msgExito(obj,msg){ 
    if(msg == undefined){
        $(obj).html("<div id='msg_exito' class='alert alert-success'><span class='ui-icon ui-icon-check' style='float: left; margin-right: .3em;'></span> <strong>¡Bien! ... </strong> Operacion realizada exitosamente.</div>");
    }else{
        $(obj).html("<div id='msg_exito' class='alert alert-success'><span class='ui-icon ui-icon-check' style='float: left; margin-right: .3em;'></span> <strong>¡Bien! ... </strong> "+msg+"</div>");
    }
}

// mensaje de informacion con opcion de cerrarlo desde una X
function msgInfo(obj,msg){ 
    if(msg == undefined){
        $(obj).html('<div id="msg_information"><div class="alert alert-info alert-block"><h4 class="alert-heading"><span class="ui-icon ui-icon-flag" style="float: left; margin-right: .3em;margin-left: 0"></span>Informaci&oacute;n !</h4>No se encontraron registros.</div></div>');
    }else{
        $(obj).html('<div id="msg_information"><div class="alert alert-info alert-block"><h4 class="alert-heading"><span class="ui-icon ui-icon-flag" style="float: left; margin-right: .3em;margin-left: 0"></span>Informaci&oacute;n !</h4>'+msg+'</div></div>');
    }
}

function msgError(obj,msg){ 
    if(msg == undefined){
        $(obj).html("<div id='msg_error' class='alert alert-error'><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span> <strong>¡Error! ... </strong> Ha ocurrido un error, vuelva a intentarlo.</div>");
    }else{
        $(obj).html("<div id='msg_error' class='alert alert-error'><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span> <strong>¡Error! ... </strong> "+msg+"</div>");
    }
}

function msgAlerta(obj,msg){ 
    $(obj).html("<div id='msg_alert'  class='alert'><strong>¡Cuidado! ... </strong> "+msg+"</div>");
}

function msgLoadSave(obj,btn){ //preload al costado del boton
    $(btn).attr("disabled", "true");
    $(obj).html("<div id='msg_saving' style='display:inline;'><img src='http://"+ruta+"/intranet/img/loading.gif'/></div>");
}

function msgLoadSaveRemove(btn){
    $("#msg_saving").remove()
    $(btn).removeAttr("disabled");
}

function initEvtClosePopup(objCerrar,ObjPopup){
    $(objCerrar).click(function(){
        $(ObjPopup).dialog("close");   
    })    
}

function deshabilitaPegar(obj){
    $(obj).keydown(function(event) {
        var teclasNoPermitidas = new Array('c', 'x', 'v');
        var keyCode = (event.keyCode) ? event.keyCode : event.which;
        var esCtrl;
        esCtrl = event.ctrlKey
        if (esCtrl) {
            for (i = 0; i < teclasNoPermitidas.length; i++) {
                if (teclasNoPermitidas[i] == String.fromCharCode(keyCode).toLowerCase()) {                    
                    return false;              
                }
            }
        }
        return true;
    });
    
    $(obj).bind('contextmenu', function(e){
        return false;
    }); 
}

function ValidaCKEditor(IdTextArea){
    CKEDITOR.instances[IdTextArea].updateElement();
}


function NewCKEditor(IdTextArea){
    //CKEditor
    var instance = CKEDITOR.instances[IdTextArea];
    if (instance) {
        CKEDITOR.remove(CKEDITOR.instances[IdTextArea]);
    }
    $( '#'+IdTextArea ).ckeditor({
        toolbar : 'Full',//CKEditorBasic sirve para poner la barra de botones en basica
        removePlugins : 'resize' //,
    //        height:'120px'
    });
//CKEditor
}

function ClearCKEditor(IdTextArea){
    var editor = CKEDITOR.instances[IdTextArea];
    if (editor) {
        editor.destroy(true);
    }
    //    CKEDITOR.replace(IdTextArea);
    NewCKEditor(IdTextArea)
}

function CKupdate(IdTextArea){
    var instance = CKEDITOR.instances[IdTextArea];

    for ( instance in CKEDITOR.instances )
        CKEDITOR.instances[instance].updateElement();
    CKEDITOR.instances[instance].setData('');
}

function MostrarOcultarCapas(ObjOcultar,ObjMostrar,fnOcultar,fnMostrar){
    $(ObjOcultar).hide('slide',100,function(){
        $(".tooltip").removeClass("in");
        $(".tooltip").addClass("out");        
        eval(fnOcultar);
    });
    $(ObjMostrar).show('slide',1000,function(){
        $(".tooltip").removeClass("in");
        $(".tooltip").addClass("out");
        eval(fnMostrar);
    });        
}

function cleanForm(objForm){
    $(':input',objForm)
    .not(':button, :submit, :reset, :hidden')
    .val('')
    .removeAttr('checked')
    .removeAttr('selected');    
}

// funcion para ocultar la gria cuando no hay datos
function hide_grid(grid_name,div_content,msg){
    var n = parseInt($("#"+grid_name).getGridParam("records"));
    if (isNaN(n) || n == 0) {
        if(msg==undefined)
            msgAviso("#"+div_content);
        else if(msg=="")
            $("#"+div_content).html(""); 
        else
            msgAviso("#"+div_content,msg);
    }
    $("#"+div_content).show();
}

function hide_grid_eval(grid_name,msg){
    var n = parseInt($("#"+grid_name).getGridParam("records"));
    var div_content = $("#gbox_"+grid_name).parent('div');
    if (isNaN(n) || n == 0) {
        if(msg==undefined)
            msgAviso(div_content);
        else if(msg=="")
            $(div_content).html(""); 
        else
            msgAviso(div_content,msg);
    }
    $(div_content).show();
}

function ver_libro(url, div, datos) {
    msgLoading("#" + div);
    $.ajax({
        type: "POST",
        url: url,
        cache: false,
        data: {
            json: datos
        },
        success: function(data) {
            if (data.trim() == 2){
                msgAviso("#" + div, "No se han encontrado registros");
            }
            else{
                $("#" + div).html(data);
                $(".preloading").html("");
            }
        },
        error: function() {
            alert("error");
        }
    });
}

function initCleanTags(clase_icon){
    $(".ui-icon-"+clase_icon).each(function(){
        var fila =$(this).parents('tr');
        var texto=$(fila).find("td:eq(2)").html();
        $(fila).find("td:eq(2)").text(texto.replace(/(?:<(?:script|style)[^>]*>[\s\S]*?<\/(?:script|style)>|<[!\/]?[a-z]\w*(?:\s*[a-z][\w\-]*=?[^>]*)*>|<!--[\s\S]*?-->|<\?[\s\S]*?\?>)[\r\n]*/gi, ''));

    }); 
}

          