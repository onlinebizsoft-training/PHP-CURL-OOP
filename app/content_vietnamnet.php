<?php 
    include('../libs/curl.php');

    $curl = new Curl();
    
    $html = $curl->getCurl('http://vietnamnet.vn/vn/thoi-su/');

    $subject = $html;

    $pattern = '#<li class="item clearfix dotter">.*/li>#imsU';

    preg_match_all($pattern, $subject, $data);

    $news = $data[0];

    foreach($news as $key){
        $subject = $key;
        $pattern = '#(?<=<img src=").*(?=" class="th)#';
        preg_match($pattern, $subject, $img);

        $subject = $key;
        $pattern = '#(?<=title=").*(?="><img)#';
        preg_match($pattern, $subject, $title);

        $subject = $key;
        $pattern = '#(?<=Lead m-t-5"><p>).*(?=</p></div></li>)#';
        preg_match($pattern, $subject, $description);

        $subject = $key;
        $pattern = '#(?<=#class="red">).*(?=</span> |)#';
        preg_match($pattern, $subject, $time);


        echo "<pre>";
        print_r($time);
        echo "</pre>";
    }
?>