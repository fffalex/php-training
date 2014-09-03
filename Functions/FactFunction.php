<?php
///$arg = $_GET[int];
function fact($arg)
{
    //echo "aguante java";
    $factorial=$arg;
    
    for ($index = $arg-1; $index > 1; $index--) 
    {      
        $factorial = $factorial * $index ;
        
    }
    
    return $factorial;
}
//$num = 5;
//echo fact($num);
