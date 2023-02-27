<?php
//to fetch product data
 class product{
    public $db=null;
    public function __construct(DBcontroller $db){
        if(!isset($db->con)){
            return null;
        }else{
            $this->db=$db;
        }
    }
    public function getProductData($table="product")
    {
        $result=$this->db->con->query("select * from {$table}");
        $resultArray=array();
        if($result){
            while($item=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $resultArray[]=$item;
            }
        return $resultArray;
        }
 
    }
    public function getProduct($item_id=null,$table="product"){
        if(isset($item_id)){
            $result=$this->db->con->query("select * from {$table} where item_id={$item_id}");
            $resultArray=array();
            if($result){
                while($item=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    $resultArray[]=$item;
                }
            return $resultArray;
            }
            }
    }
 }
?>