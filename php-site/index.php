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

        <!-- Start Slider Area -->
            <?php include("components/header-slider.php"); ?>
        <!-- Start Slider Area -->

        <!-- Start Category Area -->
            <?php include("components/new-arrivals.php"); ?>
        <!-- End Category Area -->

        <!-- Start Product Area -->
            <?php include("components/best-seller.php"); ?>
        <!-- End Product Area -->

        <!-- Start Footer Area -->
            <?php include("components/footer.php") ?>
        <!-- End Footer Style -->
    </div>
    <!-- Body main wrapper end -->

    <!-- Placed js at the end of the document so the pages load faster -->
    <?php include("components/footer-links.php") ?>