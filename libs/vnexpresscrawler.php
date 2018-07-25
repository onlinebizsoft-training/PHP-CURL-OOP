<?php 
  include_once "crawler.php";
  class VNECrawler extends Crawler {
    function __construct(){
      $this->source = 'vnexpress.net';
      $this->titlePattern = '/\<h1 class="title_news_detail mb10".*\>(.*)\<\/h1\>/isU';
      $this->contentPattern= '/\<article class="content_detail fck_detail width_common block_ads_connect".*\>(.*)\<\/article\>/isU';
    }
  }
?>