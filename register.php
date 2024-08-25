<!-- install phpmailer -->

<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer;
use PHPMailer\SMTP;
use PHPMailer\Exception;



//Load Composer's autoloader
require 'vendor/autoload.php';

if (isset($_POST["register"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $imagename = basename($_FILES['image']['name']);
  $imageTarget = "User Images/";
  $imageTargetFilePath = $imageTarget . $imagename;

  //Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer\PHPMailer(true);

  try {
    //Enable verbose debug output
    $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;

    //Send using SMTP
    $mail->isSMTP();

    //Set the SMTP server to send through
    $mail->Host = 'smtp.gmail.com';

    //Enable SMTP authentication
    $mail->SMTPAuth = true;

    //SMTP username
    $mail->Username = 'alihassanchand32@gmail.com';

    //SMTP password
    $mail->Password = 'jmkykrsvbukxqnfn';

    //Enable TLS encryption;
    $mail->SMTPSecure = PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;

    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    $mail->Port = 587;

    //Recipients
    $mail->setFrom('alihassanchand32@gmail.com', 'PlantNest');

    //Add a recipient
    $mail->addAddress($email, $name);

    //Set email format to HTML
    $mail->isHTML(true);

    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

    $mail->Subject = 'Email verification';
    $mail->Body = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

    $mail->send();
    // echo 'Message has been sent';


    // connect with database
    $conn = mysqli_connect("localhost", "root", "", "plantnest");

    // insert in users table
    $sql = "INSERT INTO users (NAME, Email, password, verification_code, email_verified_at, Image) VALUES ('$name', '$email', '$hashedPassword', '$verification_code', NULL, '$imagename')";
    mysqli_query($conn, $sql);

    header("Location: email-verification.php?email=" . $email);
    exit();
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Custom styles -->
  <style>
    body {
      padding: 0px;

      margin-top: 12px;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-color: #000000;
      background-image: url(plant.jpg);
      background-size: cover;
      height: 250px;
      color: white;
      ;

    }

    .form-container {
      margin-top: 60px;

      padding: 40px;
      border: 1px solid rgba(255, 255, 255, 0.25);
      box-shadow: 0 0 1rem rgba(255, 255, 255, 0.25);
      padding-top: 50px;
      color: white;
      width: 600px;
      height: 650px;
      background: linear-gradient(to bottom, #003300 0%, #ff0000 100%);
      background-image: url(plant.jpg);
      
      border-radius: 60px;
      opacity: 0.9;
      margin-left: 450px;
      padding-bottom: 40px;



    }

    .form-control {
      background-color: #00000091;
      color: white;
      font-weight: 900;
      border: none;
      border-bottom: 2px solid #fff;
      
      border-radius: 0;
      box-shadow: none;
      margin-bottom: -10px;
      margin-top: -5px;




    }

    #name {
      opacity: 0.6;
      background-color: #ffffff76;
      color: white;
      font-weight: 900;
    }

    #email {
      opacity: 0.6;
      background-color: #ffffff76;
      color: white;
      font-weight: 900;
    }


    #password {
      opacity: 0.6;
      background-color: #ffffff76;
      color: white;
    }

    .mb-3 {
      color: white;
    }

    .text-center {
      color: white;
      text-transform: uppercase;
    }

    .form-control:focus {
      box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
    }


    #btnin {
      background-color: #000;
      color: #fff;
      border: none;
      box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
      width: 230px;
      margin-left: -8px;
      height: 35px;
      border-radius: 10px;
    }

    #btn {
      background-color: #000;
      color: #fff;
      border: none;
      box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
      width: 230px;
      height: 35px;
      border-radius: 10px;
      margin-left: 20px;
    }

    #btnin:hover {

      background-color: #fdf9f9;
      color: #000000;
      border: none;
      box-shadow: 0 0 0 0.2rem rgba(143, 135, 135, 0.25);
      width: 230px;
      margin-left: -10px;
      font-weight: 900;
    }

    #btn:hover {

      background-color: #fdf9f9;
      color: #000000;
      border: none;
      box-shadow: 0 0 0 0.2rem rgba(143, 135, 135, 0.25);
      width: 230px;
      margin-left: 10px;
      font-weight: 900;
    }



    #account {
      margin-top: 50px;
      display: flex;
    }

    a {
      text-decoration: none;
      text-align: center;
      padding-top: 4px;
    }

    @media(max-width:768px) {
      #maindiv {
        width: 70%;
        margin-left: -28%;
        margin-top: -10%;
      }
    }

    @media(max-width:480px) {
      #maindiv {
        position: fixed;
        max-width: 290px;
        margin-left: -182%;
        margin-top: -27%;
      }
    }

    .logo-overlay {
      width: 480px;
      /* Adjust the width of the logo */
      height: auto;
      /* Maintain aspect ratio */
      border-radius: 20%;
      /* If the logo is circular, apply border-radius to make it circular */
      z-index: 1;
      opacity: 2;
      margin-right: 27%;
    }

    #profile {
      margin-bottom: 3%;
    }
    
  </style>


</head>

<body style="background-position: center;">
  <div id="maindiv" style="display:flex;">

    <div>
      <form action="register.php" method="POST" enctype="multipart/form-data">

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-6 form-container">
              <div id="profile">
                <img class="logo-overlay" src="Plant Images\logo lg (2).png" alt="">

                <h1 class="text-center">Sign Up</h1>
              </div>
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required
                  minlength="8" maxlength="16">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email"
                  required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password"
                  placeholder="Enter your password" required>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Image file</label>
                <input type="file" name="image" class="form-control" id="exampleInputPassword1" required>
                <p style="margin-top:5px; float: right "> <small> Upload your image </small></p>
              </div>
              <!-- <div class="mb-3">
                <label for="image" class="form-label">Password</label>
                <input type="file" class="form-control" name="images" id="images">
              </div> -->
              <div id="account">
                <!-- <input id="btnin" type="submit" name="signup" value="signup"> -->
                <!-- <b id="b1"> OR</b><br> -->
                <input id="btn" type="submit" name="register" value="Register">

                <a id="btn" href="login.php"> Bact to Login</a>
              </div>

      </form>
    </div>
  </div>


</body>

</html>