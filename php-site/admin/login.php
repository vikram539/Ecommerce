<?php include("assets/admin-header.php") ?>
<?php
   if(isset($_POST['login'])){     
      $userName = get_safe_value($conn, $_POST['userName']);
      $userPassword = get_safe_value($conn, $_POST['userPassword']);

      $loginCheck = commonSelect_table($conn, "admin_user", "admin_name^admin_pasword", "WHERE admin_name='$userName' AND admin_pasword='$userPassword'");   
      $numRow =  mysqli_num_rows($loginCheck);
      if($numRow > 0){
         $_SESSION['admin-login'] = "yes";
         $_SESSION['login-user'] = $userName;
         header("Location: index.php");
      }
      else{
         $errorMes = "Please Enter Correct Detail";
      }
   }  
?>
</head>
   <body class="bg-dark">
      <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-form mt-150">
                  <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">  
                     <div class="form-group">
                        <label>User Name</label>
                        <input type="text" class="form-control" placeholder="User Name" id="userName" name="userName" require>
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" id="userPassword" name="userPassword" require>
                     </div>
                     <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="login">Login</button>
					   </form>
                  <div class="errorMessage"><?=@$errorMes?></div>
               </div>
            </div>
         </div>
      </div>
      <?php include("assets/admin-footer.php") ?>
   </body>
</html>