opacity = 0;

$(function(){
    $("#searchTBox").keyup(function(){
        if ($(this).val().length > 2){
            $.ajax({
                url: 'filterProvince.php',
                data: {'inputText' : $(this).val()},
                success: function(response){
                    opacity = 0;  
                    $("#li-left").html('');
                    for(var i= 0; i< response.length; i++){ 
                        prov= response[i];
                        $("#li-left").append('<li class="li-effect" data-idp="'+prov.id+'">'+prov.name+'<\li>');
                        console.log(prov);
                        
                      
                    }
                    alphaEffect('li-left');
                   
               
                 }});
        }   
    });
});

$(function(){
    $("#li-left").on('mouseup','li', function(){
        //alert($(this).data('idp'));
        
        $.ajax({
                url: 'showCities.php',
                data: {'idprov' : $(this).data("idp")},
                success: function(response){
                    
                    opacity = 0;
                    $("#li-right").html('');
                    alphaEffect('li-right');
                    //console.log(response);
                    for(var i= 0; i< response.length; i++){ 
                        
                        $("#li-right").append('<li class="li-effect">'+response[i]+'<\li>');
                        //console.log(response[i]);
                      
                    }}});
                    alphaEffect('li-right');
        
        
    });
});



function alphaEffect(Element){ 
    var div = document.getElementById(Element);
    opacity = opacity + .09; 
    div.style.opacity = opacity; 
    if(opacity > 0 && opacity < 1){ 
        window.setTimeout("alphaEffect('"+Element+"');",100); }
}
    
