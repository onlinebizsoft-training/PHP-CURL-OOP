<?php
  include "db/database.php";
  class Crawler{
    public $ch;
    public $url;
    public $title;
    public $source;
    public $content;
    public $response;
    public $titlePattern;
    public $contentPattern;
    

    function setUrl($link){
      $this->url = $link;
    }
    public function crawl(){
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $this->url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $this->response = curl_exec($ch);
      curl_close($ch);
    }
    public function parseData(){
      $this->crawl();
      preg_match($this->titlePattern, $this->response, $matchesTitle);
      preg_match($this->contentPattern, $this->response, $matchesContent);
      if(isset($matchesTitle[1]) && isset($matchesContent[1])){
        $this->title = $matchesTitle[1];
        $this->content = $matchesContent[1];
      }
    }
    public function saveData(){
      $db_table_name = 'savedata';
      $db_fields_name = array('title', 'content', 'link');
      $values_arr = array($this->title, $this->content, $this->source);
      $db_fields_name = implode(',', $db_fields_name );
      $values_arr = implode("','", array_map('htmlspecialchars', $values_arr) );
      $ins = new MyDatabase();
      $ins->insertToDB($db_table_name, $db_fields_name, $values_arr);
    }
  }
?>