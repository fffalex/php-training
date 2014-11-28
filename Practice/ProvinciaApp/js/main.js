opacity = 0;
counter = 0;
counter2 = 0;

//Funcion que busca en la DB las provincias que comiencen con el string ingresado por textbox
$(function(){
    $("#searchTBox").keyup(function(){
        inputString = $(this).val();
        if ( inputString.length > 2){
            $.ajax({
                url: 'filterProvince.php',
                data: {'inputText' :  inputString},
                success: function(response){
                    opacity = 0;
                    counter = 0;
                    $("#li-right").html('');
                    $("#li-left").html('');
                    
                    if (response.length == 0){
                         $("#li-left").append('<li class="found">No provinces found<\li>');
                         $("#panda-helper").css('background-image','url("img/panda2.png")');
                    }else{
                        for(var i= 0; i< response.length; i++){ 
                            prov= response[i];
                            $("#li-left").append('<li class="li-effect province" data-idp="'+prov.id+'"><b>'
                                    +inputString+'</b>'+prov.name.substring(inputString.length)+'<\li>');
                            console.log(prov);
                            counter += 1;
                            }
                            $("#panda-helper").css('background-image','url("img/panda3.png")');
                    }
                    $("#li-left").append('<li class="found"> Found: '+counter+'<\li>');       
                    alphaEffect('li-left');

                 }});
        }else {
           $("#li-left").html('');
           $("#li-right").html('');
           
           $("#panda-helper").css('background-image','url("img/panda1.png")');
            
        }  
    });
});

//Funcion que muestra la lista de ciudades asociadas a la provincia clickeada
$(function(){
    $("#li-left").on('mouseup','li.province', function(){
        
        $.ajax({
                url: 'showCities.php',
                data: {'idprov' : $(this).data("idp")},
                success: function(response){
                    $("#panda-helper").css('background-image','url("img/panda4.png")');
                    opacity = 0;
                    counter2 = 0 ;
                    $("#li-right").html('');
                    alphaEffect('li-right');
                    //console.log(response);
                    for(var i= 0; i< response.length; i++){ 
                        
                        $("#li-right").append('<li class="li-effect city">'+response[i]+'<\li>');
                        counter2 += 1;
                      
                    }
                    $("#li-right").append('<li class="found"> Total: '+counter2+'<\li>');
                    alphaEffect('li-right');
                }});
                    
                    
        
        
    });
});


//Funcion que realiza el efecto de aparicion a traves de la opacidad mediante js
function alphaEffect(Element){ 
    var div = document.getElementById(Element);
    opacity = opacity + .09; 
    div.style.opacity = opacity; 
    if(opacity > 0 && opacity < 1){ 
        window.setTimeout("alphaEffect('"+Element+"');",100); }
}

//Muestra otra cara del panda al clickear una ciudad
$(function(){
    $("#li-right").on('mouseup','li.city', function(){
       $("#panda-helper").css('background-image','url("img/panda5.png")');
    });
});
