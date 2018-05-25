<?php
try {
	$dbh = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
	if (isset($_POST['logSubmit'])){
		$email=$_POST['email'];
		$password=$_POST['password'];
		$calculation=$_POST['calculation'];
		$captcha=$_POST['captcha'];
		$captcha1=$_SESSION['captcha'];
		
		$_SESSION['message']=array();
		if (!empty($email)) {
	        $email = stripslashes($email);
	        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	            
	            $_SESSION['message']['email'] = "Please Enter A Valid Email Address";
	        }
		        if (!empty($password)) {
	        
	        		$password = stripslashes($password);
	        		$total=$_SESSION['total'];
		        	if ($calculation==$total){
		        		if($captcha==$captcha){
			        		$result = $dbh->query("SELECT * FROM users WHERE email='$email' AND password='$password'");
						
							//is there a matching record?
							if ($row = $result->fetch()) {
								//matching record found save email and message and userID to sending page
								$_SESSION['email']=$row['email'];
								$_SESSION['password']=$row['password'];
								header("location:web_dev.php?content=user/securePage.php");
							} else {
								//no matching record return fail message to sending page
								$_SESSION['message']['errorr']='invalid email or wrong password';
								header('location: web_dev.php?content=user/login.php');
							}
						}else{
							$_SESSION['message']['captcha'] = "Please Fill Captcha";
						}
					}else{
						$_SESSION['message']['calculation'] = "Please Fill Calculation Question";
					}
	   	 		}else {
	        
	         		$_SESSION['message']['password'] = "Please Enter Your Password";
	    		}

	        
	    } else {
	        
	         $_SESSION['message']['email']= "Please Enter Your Email Address";
	    }
		//build and run query to see if email details entered match any in email table
		
			
		
	}$dbh = null;

}catch(PDOException $e){

    echo $e->getMessage();
    die();
  }
?>