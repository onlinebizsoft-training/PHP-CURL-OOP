<?php
    

    class MyDatabase
    {
        public $conn;

        public function __construct(){
            include __DIR__ . '/../config/config.php';
            $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die("Error connect");
        }
        public function insertToDB($table_name, $db_fields_name, $values_arr){
            $sql = "INSERT INTO `$table_name` ($db_fields_name) VALUES ('$values_arr')";
            mysqli_query($this->conn, $sql) or die('Error query!');
        }
    }
?>