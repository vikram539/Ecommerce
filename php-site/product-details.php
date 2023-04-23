<?php require("components/header-links.php"); ?>
</head>

<body>
    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
            <?php include("components/header.php"); ?>
        <!-- End Header Area -->

        <div class="body__overlay"></div>

        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
                <?php include("components/header-search.php"); ?>
            <!-- End Search Popap -->

            <!-- Start Cart Panel -->
                <?php include("components/header-shoping-cart.php"); ?>
            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/bg.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <!-- <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="index.html">Home</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <a class="breadcrumb-item" href="product-grid.html">Products</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">ean shirt</span>
                                </nav> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Details Area -->
        <?php
            if((isset($_GET['proId'])) || (!$_GET['proId']) || ($_GET['proId'] != '')){
                $productId = $_GET['proId'];
                $productSel = commonSelect_table($conn, "product_table", "product_table.*^category_table.cat_name", "INNER JOIN category_table ON product_table.cat_id=category_table.id AND product_table.id=$productId");
                 

                $numRows = mysqli_num_rows($productSel); 
                if($numRows != 0){ 
                    $fetchSingleRecord = mysqli_fetch_assoc( $productSel);

                    $pro_id = $fetchSingleRecord['id'];
                    $pro_name = $fetchSingleRecord['pro_name'];
                    $pro_img = $fetchSingleRecord['pro_img'];
                    $pro_price = $fetchSingleRecord['pro_price'];
                    $pro_MRP = $fetchSingleRecord['pro_MRP'];
                    $cat_id = $fetchSingleRecord['cat_id'];
                    $pro_short_desc = $fetchSingleRecord['pro_short_desc'];             
        ?>
                <section class="htc__product__details bg__white ptb--100">
                    <!-- Start Product Details Top -->
                    <div class="htc__product__details__top">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                                    <div class="htc__product__details__tab__content">
                                        <!-- Start Product Big Images -->
                                        <div class="product__big__images">
                                            <div class="portfolio-full-image tab-content">
                                                <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                                    <img src="images/product/<?=$cat_id."/".$pro_img?>" alt="product images">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Product Big Images -->
                                        
                                    </div>
                                </div>
                                <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                                    <div class="ht__product__dtl">
                                        <h2><?=$pro_name?></h2>
                                        <ul  class="pro__prize">
                                            <li class="old__prize">$<?=$pro_MRP?></li>
                                            <li>$<?=$pro_price?></li>
                                        </ul>
                                        <p class="pro__info">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.  Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsanLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.  Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsanLorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.  Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan</p>
                                        <div class="ht__pro__desc">
                                            <div class="sin__desc">
                                                <p><span>Availability:</span> In Stock</p>
                                            </div>
                                            <div class="sin__desc align--left">
                                                <p><span>Categories:</span></p>
                                                <ul class="pro__cat__list">
                                                    <li><a href="#">Fashion,</a></li>
                                                </ul>
                                            </div>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Product Details Top -->
                </section>
                <!-- End Product Details Area -->
                <!-- Start Product Description -->
                <section class="htc__produc__decription bg__white">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- Start List And Grid View -->
                                <ul class="pro__details__tab" role="tablist">
                                    <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">description</a></li>
                                </ul>
                                <!-- End List And Grid View -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="ht__pro__details__content">
                                    <!-- Start Single Content -->
                                    <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                                        <div class="pro__tab__content__inner">
                                            <p>Formfitting clothing is all about a sweet spot. That elusive place where an item is tight but not clingy, sexy but not cloying, cool but not over the top. Alexandra Alvarez’s label, Alix, hits that mark with its range of comfortable, minimal, and neutral-hued bodysuits.</p>
                                            <h4 class="ht__pro__title">Description</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem</p>
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                            <h4 class="ht__pro__title">Standard Featured</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in</p>
                                        </div>
                                    </div>
                                    <!-- End Single Content -->
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Product Description -->
        <?php
                }
                else{
                    // echo "<script> window.location.href = 'index.php' ;</script>";
                }
            }
        ?>


        <!-- Start Footer Area -->
            <?php include("components/footer.php") ?>
        <!-- End Footer Style -->
    </div>
    <!-- Body main wrapper end -->

    <!-- Placed js at the end of the document so the pages load faster -->
    <?php include("components/footer-links.php") ?>