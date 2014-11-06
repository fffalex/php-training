<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
                $elements = array('info', 41, 19, '2014', 'da');
                
                /**
                * In this we're using ternary operator (condition ? action1: action2;)
                * Ej: if browser send query string as localhost/index.php?needed=info, then
                * $_GET = array('needed' => 'info'), so then $needed = 'info'. If index 'needed'
                * does no exist then $needed = '2014'
                */
                $needed = isset($_GET['needed']) ? $_GET['needed']: '2014';

               
                $found = array_search($needed, $elements);
                        
                if ($found !== FALSE) {
                    echo 'Todo OK';
                }else{
                    echo 'Not found';
                }
                
                 echo ('<br> La posicion del elemento es '.array_search($needed, $elements));
                
                    
                
                    
        ?>
    </body>
</html>
