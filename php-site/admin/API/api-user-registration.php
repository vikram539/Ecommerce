<?php
    require_once('../include/php-function.php');
    $userName = get_safe_value($conn, $_POST['userName']);
    $userEmail = get_safe_value($conn, $_POST['userEmail']);
    $userPassword = get_safe_value($conn, $_POST['userPassword']);
    $userMobile = get_safe_value($conn, $_POST['userMobile']);
    $userAddress = get_safe_value($conn, $_POST['userAddress']);

    if($userName == '' || $userEmail == '' || $userPassword == '' || $userMobile == '' || $userAddress == ''){
        echo "All Fields Required";
    }

    else{    

        $userSelect = commonSelect_table($conn, "users", "id ^user_name ^user_password ^user_email ^mobile_no ^user_address^status", "WHERE user_email='$userEmail'");
        
        $userNumRows = mysqli_num_rows($userSelect);
        if($userNumRows > 0){
            echo"Email already Exist..";
        }
        else if(!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
            echo"Invalid email format";
        }
        else{
            $userInsert = common_insert($conn, "users", array("user_name" => $userName, "user_email" => $userEmail, "user_password" => $userPassword, "mobile_no" => $userMobile, "user_address" => $userAddress));

            if($userInsert){
                echo 1; 
                
                // $to = 'vikram.engg539@gmail.com';
	            // $subject = "Confirmation Email";
	            // $from = $userEmail;
	             
	            // // To send HTML mail, the Content-type header must be set
	            // $headers  = 'MIME-Version: 1.0' . "\r\n";
	            // $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	             
	            // // Create email headers
	            // $headers .= 'From: '.$from."\r\n".
	            //     'Reply-To: '.$from."\r\n" .
	            //     'X-Mailer: PHP/' . phpversion();
	             
	            // // Compose a simple HTML email message
	            // $message = '<html><body>';
	            // $message .= '<h1 style="color:#f40;">'.$subject.'</h1>';
                // $message .= '$root';
	            // $message .= '</body></html>';
	             
	            // // Sending email
	            // if(mail($to, $subject, $message, $headers)){
	            //     echo 'Please Check your Email';
	                
	            // } else{
	            //     echo "Unable to send Message. Please try again.";
	            // }
            }
            else{
                echo"Registration Process not Completed, Try again";
            }
        }
    }
?>