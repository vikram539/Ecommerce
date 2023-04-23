<?php 
    header("Content-type:application/json");
    header("Access-Control-Access-Origin:*");
    // header("Access-Control-Access-Headers:");

    require('../include/php-function.php');

    $getAllData = commonSelect_table($conn, "product_table", "id^cat_id^pro_name^pro_MRP^pro_price^pro_qty^pro_img^pro_short_desc^pro_desc^sku^weight^serial_number^meta_title^meta_desc^meta_keywords^status", "WHERE status='1' ORDER BY id DESC");
    $numRows = mysqli_num_rows($getAllData);

    $fetchAll = mysqli_fetch_all($getAllData, MYSQLI_ASSOC);
   
    if($numRows > 0){
        echo json_encode($fetchAll);
    }
    else{
        echo json_encode(array("message" => "No Record Found", "status" => false));
    }
    
?>