<html>
<head>
<style>
.container{
  position: absolute; /* or absolute */
  top: 50%;
  left: 50%;
}
.ciudad{
   display: none
}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body class="container">
<select class="provincia">
    <option value="1">Chaco</option>
    <option value="2">Corrientes</option>
    <option value="3">Formosa</option>
</select>
<select class="ciudad">

</select>
<script>
   $(".provincia").change(function(){
       $(".ciudad").show();
       $(".ciudad").append('<option>zfsd</option>');
       alert($(".provincia").val());

   });
   
   $.ajax({
       url: 'cities.php',
       data: {'provincia':$(".provincia").val() },
       type: 'GET',
       success: function(data){
          $('body').append($('<p></p>').text(data));
       }
   });
</script>
</body>
</html>