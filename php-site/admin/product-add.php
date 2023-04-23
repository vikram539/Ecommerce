<?php 
    include("assets/admin-header.php");
    include("assets/session.php");

    $category =  "";
    $hiddenCatId =  "";
    $pro_name = "";
    $pro_MRP =  "";
    $pro_price =  "";
    $pro_qty =  "";
    $pro_short_desc =  "";
    $pro_desc =  "";
    $sku =  "";
    $weight =  "";
    $serial_number =  "";
    $meta_title =  "";
    $meta_desc =  "";
    $meta_keywords =  "";

    if(isset($_GET['id']) && $_GET['id'] != ''){

        $proId = get_safe_value($conn, $_GET['id']);

        $proSelect = commonSelect_table($conn, "product_table", "id^cat_id^pro_name^pro_MRP^pro_price^pro_qty^pro_img^pro_short_desc^pro_desc^sku^weight^serial_number^meta_title^meta_desc^meta_keywords^status", "WHERE id='$proId'");
        $numRows = mysqli_num_rows($proSelect);
        if($numRows > 0){
            $proFetch = mysqli_fetch_assoc($proSelect);
            // $category = $proFetch['cat_name'];
            $hiddenCatId =  "";
            $pro_name = $proFetch['pro_name'];
            $pro_MRP =  $proFetch['pro_MRP'];
            $pro_price =  $proFetch['pro_price'];
            $pro_qty =  $proFetch['pro_qty'];
            $pro_short_desc =  $proFetch['pro_short_desc'];
            $pro_desc =  $proFetch['pro_desc'];
            $sku =  $proFetch['sku'];
            $weight =  $proFetch['weight'];
            $serial_number =  $proFetch['serial_number'];
            $meta_title =  $proFetch['meta_title'];
            $meta_desc =  $proFetch['meta_desc'];
            $meta_keywords =  $proFetch['meta_keywords'];
            $pro_img =  $proFetch['pro_img'];

            
        }
    }

    if(isset($_POST['add_product'])){
        $category =  get_safe_value($conn, $_POST['category']);
        $hiddenCatId =  get_safe_value($conn, $_POST['hiddenCatId']);
        $pro_name =  get_safe_value($conn, $_POST['pro_name']);
        $pro_MRP =  get_safe_value($conn, $_POST['pro_MRP']);
        $pro_price =  get_safe_value($conn, $_POST['pro_price']);
        $pro_qty =  get_safe_value($conn, $_POST['pro_qty']);
        $pro_short_desc =  get_safe_value($conn, $_POST['pro_short_desc']);
        $pro_desc =  get_safe_value($conn, $_POST['pro_desc']);
        $sku =  get_safe_value($conn, $_POST['sku']);
        $weight =  get_safe_value($conn, $_POST['weight']);
        $serial_number =  get_safe_value($conn, $_POST['serial_number']);
        $meta_title =  get_safe_value($conn, $_POST['meta_title']);
        $meta_desc =  get_safe_value($conn, $_POST['meta_desc']);
        $meta_keywords =  get_safe_value($conn, $_POST['meta_keywords']);
        $status = 1;

        $pro_img =  $_FILES['pro_img']['name'];
        $pro_imgTemp =  $_FILES['pro_img']['tmp_name'];
        $img_array = ["jpg", "png", "gif", "jpeg"];
        $img_ext = pathinfo($pro_img, PATHINFO_EXTENSION);
        $uploadProductImg = $uploadImgPath."/product/".$hiddenCatId;
        $imgName = rand(0000000000, 9999999999);
        $fullImgName = $imgName.".".$img_ext;
        if($hiddenCatId != ''){
            if(in_array($img_ext, $img_array)){        
                if(!file_exists($uploadProductImg)){
                    mkdir($uploadProductImg, 0777, true);
                }

                // select product if exist
                $catSelect = commonSelect_table($conn, "product_table", "id^cat_id^pro_name^sku", "WHERE cat_id='$hiddenCatId' AND pro_name='$pro_name' AND sku='$sku'");
                $proNumRows = mysqli_num_rows($catSelect);

                if($proNumRows > 0){
                    $errorMes = "This Product already exist";
                }
                else{
                    if(move_uploaded_file($pro_imgTemp, $uploadProductImg."/".$fullImgName)){
                        $productAdd = common_insert($conn, "product_table", array("cat_id" => $category, "pro_name" => $pro_name, "pro_MRP" => $pro_MRP, "pro_price" => $pro_price, "pro_qty" => $pro_qty, "pro_img" => $fullImgName, "pro_short_desc" => $pro_short_desc, "pro_desc" => $pro_desc, "sku" => $sku, "weight" => $weight, "serial_number" => $serial_number, "meta_title" => $meta_title, "meta_desc" => $meta_desc, "meta_keywords" => $meta_keywords, "status" => $status));
                        if( $productAdd ){
                            $errorMes = "Product added successfully!!!!!...."; 
                        }
                        else{
                            $errorMes = "Product Fail to Add...."; 
                        }
                    }
                    else{
                        $errorMes = "Fail to Upload image";
                    }
                    header("Location: product.php");
                }            
            }
            else{
                $errorMes = "Select Valid Image Format";        
            }
        }
        else{
            $errorMes = "Please Select Category";
        }

        // Edit/update Product 
        if(isset($_GET['id']) && $_GET['id'] != ''){

           $proSelect = commonSelect_table($conn, "product_table", "id^cat_id^pro_name^pro_MRP^pro_price^pro_qty^pro_img^pro_short_desc^pro_desc^sku^weight^serial_number^meta_title^meta_desc^meta_keywords^status", "WHERE cat_id='".$_GET['catid']."' AND pro_name='$pro_name' AND sku='$sku'");
            
            $proNumRows = mysqli_num_rows($proSelect);

            // if($proNumRows > 0){
            //     $errorMes = "This Product already exist";
            // }

            // else{
                $pro_img =  $_FILES['pro_img']['name'];
                $pro_imgTemp =  $_FILES['pro_img']['tmp_name'];
                $img_array = ["jpg", "png", "gif", "jpeg"];
                $img_ext = pathinfo($pro_img, PATHINFO_EXTENSION);
                $uploadProductImg = $uploadImgPath."/product/".$_GET['catid'];
                $imgName = rand(0000000000, 9999999999);
                $fullImgName = $imgName.".".$img_ext;

                if(!file_exists($uploadProductImg)){
                    mkdir($uploadProductImg, 0777, true);
                }
                // echo $uploadProductImg."/".$fullImgName; exist();
                // if(in_array($img_ext, $img_array)){ 
                    if($_FILES['pro_img']['name'] != ''){ 
                        echo "file Not blank";
                        // exit();
                        if(move_uploaded_file($pro_imgTemp, $uploadProductImg."/".$fullImgName)){
                            $cat_update = common_update($conn, "product_table", array("pro_name" => $pro_name, "pro_MRP" => $pro_MRP, "pro_price" => $pro_price, "pro_qty" => $pro_qty, "pro_img" => $fullImgName, "pro_short_desc" => $pro_short_desc, "pro_desc" => $pro_desc, "sku" => $sku, "weight" => $weight, "serial_number" => $serial_number, "meta_title" => $meta_title, "meta_desc" => $meta_desc, "meta_keywords" => $meta_keywords, "status" => $status), "WHERE id='$proId'");
                            
                            if($cat_update){
                                header("Location: product.php");
                            }
                        }
                        else{
                            $errorMes = "Image not updated"; 
                        }
                    }
                    else{
                        echo "file  blank"                ;
                        // exit();

                        $cat_update = common_update($conn, "product_table", array("pro_name" => $pro_name, "pro_MRP" => $pro_MRP, "pro_price" => $pro_price, "pro_qty" => $pro_qty, "pro_short_desc" => $pro_short_desc, "pro_desc" => $pro_desc, "sku" => $sku, "weight" => $weight, "serial_number" => $serial_number, "meta_title" => $meta_title, "meta_desc" => $meta_desc, "meta_keywords" => $meta_keywords, "status" => $status), "WHERE id='$proId'");

                        if($cat_update){
                            header("Location: product.php");
                        }
                    }
                // }
                // else{
                //     $errorMes = "Select Valid Image Format";        
                // }
            // }
        }
    }
