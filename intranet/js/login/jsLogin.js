$(function(){
    $(".forgot-password-link").bind('click', function(event){   
        $("#frm_upd_recu_clave").data('validator').resetForm();
        show_box('forgot-box');
        return false;
    });
    
    $(".user-signup-link").bind('click', function(event){   
        limpiarForm("#frm_ins_register_user");
        show_box('signup-box');
        return false;
    });
    
    $(".back-to-login-link").bind('click', function(event){   
        $("#frm_ins_login").data('validator').resetForm();
        show_box('login-box');
        return false;
    });
});

function show_box(id) {
    jQuery('.widget-box.visible').removeClass('visible');
    jQuery('#'+id).addClass('visible');
}