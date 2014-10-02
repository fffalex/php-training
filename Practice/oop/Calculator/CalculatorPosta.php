<?php

class CalculatorPosta
{
    private $total;
    
    function __construct($total) {
        $this->total = $total;
    }
    
    public function getTotal() {
        return $this->total;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

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
        
    function sum ($num)
                {
                   if ( $this->checkNum($num)==TRUE)
                   {   
                       return $this->total + $num;
                   }else{
                       //throw new Exception('One of the number isnt a int or double ');
                       echo "NO funco";
                   }                          
                }
                
     function sub ($num)
                {
                   if ( $this->checkNum($num)==TRUE)
                   {   
                       return $this->total - $num;
                   }else{
                       //throw new Exception('One of the number isnt a int or double ');
                       echo "NO funco";
                   }                          
                }
                
     function div ($divisor)
                {
                   if ($this->checkNum($divisor) && $this->checkZero($divisor))
                   {   
                       return $this->total/$divisor;
                   }else{
                       throw new Exception('One of the number isnt a int or double or divisor is zero');
                   }          
                    
                }
    function pow ($exp)
                {
                   if ($this->checkNum($exp))
                   {   
                        return $this->total^$exp;
                   }else{
                       throw new Exception('One of the number isnt a int or double ');
                   }          
                }
                
    function clear()
    {
        $this->total = 0;
    }
    
}