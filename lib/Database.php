<?php
    $filepath = realpath(dirname(__FILE__));
    include ($filepath."/../config/config.php"); 
    class Database{
        public $host = DB_HOST;
        public $user = DB_USER;
        public $pass = DB_PASS;
        public $db_name = DB_NAME;

        public $conn ;
        public $error ;

        public function __construct()
        {
            $this->connectDB();
        }

        public function connectDB(){
            $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
            if(!$this->conn){
                $this->error = "Connection Fail";
                $this->conn->connect_error;
                return false;
            }
        }


        //Read Data
        public function select($sql){
            $result = $this->conn->query($sql) or die($this->conn->error.__LINE__);
            if($result->num_rows > 0){
                return $result;
            }else{
                return false;
            }
        }


        //Insert Data
        public function insert($sql){
            $result = $this->conn->query($sql) or die($this->conn->error.__LINE__);
            if($result){
                return $result;
            }else{
                return false;
            }
        }

        //Update Data
          public function update($sql){
            $result = $this->conn->query($sql) or die($this->conn->error.__LINE__);
            if($result){
                return $result;
            }else{
                return false;
            }
        }


          //Delete Data
          public function delete($sql){
            $result = $this->conn->query($sql) or die($this->conn->error.__LINE__);
            if($result){
                return $result;
            }else{
                return false;
            }
        }


    }
?>