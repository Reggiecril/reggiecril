
<?php
include "registerSubmit.php";
if (isset($_SESSION['email'])) {
    
	header("location:web_dev.php?content=user/securePage.php");

}
?>
	<form method='post' action=''>
		  <div class="reg_div">
		    <p>Register</p>
		    <ul class="reg_ul">
		      <li>
		          <span>Firstname：</span>
		          <input type="text" name="firstname" value="" placeholder="4-8位用户名" class="reg_user">
		          <span class="tip user_hint"></span>
		      </li>
		      <li>
		          <span>Lastname：</span>
		          <input type="text" name="lastname" value="" placeholder="4-8位用户名" class="reg_user1">
		          <span class="tip user1_hint"></span>
		      </li>
		      <li>
		          <span>Password：</span>
		          <input type="password" name="password" value="" placeholder="6-16位Password" class="reg_password">
		          <span class="tip password_hint"></span>
		      </li>
		      <li>
		          <span>Comfirm Password：</span>
		          <input type="password" name="confirm_password" value="" placeholder="Comfirm Password" class="reg_confirm">
		          <span class="tip confirm_hint"></span>
		      </li>
		      <li>
		          <span>Email：</span>
		          <input type="email" name="email" value="" placeholder="Email" class="reg_email">
		          <span class="tip email_hint"></span>
		      </li>
		      <li>
		        <input type="submit" name="sign-up-submit" value="Register" style="width:150px;height: 50px;">
		      </li>
		    </ul>
		  </div>
	
			
</form>
<script type="text/javascript" src="assets/js/script.js"></script>
