<?php include("assets/admin-header.php") ?>
<?php
   include("assets/session.php");
   

$catName = "";
if(isset($_GET['id']) && $_GET['id'] != ''){
   $catId = get_safe_value($conn, $_GET['id']);
   $catSelect = commonSelect_table($conn, "category_table", "id^cat_name^status", "WHERE id='$catId'");
   $catFetch = mysqli_fetch_assoc($catSelect);
   $catName = $catFetch['cat_name'];
}


if(isset($_POST['add_cat'])){
   $catPostValue =  get_safe_value($conn, $_POST['category']);

   // Edit/update category 
   if(isset($_GET['id']) && $_GET['id'] != ''){
      $catSelect = commonSelect_table($conn, "category_table", "id^cat_name^status", "WHERE cat_name='$catPostValue'");

         // Update check if category name exist
         $catNumRows =  mysqli_num_rows($catSelect);
         if($catNumRows > 0){
            $errorMes ="Category Name Already Exist";
         }
         else{
            $cat_update = common_update($conn, "category_table", array("cat_name" => $catPostValue), "WHERE id='$catId'");
            if($cat_update){
               header("Location: index.php");
            }
         }
   }
   else{      
      if($catPostValue != ''){

         //  check if category name exist
         $catSelect = commonSelect_table($conn, "category_table", "id^cat_name^status", "WHERE cat_name='$catPostValue'");
         $catNumRows =  mysqli_num_rows($catSelect);
         if($catNumRows > 0){
            $errorMes ="Category Name Already Exist";
         }

         // Add category
         else{
            $catAdd = common_insert($conn, "category_table", array("cat_name" => $catPostValue));
            if($catAdd){
               header("Location: index.php");
            }
         }
      }
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
                        <div class="card-header"><strong>Category</strong><small> Form</small></div>
                        <div class="card-body card-block">
                           <form method="post">
                              <div class="form-group">
                                 <label for="category" class=" form-control-label">Category</label>
                                 <input type="text" id="company" require="required" name="category" placeholder="Enter your category name" value="<?=$catName?>" class="form-control" >
                              </div>
                           
                              <button id="payment-button" type="submit" name="add_cat" class="btn btn-lg btn-info btn-block">
                                 <span id="payment-button-amount">Submit</span>
                              </button>
                           </form>
                           <div class="errorMessage"><?=@$errorMes?></div>
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