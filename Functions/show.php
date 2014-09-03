<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Show Fact</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form  method='GET' action="show.php">
        Ingrese el valor a calcular Factorial: <input type="text" name="value" >
        <input type="submit">
        </form>
               
        El factorial es:             
        <?php
            //para utilizar functions de FacFunction.php
            include ('FactFunction.php');
            if ( isset($_GET['value'])){
                $value = $_GET['value'];
                echo fact($value);
            }
            
        ?>
       
    </body>
</html>
