
<?php
require("PHPMailer/class.phpmailer.php");
if(isset($_POST['contact-submit'])){
    $name=$_POST['name'];
    $Email=$_POST['contact-email'];
    $comment=$_POST['comment'];
    $_SESSION['message']= '';

    $mail = new PHPMailer(); 										
    $mail->IsSMTP();
    $mail->Host = "smtp.163.com"; 
    $mail->SMTPAuth = true; 
    $mail->Username = "reggiecril@163.com";
    $mail->Password = "Cloud10080618"; 
    $mail->Port=25;	
    $mail->From = "reggiecril@163.com"; 
    $mail->FromName = $name;														
    $toAddress ="reggiecril@163.com";												
    $mail->AddAddress("$toAddress", "Reggie");
    $mail->Subject  = "Comment";    
    $bodyTpl  = "Hi!\nMy name:   ".$name."\n\nMy E-mail:   ".$Email."\n\nMy Comment:\n".$comment;
    $mail->Body = $bodyTpl;
    header("Content-type: text/html; charset=utf-8"); 
    if(!empty($name) || !empty($Email) || !empty($comment)){
        if (filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            if(!$mail->Send())
            {
                $_SESSION['message']="Failed <p>";
                echo "Error: " . $mail->ErrorInfo;
                exit;
            }else{
                header("Location:web_dev.php?content=footer/contact-thank-you.php"); 
            }
        }else{
              $_SESSION['message'] = "Please Enter A Valid Email Address!";
        }
    }else{
        $_SESSION['message']='Please fill All Space!';
    }
}
?>
<h1 style="text-align: center;">Contact Us</h1>
<form method="post" action="">
    <div class="contact-form">
        <div class="name-title contact-first-column">
            <p>Name:</p>
        </div>
        <div class="name-title contact-first-column">
            <p style="display:inline-block; color:red;">*</p>
        </div>
        <div class="Name contact-second-column" style="width:300px;">
            <input type="text" name="name"  placeholder="Your name"/>
        </div>
        <div></div>
        <div class="email-title contact-first-column">
            <p>Email:</p>
        </div>
        <div class="email-title contact-first-column">
            <p style="display:inline-block; color:red;">*</p>
        </div>
        <div class="email contact-second-column" style="width:300px;" >
            <input type="text" name="contact-email" placeholder="Please fill it with your email!"/>
        </div>
        <div></div>
        <div class="comment-title contact-first-column">
            <p>Comment:</p>
        </div>
        <p style="display:inline-block; color:red;">*</p>
        <textarea id="editor"></textarea>
        <span style="text-align: center;color:red;"><?php echo $_SESSION['message'];session_destroy(); ?></span>
    </div>
    <script>
    ClassicEditor.create( document.querySelector( '#editor' ) ).catch( error => {
            console.error( error );
        } );
    </script>
        <div class="contact-submit">
            <input type="submit" name="contact-submit" value="Submit"/>
        </div>
      
</form>
