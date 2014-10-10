$(function(){
    var name = $("#name");
    name.keyup(function() {
      var $this = $(this);
      var nameLength = $this.val().length;

      if (nameLength >= 13) {
         $this.css('background-color', '#FFFAAA');
      } else {
         $this.css('background-color', '#FFFFFF');
      }
    });
    
    
    
    var pass = $("#pass");
    pass.keyup(function() {
      var $this = $(this);
      var passLength = $this.val().length;

      if (passLength >= 13) {
         $this.css('background-color', '#FFFAAA');
      } else {
         $this.css('background-color', '#FFFFFF');
      }
    });
    
    var singup = $("#button");
    singup.click(function (){
        if (name.val() == pass.val()){
            window.open("El Password y Name son iguales");
        }else if (name.length == 0 || name.length > 12 || pass.val().length == 0  ||  pass.val().length < 0){
            window.open("Hay Campos Vacios macho");
        }
        else if (name.length > 0 || name.length > 12 || pass.val().length > 0  ||  pass.val().length > 0){
            $("#form-login").submit();
            window.open("Se ha registrado correctamente MAcho");
        }
    });

    $("#form-login").submit(function(){
        //control
       
        if (name.val().length > 0  || pass.val().length >0){
            return false;
        }
    });

    
         
    
    name.blur(function(){
        var $this = $(this);
        var nameLength = $this.val().length;
        if (nameLength == 0) {     
         $this.css('background-color', '#FFFAAA');
        }
    });
});
