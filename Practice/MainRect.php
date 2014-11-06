<?php
abstract class Figure{
    
    function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public $width;
    public $height;
  
    abstract function draw(Canvas $canvas);
}



class Circle extends Figure
        {
        public function draw (Canvas $canvas)
                {
                                        
                    imagearc($canvas->zone, 300, 300, $this->width, $this->height, 0, 360, $canvas->color);
                
                    //imagepng($canvas->zone);
                    
                    //imagedestroy($canvas->$zone);
                                
                }
        
        }       
       

class Recangle extends Figure
{
    public function draw (Canvas $canvas)
                {
                   
                    
                    imagerectangle($canvas->zone, 50, 50, $this->width, $this->height, $canvas->color);
             
                    //imagedestroy($canvas->$zone);
                                
                }

}

class Canvas 
{
    public $zone;
    public $color;

function __construct() 
    {
    $this->zone = imagecreatetruecolor(800,600);
    $this->color = imagecolorallocate($this->zone, 135, 132, 28);
    }
    
    public function showContent()
            {
                imagepng($this->zone);
                imagedestroy($canvas->$zone);
            }

}

header ('Content-type: image/png');
$canvas = new Canvas ();

//cargo un array de Figure
$figureList = [];
$figureList[] = new Circle(200,200); 
$figureList[] = new Recangle(500,500);
$figureList[] = new Recangle(125,400);
$figureList[] = new Circle(300,550); 


foreach ($figureList as $figure) {
    $figure->draw($canvas);
}

$canvas->showContent();

?>