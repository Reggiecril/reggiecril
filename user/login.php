
<?php

include 'loginSubmit.php';

if (isset($_SESSION['email'])) {
    
	header("location:web_dev.php?content=user/securePage.php");

}
//check to see if there is an error message to be displayed
	
?>

<center><h3 style="font-size:40px;">Login</h3>
<form method="post" action="">
	<label>Email:</label><br />
    <input type="text" name="email" value="" placeholder="email" /><br />
    <label>Password:</label><br />
    <input type="password" name="password" placeholder="password"/><br />
    <label>Are You Robot?</label><br />
    <label><?php $first_number=rand(10,100);
			$second_number=rand(10,100);
			$total=$first_number+$second_number;
			$_SESSION['total']=$total;
			echo $first_number,'+',$second_number,'=?';?>
	</label></br>
	<input type="text" name="calculation" value="" placeholder="Robot?" /><br />
	<label>Captcha:</label><br />
<?php
	require "simple-php-captcha.php";		
	$_SESSION['captcha'] = simple_php_captcha();
    echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';
?><br />
	<input type="text" name="captcha" placeholder="Captcha"><br /><br />
	<input type="submit" name="logSubmit" value="submit" /><br /><br />
	 <fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button>
    <span style="color:red;"><?php echo $_SESSION['message']['email'],$_SESSION['message']['password'],$_SESSION['message']['calculation'],$_SESSION['message']['captcha'],$_SESSION['message']['error'];?></span>
    <a href="#" onclick='javascript:logoutFacebook();'></a>
</form>

</center>

