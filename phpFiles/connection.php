<?php
    class DBcontroller{
        protected $host='localhost';
        protected $user='root';
        protected $password='';
        protected $database='clothesshop';
        public $con =null;
        public function __construct(){
            $this->con=mysqli_connect($this->host,$this->user,$this->password,$this->database);
            if($this->con->connect_error){
                echo "fail".$this->con->connect_error;
            }
        
        }
        public function __destruct(){
            $this->closeCon();
        }
        protected function closeCon(){
            if($this->con !=null){
                $this->con->close();
                $this->con =null;
            }
        }
    }
    

?>
