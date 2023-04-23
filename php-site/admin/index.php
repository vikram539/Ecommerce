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
         $status_update = common_update($conn, "category_table", array("status" => $status), "WHERE id='$catId'");
         
      }

      // Delete Record
      if($type == 'delete'){
         $catId =  get_safe_value($conn, $_GET['id']);
         $cat_del = commnon_del($conn, "category_table", "WHERE id='$catId'");
         
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
                        <h4 class="box-title">Category </h4>
                        <a href='category-add.php' class='badge badge-complete bg-flat-color-1 text-white'>Add Category</a>   
                           
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">SNo.</th>
                                       <th>ID</th>
                                       <th>Category Name</th>
                                       <th>Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       $i = 1; 
                                       $sel_cat = commonSelect_table($conn, "category_table", "id^cat_name^status", "");
                                       while($runCat =  mysqli_fetch_array($sel_cat)){
                                          if($runCat['status'] == 1){
                                             $class = "badge badge-complete";
                                             $href = "<a class='text-white' href='?type=status&operation=deactive&id=".$runCat['id']."'>active</a>";
                                          }
                                          else{
                                             $class = "badge badge-pending";
                                             $href = "<a class='text-white' href='?type=status&operation=active&id=".$runCat['id']."'>Deactive</a>";
                                          }

                                          $delHref = "<a class='text-white' href='?type=delete&id=".$runCat['id']."'>delete</a>";
                                          $delClass = "badge badge-pending";

                                          $editHref = "<a class='text-white' href='category-add.php?type=edit&id=".$runCat['id']."'>edit</a>";
                                          $editClass = "badge badge-complete";

                                          $tr = "<tr>";
                                          $tr .= "<td class='serial'>$i</td>";                                       
                                          $tr .= "<td>".$runCat['id']."</td>";
                                          $tr .= "<td> <span class='name'>".$runCat['cat_name']."</span> </td>";
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