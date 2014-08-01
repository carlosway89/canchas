var ruta=window.location.host+"/canchas";
var pathname = window.location.pathname;

function msjCargando(){
    $('#mensajecarga').html('<div class="sms_carga"><center><br/><p><img  src="http://'+ruta+'/portal/img/cargando.gif" /><h2 class="color_negro">Espere un Momento...</h2></p></center></div>');  
    document.getElementById("mensajecarga").style.opacity="0.6";  
    document.getElementById("mensajecarga").style.background="white";  
    document.getElementById("mensajecarga").style.visibility="visible";
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
        $(obj).html("<div id='msg_loading' style='color:#2D91D4;font-size:0.75em'><img src='http://"+ruta+"/portal/img/loading.gif'/>&nbsp;Cargando ... por favor espere.</div>");
    }else{
        $(obj).html("<div id='msg_loading' style='color:#2D91D4;font-size:0.75em'><img src='http://"+ruta+"/portal/img/loading.gif'/>&nbsp;"+" "+msg+"</div>");
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
    $(obj).html("<div class='alert-box warning'><p><strong>Cuidado!</strong> "+msg+"</p><i class='icons icon-alert'></i></div>");
}

function msgLoadSave(obj,btn){ //preload al costado del boton
    $(btn).attr("disabled", "true");
    $(obj).html("<div id='msg_saving' style='display:inline;'><img src='http://"+ruta+"/portal/img/loading.gif'/></div>");
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

          