<?php
  include "libs/crawler.php";
  include_once "libs/vnexpresscrawler.php";
  include_once "libs/vnnetcrawler.php";
  include_once "db/connect.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Home Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <?php
  $curl = new Crawler();
  if(isset($_POST['getlink'])){
    $curl->setUrl($_POST['getlink']);
    $curl->crawl();
  }
  if(isset($curl->url)){
    $src1 = explode('://',$curl->url);
    if(isset($src1[1])){
      $src2 = explode('/',$src1[1]);
      $getSource = $src2[0];
    } 
  }
  switch($getSource){
    case 'vnexpress.net': 
      $handle = new VNECrawler();
      break;
    case 'vietnamnet.vn': 
      $handle = new VNNCrawler();
      break;
  }
  if($handle != ""){
    $handle->setUrl($_POST['getlink']);
    $handle->parseData();
    $inputTitle = $handle->title;
    $inputContent = $handle->content;
    $handle->saveData();
    echo '<script language="javascript">alert("Thêm dữ liệu thành công!"); window.location="index.php";</script>';
  } 
?>
  <form action="" method="POST">
    <input type="text" class="form-control" name="getlink" placeholder="Enter url"">
    <button type="submit">Go!</button>
  </form>
</body>
</html>