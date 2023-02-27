<?php
//to fetch product data
 class cart{
    public $db=null;
    public function __construct(DBcontroller $db){
        if(!isset($db->con)){
            return null;
        }else{
            $this->db=$db;
        }
    }
    public function insertIntoCart($params=null,$table="cart"){
        if($this->db->con!=null){
            if($params!=null){
                // $result=$this->db->con->query("select * from {$table}");
                $columns=implode(',',array_keys($params));
                // print_r($columns);
                $values=implode(',',array_values($params));
                // print_r($values);

                $query_string=sprintf("insert into {$table} (%s)values (%s)",$columns,$values);
                // echo $query_string;

                $result=$this->db->con->query($query_string);
            }
        }
    }

    public function addToCart($userId,$itemId){
        if(isset($userId) && isset($itemId)){
         
            $params=array(
                "user_id"=>$userId,
                "item_id"=>$itemId
            ); 
            $result=$this->insertIntoCart($params);
            if($result){
                header("Location:".$_SERVER["PHP_SELF"]);
            }
        }
    }
    public function subTotal($arr){
        if(isset($arr)){
            $sum=0;
            foreach($arr as $item){
                $sum+=floatval($item[0]);
            }
            return $sum;
        }
    }
    public function deleteFromCart($item_id=null,$table="cart"){
        if(isset($item_id)){
            $query_string=sprintf("delete from {$table} where item_id={$item_id}");
                // echo $query_string;
            $result=$this->db->con->query($query_string);
            if($result){
                header("Location:".$_SERVER["PHP_SELF"]);
            }
        }
    }
    public function getCartId($arr=null,$key="item_id"){
        if(isset($arr)){
            $cart_id=array_map(function($item) use ($key){
                return $item[$key];
            },$arr);
            return $cart_id;
        }
    }
}