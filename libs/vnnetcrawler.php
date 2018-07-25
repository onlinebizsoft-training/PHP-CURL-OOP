<?php 
  include_once "crawler.php";
  class VNNCrawler extends Crawler{
    function __construct(){
      $this->source = 'vietnamnet.vn';
      $this->titlePattern = '/\<h1 class="title".*\>(.*)\<\/h1\>/isU';
      $this->contentPattern = '/\<div id="ArticleContent" class="ArticleContent".*\>(.*)\<\/div\>/isU';
    }
  }
?>