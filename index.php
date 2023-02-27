    <?php
        include_once('header.php');
    ?>

    <!--main-->
    <main id="main">
        <!--owl-carousal-->
            <section id="banner-area">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <img src="./assets/Banner1.png" alt="banner1">
                    </div>
                    <div class="item">
                        <img src="./assets/Banner2.png" alt="banner2">
                    </div>
                </div>
            </section>
        <!--owl-carousal-->

        <!--top Sale-->
        <?php
            if($_SERVER['REQUEST_METHOD']=='POST'){
                if(isset($_POST['AddToCartSubmit']))
                {
                $cart->addToCart($_POST['user_id'],$_POST['item_id']);
                }
            }
            $productData=$product->getProductData();
            $brand=array_map(function($item){return $item['item_brand'];},$productData);
            $uniqueData=array_unique($brand);
            sort($uniqueData);
        ?>
            <section id="topSale">
                <div class="container py-5">
                    <h4 class="text-primary fw-bold">Top Sale</h4>
                    <hr>
                    <!--owl-carousal-->
                    <div class="owl-carousel owl-theme pt-5">
                        <?php shuffle($productData);?>
                        <?php foreach($productData as $item){ ?>
                        <div class="item ">
                            <div class="card" style="">
                                <img src="<?php echo $item['item_image'] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $item['item_name']?? "UNKNOWN" ?></h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">$<?php echo $item['item_price']??0 ?></li>
                                    <li class="list-group-item text-primary"><?php echo $item['item_brand'] ?></li>
                                    <li class="list-group-item">A third item</li>
                                </ul>
                                <div class="card-body">
                                <form method="post">
                                <input type="hidden" value="<?php echo $item['item_id']??1; ?>" name="item_id"/>
                                <input type="hidden" value="<?php echo 1; ?>" name="user_id"/>
                                <?php
                                    if (in_array($item['item_id'],$cartItems)){
                                        echo '<button type="submit" class="card-link btn btn-warning" disabled ><i class="fas fa-shopping-cart"></i>In The Cart </button>';
                                    }else{
                                        echo '<button type="submit" class="card-link btn btn-primary" name="AddToCartSubmit" ><i class="fas fa-shopping-cart"></i> </button>';
                                    }
                                ?>
                                </form>
                                <a href="/php project/product.php?item_id=<?php echo $item['item_id'] ?>" class="card-link">Show More</a>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                        
                    </div>
                    <!--owl-carousal-->
                </div>
            </section>
        <!--top Sale-->

        <!--filter products-->
        <section id="topSale">
                <div class="container py-5">
                    <h4 class="text-primary fw-bold">Top Sale</h4>
                    <hr>

            <div class="container filter text-center">
            <nav>
                <ul>
                    <li class="current"><a href="#">All Products</a></li>
                    <?php array_map(function($item){
                        printf('<li><a href="#">%s</a></li>',$item);
                    },$uniqueData );?>
                                
                </ul>
            </nav>
            <div id="products">
                <h1 class="heading">All Products</h1>
                <ul id="gallery">
                    <?php shuffle($productData);?>
                    <?php array_map(function($item){?>
                    <li class="<?php echo  strtolower($item['item_brand'])?>">
                        <h3><?php echo  $item['item_name'] ?? 'Unkown'?></h3>
                        <a href="#"><img src="<?php echo $item['item_image']?>"></a> 
                    </li>
                    <?php },$productData );?>
                  </ul>
                </nav>
            </div>
            <!-- modal gallery -->
            <div class="gallery">
                <a class="close" href="#">
                    <i>
                    <span class="bar"></span>
                    <span class="bar"></span>
                    </i>
                </a>
                <img src="">
            </div>
        </div>

        <!--advertisement-->
        <section id="advertisement">
            <div class="container py-5 text-center">
                <img src="./assets/banner1-cr-500x150.jpg" class="img-fluid py-3"/>
                <img src="./assets/banner2-cr-500x150.jpg" class="img-fluid py-3"/>

            </div>
        </section>
        <!--advertisement-->


                </div>
        </section>
        <!--filter products-->

    </main>
    <!--main-->

    <?php
        include_once('footer.php');
    ?>

