<?php 
    include('../libs/curl.php');

    $curl = new Curl();
    
    $html = $curl->getCurl('https://thethao.vnexpress.net/');

    $subject = $html;

    $pattern = '#<article class="list_news">.*</article>#imsU';

    preg_match_all($pattern, $subject, $data);

    $news = $data[0];

    $newArr = array();

    $i = 0;

    foreach($news as $key){
        $subject = $key;
        $pattern = '#(?<=<a href=").*(?=" title=")#';
        preg_match($pattern, $subject, $link);
        $newArr[$i]['link'] = $link[0];

        $subject = $key;
        $pattern = '#(?<=src=").*(?=" alt=")#';
        preg_match($pattern, $subject, $img);
        $newArr[$i]['img'] = $img[0];

        $subject = $key;
        $pattern = '#(?<=title=").*(?=">)#';
        preg_match($pattern, $subject, $title);
        $newArr[$i]['title'] = $title[0];

        $subject = $key;
        $pattern = '#(?<=<h4 class="description">).*(?=</h4>)#';
        preg_match($pattern, $subject, $description);
        $newArr[$i]['description'] = $description[0];

        $i++;
        
    }
    echo "<pre>";
    print_r($newArr);
    echo "</pre>";
?>