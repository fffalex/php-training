<?php
class Calculator
        {     
    
        function checkNum ($num)
        {
             if (gettype($num) != "integer" ||  gettype($num) != "double")
             {
                return FALSE;
             }else
                 {
                    return TRUE;
                 }
        }
        
        function checkZero ($num)
        {
             if (gettype($num) === 0)
             {
                 return FALSE;
             }
        }
        
        
        
        function sum ($num1 ,$num2)
                {
                   if ( $this->checkNum($num1)==TRUE && $this->checkNum($num2)==TRUE)
                   {   
                       return $num1+$num2;
                   }else{
                       //throw new Exception('One of the number isnt a int or double ');
                       echo "NO funco";
                   }                          
                }
                
        function sub ($num1 ,$num2)
                {
            
                   if ( $this->checkNum($num1) && $this->checkNum($num2))
                   {   
                       return $num1-$num2;
                   }else{
                       throw new Exception('One of the number isnt a int or double ');
                   }                
                }

        function div ($dividend, $divisor)
                {
                   if ( $this->checkNum($dividend) && $this->checkNum($divisor) && $this->checkZero($divisor))
                   {   
                       return $dividend/$divisor;
                   }else{
                       throw new Exception('One of the number isnt a int or double or divisor is zero');
                   }          
                    
                }
        function pow ($base, $exp)
                {
                   if ( $this->checkNum($base) && $this->checkNum($exp))
                   {   
                        return $base^$exp;
                   }else{
                       throw new Exception('One of the number isnt a int or double ');
                   }          
                }
                
     
        }
        
$calculator = new Calculator();
$res = $calculator->checkNum(5);
//$res = $calculator->sum(5, 5);
var_dump(5);
var_dump($res);