?>
   </head>
   <body>      
      <?php include("assets/admin-left-bar.php") ?>
      <div id="right-panel" class="right-panel">         
         <?php include("assets/admin-logo-panel.php") ?>
         <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Product</strong><small> Form</small></div>
                        <div class="card-body card-block">
                        <div class="errorMessage text-center text-danger"><?=@$errorMes?></div>
                           <form method="post" enctype='multipart/form-data'>
                                <div class="form-group">
                                    <label for="category" class=" form-control-label">Category</label>
                                    <select id="category" require="required" name="category" class="form-control" <?=(isset($_GET['catid'])) ? "disabled" : ""; ?>>
                                        <option value=''>select category</option>
                                        <?php
                                            $option = "";
                                            $getCatId = $_GET['catid'];

                                            $sel_cat = commonSelect_table($conn, "category_table", "id^cat_name", "");                                       
                                            while($run_cat =  mysqli_fetch_assoc($sel_cat)){
                                                $runCatId = $run_cat['id'];
                                                $selected = ($getCatId == $runCatId) ? 'selected' : '';
                                                $option = "<option value='".$run_cat['id']."'  $selected>".$run_cat['cat_name']."</option>";
                                                echo $option;
                                            }
                                        ?>
                                    </select>
                                </div>
                                <input type="hidden" id="hiddenCatId" name="hiddenCatId" />

                                <!-- Field -->
                                <div class="form-group">
                                    <label for="pro_name" class=" form-control-label">Product Name</label>
                                    <input type="text" id="pro_name" require="required" name="pro_name" placeholder="Enter your Product name" class="form-control" value="<?=$pro_name?>">
                                </div>
                            
                                <!-- Field -->
                                <div class="form-group">
                                    <label for="pro_MRP" class=" form-control-label">Product MRP</label>
                                    <input type="text" id="pro_MRP" require="required" name="pro_MRP" placeholder="Product MRP" class="form-control" value="<?=$pro_MRP?>">
                                </div>
                            
                                <!-- Field -->
                                <div class="form-group">
                                    <label for="pro_price" class=" form-control-label">Product Price</label>
                                    <input type="text" id="pro_price" require="required" name="pro_price" placeholder="Product Price" class="form-control" value="<?=$pro_MRP?>">
                                </div>
                            
                                <!-- Field -->
                                <div class="form-group">
                                    <label for="pro_qty" class=" form-control-label">Quantity</label>
                                    <input type="number" id="pro_qty" require="required" name="pro_qty" class="form-control" min='1'  value="<?= (isset($_GET['id'])) ? $pro_qty : 1; ?>">
                                </div>
                            
                                <div class="form-group">
                                    <label for="pro_img" class=" form-control-label">Product Image </label>
                                    <input type="file" id="pro_img" require="required" name="pro_img" class="form-control">
                                    <?php
                                        if(isset($_GET['id'])){
                                            echo"<img src='../images/product/".$_GET['catid']."/".$pro_img."' class='img-fluid mt-4 w-25' />";
                                        }
                                    ?>
                                </div>
                            
                                <!-- Field -->
                                <div class="form-group">
                                    <label for="pro_short_desc" class=" form-control-label">Small Description</label>
                                    <textarea id="pro_short_desc" require="required" name="pro_short_desc" class="form-control"><?=$pro_short_desc?></textarea>
                                </div>
                            
                                <!-- Field -->
                                <div class="form-group">
                                    <label for="pro_desc" class=" form-control-label">Product Description</label>
                                    <textarea rows='7' id="pro_desc" require="required" name="pro_desc" class="form-control"><?=$pro_desc?></textarea>
                                </div>
                            
                                <!-- Field -->
                                <div class="form-group">
                                    <label for="sku" class=" form-control-label">SKU</label>
                                    <input type="text" id="sku" require="required" name="sku" placeholder="Enter Product SKU" class="form-control" value="<?=$sku?>">
                                </div>
                            
                                <!-- Field -->
                                <div class="form-group">
                                    <label for="weight" class=" form-control-label">Weight</label>
                                    <input type="text" id="weight" require="required" name="weight" placeholder="Enter Weight" class="form-control" value="<?=$weight?>">
                                </div>
                            
                                <!-- Field -->
                                <div class="form-group">
                                    <label for="serial_number" class=" form-control-label">Serial Number</label>
                                    <input type="text" id="serial_number" require="required" name="serial_number" placeholder="Enter Serial Number" class="form-control" value="<?=$serial_number?>">
                                </div>
                            
                                <!-- Field -->
                                <div class="form-group">
                                    <label for="meta_title" class=" form-control-label">Meta Title</label>
                                    <input type="text" id="meta_title" name="meta_title" placeholder="Enter meta title" class="form-control" value="<?=$meta_title?>">
                                </div>
                            
                                <!-- Field -->
                                <div class="form-group">
                                    <label for="meta_desc" class=" form-control-label">Meta Description</label>
                                    <input type="text" id="meta_desc" name="meta_desc" placeholder="Enter meta description" class="form-control" value="<?=$meta_desc?>">
                                </div>
                            
                                <!-- Field -->
                                <div class="form-group">
                                    <label for="meta_keywords" class=" form-control-label">Meta Keywords</label>
                                    <input type="text" id="meta_keywords" name="meta_keywords" placeholder="Enter meta keywords" class="form-control" value="<?=$meta_keywords?>">
                                </div>
                            
                                <button id="payment-button" type="submit" name="add_product" class="btn btn-lg btn-info btn-block">
                                    <span id="payment-button-amount">Submit</span>
                                </button>
                            </form>
                            <div class="errorMessage text-center text-danger mt-4"><?=@$errorMes?></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="clearfix"></div>
         <?php include("assets/footer.php") ?>
         
      </div>
      <?php include("assets/admin-footer.php") ?>
   </body>
</html> 
<script>
    $(document).ready(function(){
        $(document).on("change", "#category", function(){
            $selectedVal = $(this).val();
            $("#hiddenCatId").val($selectedVal);
        })
    })
</script>