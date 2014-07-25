$(function(){
                                         
    get_fixture(); 
});

var link_host="../intranet/fixture/get_externo";
function get_fixture(){
    $.ajax({
        type: "GET",
        url: link_host,
        cache: false,
        success: function(data) {
            $('#fixture_content').empty();
            $('#fixture_content').html(data);
            data_process();
        },
        error: function() { 
            $('#fixture_content').html('<div class="text-warning"><h4>Disculpe!!</h4><br>No hay informacion por el momento</div>');
            
        }              
    });
}

function data_process(){
    var fixture=$('#fixture_content');
    fixture.find('div.ui-arrows').remove();
    fixture.find('h3.caption').remove();
    fixture.find('div.clear').remove();
    fixture.find('div.botonera').remove();
    fixture.find('[id^=panel-goleadores]').remove();
    var data=fixture.find('div.ui-inner').html();
    
        
    $('#fixture_content').empty();
    $('#fixture_content').html(data);

    fixture.find('div.ui-item').addClass('hidden'); 
    fixture.find('div.ui-item:first-child').removeClass('hidden');
    fixture.find('[id^=panel-calendario]').removeClass('ui-active');
    fixture.find('[id^=panel-clasificacion]').addClass('hidden');
    
    

}
