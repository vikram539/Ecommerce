<?php
     $menuName = ["dog", "cat", "fish"];
?>
<header id="htc__header" class="htc__header__area header--one">
    <!-- Start Mainmenu Area -->
    <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
        <div class="container">
            <div class="row">
                <div class="menumenu__container clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                        <div class="logo">
                                <a href="<?=$root?>"><img src="<?=$img_dir?>logo/logo200.png" alt="logo images"></a>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                        <nav class="main__menu__nav hidden-xs hidden-sm">
                            <ul class="main__menu">
                                <li class="drop"><a href="<?=$root?>">Home</a></li>
                                <?php                                   
                                   $count = count($menuName);
                                   foreach( $menuName as $values){
                                ?>
                                <li class="drop"><a href="#"><?=$values ?></a>
                                    <ul class="dropdown mega_dropdown">
                                        <!-- Start Single Mega MEnu -->
                                        <?php 
                                            for($i = 1; $i <= 3; $i++){                                            
                                        ?>
                                        <li><a class="mega__title" href="">Sub Cat <?=$i?></a>
                                            <ul class="mega__item">
                                                <li><a href="">Sub Cat</a></li>
                                                <li><a href="">Sub Cat</a></li>
                                                <li><a href="">Sub Cat</a></li>
                                                <li><a href="">Sub Cat</a></li>
                                            </ul>
                                        </li>
                                        <!-- End Single Mega MEnu -->
                                        <?php 
                                            }
                                        ?>
                                    </ul>
                                </li>
                                <?php
                                   }
                                ?>
                                <li><a href="">contact</a></li>
                            </ul>
                        </nav>

                        <div class="mobile-menu clearfix visible-xs visible-sm">
                            <nav id="mobile_dropdown">
                                <ul>
                                    <li><a href="<?=$root?>">Home</a></li>
                                    <li><a href="blog.html">blog</a></li>
                                    <li><a href="#">pages</a>
                                        <ul>
                                            <li><a href="">Blog</a></li>
                                            <li><a href="l">Blog Details</a></li>
                                            <li><a href="">Cart page</a></li>
                                            <li><a href="l">checkout</a></li>
                                            <li><a href="">contact</a></li>
                                            <li><a href="">product grid</a></li>
                                            <li><a href="">product details</a></li>
                                            <li><a href="">wishlist</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="">contact</a></li>
                                </ul>
                            </nav>
                        </div>  
                    </div>
                    <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                        <div class="header__right">
                            <div class="header__search search search__open">
                                <a href="#"><i class="icon-magnifier icons"></i></a>
                            </div>
                            <div class="header__account">
                                <a href="#"><i class="icon-user icons"></i></a>
                            </div>
                            <div class="htc__shopping__cart">
                                <a class="cart__menu" href="#"><i class="icon-handbag icons"></i></a>
                                <a href="#"><span class="htc__qua">2</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-area"></div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>