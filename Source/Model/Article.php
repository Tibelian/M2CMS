<?php
/**
 * @author Tibelian
 * @see www.tibelian.com
 */

class Article{

    private $title;
    private $author;
    private $date;
    private $content;
    private $tag;

    function __construct(array $data){
        foreach($data as $key => $value){
            $this->setData($key, $value);
        }
    }


    ////////////
    // GETTER //
    ////////////
    public function getTitle(){
        return $this->title;
    }
    public function getAuthor(){
        return $this->author;
    }
    public function getDate(){
        return $this->date;
    }
    public function getContent(){
        return $this->content;
    }
    public function getTag(){
        return $this->tag;
    }
    public function getUrl(){
        $newTitle = strtolower($this->getTitle());
        $newTitle = replaceSpecialChars($newTitle);
        $newDate = date("Y-m-d", strtotime($this->getDate()));
        return BASE_URL . '/' . $newDate . '/' . $newTitle;
    }


    ////////////
    // SETTER //
    ////////////
    public function setTitle($title){
        $this->title = $title;
    }
    public function setAuthor($author){
        $this->author = $author;
    }
    public function setDate($date){
        $this->date = $date;
    }
    public function setContent($content){
        $this->content = $content;
    }
    public function setTag(array $tag){
        $this->tag = $tag;
    }

    public function addTag($tag){
        $this->tag[] = $tag;
    }

    private function setData($key, $value){
        switch($key){
            case 'title':
                $this->setTitle($value);
                break;
            case 'author':
                $this->setAuthor($value);
                break;
            case 'date':
                $this->setDate($value);
                break;
            case 'content':
                $this->setContent($value);
                break;
            case 'tag':
                $this->setTag($value);
                break;
        }
    }


}