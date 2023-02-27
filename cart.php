<?php include_once('header.php');?>

<?php
            ob_start();
            if($_SERVER['REQUEST_METHOD']=='POST'){
                if(isset($_POST['delete']))
                {
                $cart->deleteFromCart($_POST['item_id']);
                }
            }
?>
<main id="main">
    <div class="container">
        <section>
        <div class="row py-5">
            <div class="col-sm-9">
                <!--forEach-->
                <?php
                // $productData=$product->getProduct(5);
                // print_r($productData);
                $subTotal=array();
                foreach($product->getProductData("cart") as $item){
                    $CartData=$product->getProduct($item['item_id']);
                    $subTotal[]=array_map(function($item){
                        
                    
                ?>
                <div class="row border-top mt-2">
                    <div class="col-sm-2 mt-4">
                        <img src="<?php echo $item['item_image']?>" alt="product" class="img-fluid">
                    </div>
                    <div class="col-sm-9">
                        <h4 class="text-primary fw-bold mt-4"><?php echo $item['item_name']?></h4>
                        <small>by <?php echo $item['item_brand']?></small>
                        <div class="text-warning fs-6">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <div class="row">
                            <div class="col-2">QTY</div>
                            <div class="qty col-2 d-flex">
                                
                                <button class="qty-up border bg-light text-primary" data-id="<?php echo $item['item_id']??0;?>"><i class="fa-solid fa-angle-up"></i></button>
                                <button class="qty-down border bg-light text-primary" data-id="<?php echo $item['item_id']?>"><i class="fa-solid fa-angle-down"></i></button>
                                <!-- <button class="qty-u border bg-light text-primary" data-id="<?php echo $item['item_id']?>"><i class="fa-solid fa-angle-down"></i></button> -->
                                <input type="text" class="qty-input border bg-light text-primary" data-id="<?php echo $item['item_id']?>" value="1" placeholder="1"/>   
                            </div>
                        </div>
                        <form method="post">
                            <input type="hidden" value="<?php echo $item['item_id']??1;?>" name="item_id"/>
                        <button class="btn btn-light text-danger my-3" name="delete"> Delete</button>
                        </form>
                        <button class="btn btn-light text-danger my-3"> Save For Later</button>
                    </div>
                    <div class="col-sm-1 ">
                        <h6 class="text-primary fw-bold mt-4 price" data-id="<?php echo $item['item_id']?>" >$<?php echo $item['item_price']??0;?></h6>
                    </div>
                </div>
                <?php 
                    return $item['item_price'];},$CartData);}
                    
                    ?>
               <!--forEach--> 
            </div>
            <div class="col-sm-3 mt-4 text-center ">
                  <!--subtotal-->
                  <div class="border text-primary ">
                    <h6 class="fw-bold pt-1"><i class="fa fa-check"></i> SubTotal</h6>
                  </div>
                  <div class="border text-primary "><br>
                       <h6>SubTotal (<?php if(isset($subTotal)){echo count($subTotal);}else{echo 0;}?> items):$<small class="text-danger" id="item_price"> <?php if(count($subTotal)){echo $cart->subTotal($subTotal);}else{echo 0;}?></small></h6>
                       <button class="btn btn-warning text-white my-4">Proceed To Buy</button><br>
                  </div>
            </div>
        </div>
        </section>
    </div>
</main>

<?php include_once('footer.php');?>