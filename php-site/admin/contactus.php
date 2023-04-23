<?php include("assets/admin-header.php") ?>
<?php
   include("assets/session.php");
// Update Status
   if(isset($_GET['type']) && $_GET['type'] != ''){
      // Delete Record
        if($type == 'delete'){
            $catId =  get_safe_value($conn, $_GET['id']);
            $cat_del = commnon_del($conn, "contactus_table", "WHERE id='$catId'");            
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
                        <h4 class="box-title">Contact us </h4>
                           
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">SNo.</th>
                                       <th>ID</th>
                                       <th>user Name</th>
                                       <th>email</th>
                                       <th>Mobile</th>
                                       <th>Comment</th>
                                       <th>Date</th>
                                       <th>Delete</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       $i = 1; 
                                       $sel_cat = commonSelect_table($conn, "contactus_table", "id^u_name^u_email^u_mobile^u_comment^u_added_on", "");
                                       while($runCat =  mysqli_fetch_array($sel_cat)){
                                          

                                          $delHref = "<a class='text-white' href='?type=delete&id=".$runCat['id']."'>delete</a>";
                                          $delClass = "badge badge-pending";


                                          $tr = "<tr>";
                                          $tr .= "<td class='serial'>$i</td>";                                       
                                          $tr .= "<td>".$runCat['id']."</td>";
                                          $tr .= "<td> <span class='name'>".$runCat['u_name']."</span> </td>";                                      
                                          $tr .= "<td>".$runCat['u_email']."</td>";                                                                                
                                          $tr .= "<td>".$runCat['u_mobile']."</td>";                                                                                
                                          $tr .= "<td>".$runCat['u_comment']."</td>";                                                                             
                                          $tr .= "<td>".$runCat['u_added_on']."</td>";

                                          $tr .= "<td>";
                                          
                                          $tr .= "<span class='$delClass'>$delHref</span>&emsp;";
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