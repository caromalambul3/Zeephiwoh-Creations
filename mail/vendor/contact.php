<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit'])) {
    $name =$_POST['name'];
    $email =$_POST['email'];
    $phone =$_POST['phone'];
    $enquiry =$_POST['service'];
    $message =$_POST['message'];
    $toMail = "testing@zeepiwohcreations.co.za";
    $toName ="Busi N";



    // Load Composer's autoloader
    require 'autoload.php';


    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.mail.zeepiwohcreations.co.za';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'testing@zeepiwohcreations.co.za';                     // SMTP username
    $mail->Password   = 'testing@zeepiwoh';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 995;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
        $mail->setFrom($name);
        $mail->addAddress($toMail, $toName);     // Add a recipient
    

   
        $body  = '<table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border: 1px solid #cccccc; border-collapse: collapse;">
                                     
    <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
            <b>Hey there ' . $toName . '</b>
          </td>
        </tr>
        <tr>
          <td style="padding: 20px 0 30px 0; color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
          I would  like to enquire about '.$enquiry.' . ' .$message.'
            
            
            <br>
               My contacts are as follows: <br>
               '.$name.' <br>
               '.$email.' <br>
               '.$phone.' <br>

          </td>
        </tr>
        
      </table>
    </td>
  </tr>
  <tr>
  
  </tr>
</table>
</td>
</tr>

</table>
</td>
</tr>

</table>';


        // Content
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = $enquiry;
        $mail->Body    = $body;
        $mail->AltBody = $body;




        $mail->send();
        echo "<script>alert('Your message has been sent ')</script>";
        echo "<script>window.open('../index.html#contact','_self')</script>";
    } catch (Exception $e) {
        echo "<script>alert('Message not sent please try again later!!:'{$mail->ErrorInfo}')</script>";
        echo "<script>window.open('../index.html#contact','_self')</script>";
    }
}
