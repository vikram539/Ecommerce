<?php
    // class first
    class addToCart{
        function addProduct($pid, $qty){
            $_SESSION['cart'][$pid]['qty'] = $qty;
        }
        function updateProduct($pid, $qty){
            if(isset($_SESSION['cart'][$pid])){
                $_SESSION['cart'][$pid]['qty'] = $qty;
            }
        }
        function removeProduct($pid){            
            if(isset($_SESSION['cart'][$pid])){
                unset($_SESSION['cart'][$pid]);
            }
        }
        function emptyProduct(){
            unset($_SESSION['cart']);
        }
        function totalProduct(){                       
            if(isset($_SESSION['cart'])){
                return count($_SESSION['cart']);
            }
            else{
                return 0;
            }
        }
    }
    $obj = new addToCart();
?>