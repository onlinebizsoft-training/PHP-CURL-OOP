<?php
    class MyDatabase
    {
        public $conn;
        public function __construct(){
            $this->conn = mysqli_connect('localhost','root','123456','example-curl-oop');
        }
    }
    class DataArr extends MyDatabase{
        public $title;
        public $content;
        public $source;
        public function __construct($inputTitle, $inputContent, $inputSource){
            $this->title = $inputTitle;
            $this->content = $inputContent;
            $this->source = $inputSource;
        }
        public function insertToDB(){
            $sql = "INSERT INTO savedata (title, content, link) VALUES ('$this->title','$this->content','$this->source')";
            mysqli_query(mysqli_connect('localhost','root','123456','example-curl-oop'), $sql);
        }
    }
?>