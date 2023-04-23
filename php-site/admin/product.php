<?php include("assets/admin-header.php") ?>
<?php
   include("assets/session.php");
// Update Status
   if(isset($_GET['type']) && $_GET['type'] != ''){

      $type = get_safe_value($conn, $_GET['type']);

      // update Status
      if($type == 'status'){
         $operation =  get_safe_value($conn, $_GET['operation']);
         $catId =  get_safe_value($conn, $_GET['id']);
         if($operation == "active"){
            $status = 1;
         }
         else{
            $status = 0;
         }
         $status_update = common_update($conn, "product_table", array("status" => $status), "WHERE id='$catId'");
         
      }

      // Delete Record
      if($type == 'delete'){
         $catId =  get_safe_value($conn, $_GET['id']);
         $cat_del = commnon_del($conn, "product_table", "WHERE id='$catId'");
         
      }

      
   }

?>
   </head>
   <body>      
      <?php include("assets/admin-left-bar.php") ?>
      <div id="right-panel" class="right-panel">         
         <?php include("assets/admin-logo-panel.php") ?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                        <h4 class="box-title">Products </h4>
                        <a href='product-add.php' class='badge badge-complete bg-flat-color-1 text-white'>Add Product</a>   
                           
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">SNo.</th>
                                       <th>ID</th>
                                       <th>category Id</th>
                                       <th>category</th>
                                       <th>Product Name</th>
                                       <th>price</th>
                                       <th>QTY</th>
                                       <th>image</th>
                                       <th>SKU</th>
                                       <th>Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       $i = 1; 
                                    //    $sel_cat = commonSelect_table($conn, "product_table, category_table", "id^cat_id^pro_name^pro_MRP^pro_price^pro_qty^pro_img^pro_short_desc^pro_desc^sku^weight^serial_number^meta_title^meta_desc^meta_keywords^status^cat_name", "WHERE product_table.cat_id=category_table.id");
                                       $sel_cat = commonSelect_table($conn, "product_table", "product_table.*^category_table.cat_name", "INNER JOIN category_table ON product_table.cat_id=category_table.id");

                                       while($runCat =  mysqli_fetch_array($sel_cat)){
                                          if($runCat['status'] == 1){
                                             $class = "badge badge-complete";
                                             $href = "<a class='text-white' href='?type=status&operation=deactive&id=".$runCat['id']."'>active</a>";
                                          }
                                          else{
                                             $class = "badge badge-pending";
                                             $href = "<a class='text-white' href='?type=status&operation=active&id=".$runCat['id']."'>Deactive</a>";
                                          }

                                          $images = "../images/product/".$runCat['cat_id']."/".$runCat['pro_img'];
                                         

                                          $delHref = "<a class='text-white' href='?type=delete&id=".$runCat['id']."'>delete</a>";
                                          $delClass = "badge badge-pending";

                                          $editHref = "<a class='text-white' href='product-add.php?type=edit&catid=".$runCat['cat_id']."&id=".$runCat['id']."'>edit</a>";
                                          $editClass = "badge badge-complete";
 
                                          $tr = "<tr>";
                                          $tr .= "<td class='serial'>$i</td>";                                       
                                          $tr .= "<td>".$runCat['id']."</td>";       
                                          $tr .= "<td>".$runCat['cat_id']."</td>";
                                          $tr .= "<td>".$runCat['cat_name']."</td>";
                                          $tr .= "<td> <span class='name'>".$runCat['pro_name']."</span> </td>";                                                  
                                          $tr .= "<td>".$runCat['pro_price']."</td>";
                                          $tr .= "<td>".$runCat['pro_qty']."</td>";
                                          $tr .= "<td><img src='$images' alt='test' /></td>";
                                          $tr .= "<td>".$runCat['sku']."</td>";
                                          $tr .= "<td>";
                                          $tr .= "<span class='$class'>$href</span>&emsp;";
                                          $tr .= "<span class='$delClass'>$delHref</span>&emsp;";
                                          $tr .= "<span class='$editClass'>$editHref</span>";
                                          $tr .= "</td>";
                                          $tr .= "</tr>";
                                          
                                          echo $tr;
                                          $i++;
                                       }                                       
                                    ?>
                                 </tbody>
                              </table>
                           </div>
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