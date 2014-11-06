<?php

//CLASS LIBRARY
/*
 * Contain all types of figures that can be draw
 */
abstract class Figure{
    
    function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    public $width;
    public $height;
    
    /*
     * Function to draw a figure on some Canvas object. 
     * It receives a Canvas class param
     */
    abstract function draw(Canvas $canvas);
}


/*
 * Circle figure to draw in Canvas
 */
class Circle extends Figure
        {
        /*
         * Override abstract method "draw" to use imagearc php function
         */
        public function draw (Canvas $canvas)
                {
                                        
                    imagearc($canvas->zone, 300, 300, $this->width, $this->height, 0, 360, $canvas->color);
                                
                }
        
        }       
       
/*
 * Rectangle figure to draw in Canvas
 */
class Recangle extends Figure
{
       /*
         * Override abstract method "draw" to use imagerectangle php function (for rectangle)
         */
    public function draw (Canvas $canvas)
                {
                    imagerectangle($canvas->zone, 50, 50, $this->width, $this->height, $canvas->color);
             
                    //imagedestroy($canvas->$zone);
                                
                }

}

/*
 * it allow to contain drawings made for other classes
 */
class Canvas 
{
    public $zone;
    public $color;
    
/*
 * Contructor to create a Canvas object with statics dimensions and color
 */
function __construct() 
    {
    $this->zone = imagecreatetruecolor(800,600);
    $this->color = imagecolorallocate($this->zone, 135, 132, 28);
    }
    
    /*
     * Function to show all figures that were drawn in this Canvas object
     */
    
    public function showContent()
            {
                //At the end. Show the last status as PNG
                imagepng($this->zone);
                //To release memory
                imagedestroy($canvas->zone);
            }

}


////------- RUN LAYER-----------

header ('Content-type: image/png');
$canvas = new Canvas ();

//logic stolen from Chango instead of create each object (Circle, Rectangle) and then append it to the array
//Gustavo Gimenez  ® © aproved
$figureList = [];
$figureList[] = new Circle(200,200); 
$figureList[] = new Recangle(100,500);
$figureList[] = new Recangle(125,400);
$figureList[] = new Circle(250,550); 


foreach ($figureList as $figure) {
    $figure->draw($canvas);
}

//Mega Magic
$canvas->showContent();

?>