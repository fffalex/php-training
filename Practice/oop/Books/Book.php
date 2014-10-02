<?php

class Book
{
    function __construct($name, $author, $listOfContent) {
        $this->name = $name;
        $this->author = $author;
        $this->content = $listOfContent;
    }

    public $name;
    public $author;
    public $content = [];
    
    function searchIndex ($index)
    {
        foreach ($this->content as $chapter) {
            if ($chapter->number ==  $index)
            {
                return $chapter;
            }else
            {
                return 'The given index does not exist';
            }
        }
    }
    
    function printIndex ()
    {
        
        foreach ($this->content as $chapter) {
            $indexList[] = "Chapter ".$chapter->number.": ".$chapter->name."..............".$chapter->pageBegin;
        }
        return $indexList;

    }
    
    
}

class Chapter
{
    function __construct($number, $pageBegin, $pageEnd, $title, $text) {
        $this->number = $number;
        $this->pageBegin = $pageBegin;
        $this->pageEnd = $pageEnd;
        $this->title = $title;
        $this->text = $text;
    }

    public $number;
    public $pageBegin;
    public $pageEnd;
    public $title;
    public $text;
    
  

    public function getNumber() {
        return $this->number;
    }

        public function getTitle() {
        return $this->title;
    }

    public function getText() {
        return $this->text;
    }
    
    public function getPageBegin() {
        return $this->pageRange;
    }
    
    public function getPageEnd() {
        return $this->pageEnd;
    }


    








}

