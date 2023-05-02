<section class="htc__category__area ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section__title--2 text-center">
                    <h2 class="title__line">New Arrivals</h2>
                    <p>Qu'est-ce que le Lorem Ipsum</p>
                </div>
            </div>
        </div>
        <div class="htc__product__container">
            <div class="row">
                <div class="product__list clearfix mt--30">
                    <!-- Start Single Category -->
                    <?php 
                        $productSel = commonSelect_table($conn, "product_table", "id^cat_id^pro_name^pro_MRP^pro_price^pro_qty^pro_img^pro_short_desc^pro_desc^sku^weight^status", "WHERE status='1' ORDER BY id DESC LIMIT 4");
                       
                        $numRows = mysqli_num_rows($productSel);  
                        if($numRows > 0){
                            while($productFetch = mysqli_fetch_assoc($productSel)){
                                $pro_id = $productFetch['id'];
                                $pro_name = $productFetch['pro_name'];
                                $pro_img = $productFetch['pro_img'];
                                $pro_price = $productFetch['pro_price'];
                                $pro_MRP = $productFetch['pro_MRP'];
                                $cat_id = $productFetch['cat_id'];
                                $pro_short_desc = $productFetch['pro_short_desc'];
                    ?>
                    <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                        <div class="category">
                            <div class="ht__cat__thumb">
                                <a href="product-details.php?proId=<?=$pro_id?>">
                                    <img src="images/product/<?=$cat_id."/".$pro_img?>" alt="product images">
                                </a>
                            </div>
                            <!-- <div class="fr__hover__info">
                                <ul class="product__action">
                                    <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                                    <li><a href="cart.html"><i class="icon-handbag icons"></i></a></li>

                                    <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
                                </ul>
                            </div> -->
                            <div class="fr__product__inner">
                                <h4><a href="product-details.php"><?=$pro_name?></a></h4>
                                <hr>
                                <ul class="fr__pro__prize">
                                    <li class="old__prize">$<?=$pro_MRP?></li>
                                    <li><del><small>$<?=$pro_price?></small></del></li>
                                </ul>
                                <div class="product_btn">
                                    <a href="">quick shop</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                            }
                        }
                    ?>
                    <!-- End Single Category -->
                    
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="grooming-img">
        <img src="images/grooming.jpg" alt="grooming" />
        <div class="groom-text">
            <div class="groom-typography">
                <h2>Grooming</h2>
                <h3>Styling from head to paw for furry family members</h3>
            </div>
        </div>
    </div>
</section>
