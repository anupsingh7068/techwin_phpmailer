<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include "config.php";

require "PHPMailer/src/SMTP.php";
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/Exception.php";


$otp = rand(0000, 9999);


function sendMail($send_to , $recvername ,$otp1) {
    
    $mail = new PHPMailer(true);
   // $mail->SMTPDebug = 2;                                      
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                   
    $mail->SMTPAuth   = true;                            
    $mail->Username   = 'zargam.techwinlabs@gmail.com';                
    $mail->Password   = 'gkfckkdkawethkmm';                       
    $mail->SMTPSecure = 'ssl';                             
    $mail->Port       =  465; 

    $mail->setFrom('zargam.techwinlabs@gmail.com', 'Roshan');          
    $mail->addAddress($send_to, $recvername);

      
    $mail->isHTML(true);                                 
    $mail->Subject = 'account is activated';
    $mail->Body    = 'hello ' .$recvername. 'Send otp ' .$otp1.
   
    $mail->send();
}


if(isset($_POST['submit'])){

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

    $sql = "SELECT * FROM users where email = '$email'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
    
    echo " email is already exist ";
    }
    else{

        $sql1 = "INSERT INTO users(name, email, password) values('$name', '$email', '$password')";
$insert = mysqli_query($conn, $sql1);
        if($insert ){
          sendMail($email, $name, $otp);

            echo"registered succesfully";
        }
        else{

            echo "registertion not done";
        }

    }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>php mailer</title>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <fieldset>
  <div class="row">

  <form action="" method="post">
  <div class="col-4">
    <input type="text" class="form-control" placeholder="Enter The Name" aria-label="Name" name="name" >
  </div>
  <div class="col-4">
    <input type="text" class="form-control" placeholder="Enter the Email" aria-label="Email" name="email" >
  </div>
  <div class="col-4">
    <input type="password" class="form-control" placeholder="Enter the password" aria-label="password" name="password" >
  </div>
  <div class="col">
   <button type="submit" name="submit" >submit</button>
  </div>
  </form>
</div>
</fieldset>
  </body>
</html>