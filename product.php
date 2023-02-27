<?php include_once('header.php');?>

<?php 
$item_id=$_GET['item_id']??1;
$productData=$product->getProductData();
foreach($productData as $item){
    if($item_id == $item['item_id']){
        $itemData=$item;
    }
}
?>
<?php
            if($_SERVER['REQUEST_METHOD']=='POST'){
                if(isset($_POST['AddToCartSubmit']))
                {
                $cart->addToCart($_POST['user_id'],$_POST['item_id']);
                }
            }
            
?>
<!--product-->
    <main id="main">
        <div class="container">
            <div class="row pb-5">
                <div class="col-sm-5">
                    <img src="<?php echo $itemData['item_image']; ?>" alt="product" class="img-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-danger form-control">Proceed To Buy</button>
                        </div>
                        <div class="col-sm-6">
                        <form method="post">
                                <input type="hidden" value="<?php echo $item['item_id']??1; ?>" name="item_id"/>
                                <input type="hidden" value="<?php echo 1; ?>" name="user_id"/>
                                <button type="submit" class="card-link btn btn-primary" name="AddToCartSubmit" ><i class="fas fa-shopping-cart"></i> </button>
                        </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-6 text-primary">
                    <h5 class="fw-bold "><?php echo $itemData['item_name']??'Unkown'; ?></h5>
                    <small>by <?php echo $itemData['item_brand']??'Unkown'; ?></small>
                    <div class="d-flex">
                        <div class="text-warning fs-6">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <a href="#" class="px-2">20.089 Ratings</a>
                    </div>
                    <hr class="m-0">
                    <div class="row">
                        <div class="col-2">M.R.P</div>
                        <div class="col-2"><strike>$ 12000</strike></div>
                        <div class="col-8"></div>
                    </div>
                    <div class="row">
                        <div class="col-2">Deal Price</div>
                        <div class="col-2">$ <?php echo $itemData['item_price']??0; ?></div>
                        <div class="col-8"></div>
                    </div>
                    <div class="row">
                        <div class="col-2">You Save</div>
                        <div class="col-2">$ 1000</div>
                        <div class="col-8"></div>
                    </div>
                    <div class="row py-5">
                        <div class="col-2">
                            <span style="border-radius:50%;border:1px solid #27A4DD;" class="fw-bold p-2"><i class="fa-solid fa-retweet"></i></span><br><br>
                            <a href="">10 Days</a><br>
                            Replacement
                        </div>
                        <div class="col-2 ">
                            <span style="border-radius:50%;border:1px solid #27A4DD;" class="fw-bold p-2"><i class="fa-solid fa-truck"></i></span><br><br>
                                <a href="">Doaa Bakhiet</a><br>
                                Delivered
                        </div>
                        <div class="col-2">
                            <span style="border-radius:50%;border:1px solid #27A4DD;" class="fw-bold p-2"><i class="fa-solid fa-check-double"></i></span><br><br>
                            <a href="">1 year</a><br>
                            warely
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">QTY</div>
                        <div class="qty col-2 d-flex">
                            <button class="qty-up border bg-light text-primary"><i class="fa-solid fa-angle-up"></i></button>
                            <button class="qty-down border bg-light text-primary"><i class="fa-solid fa-angle-down"></i></button>
                            <input type="text" class="qty-input border bg-light text-primary" value="1" placeholder="1"/>
                        </div>
                        <div class="col-8"></div>
                    </div>
                </div>
            </div>
            <section id="topSale">
                <div class="container py-5">
                    <h4 class="text-primary fw-bold">Top Sale</h4>
                    <hr>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium molestias aut ab quo! Perspiciatis accusamus illum ex voluptas iusto ipsa maxime laudantium! Natus aliquam dolorum quod praesentium! Ipsa, tempore aspernatur.</p>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Praesentium molestias aut ab quo! Perspiciatis accusamus illum ex voluptas iusto ipsa maxime laudantium! Natus aliquam dolorum quod praesentium! Ipsa, tempore aspernatur.</p>

                </div>
            </section>
        </div>
    </main>
<!--product-->

<?php include('footer.php');?>

</body>
</html>