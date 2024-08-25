<?php

if (isset($_POST["verify_email"])) {
    $email = $_POST["email"];
    $verification_code = $_POST["verification_code"];

    // connect with database
    $conn = mysqli_connect("localhost", "root", "", "plantnest");

    // mark email as verified
    $sql = "UPDATE users SET email_verified_at = NOW() WHERE email = '" . $email . "' AND verification_code = '" . $verification_code . "'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) == 0) {
        echo '<script>
    alert("Verification code failed.");
    window.history.back();
</script>';

        die();
    }

   echo '<script>
    alert("You can login now.");
    window.location.href = "login.php";
</script>';


    exit();
}

?>





<!DOCTYPE html>
<html>

<head>




    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <title>Verification Page</title>
    <style>
        body {
            padding: 0px;

            margin-top: 12px;
            background-repeat: no-repeat;
            background-color: #000000;
            background-size: contain;
            height: 250px;
            color: white;
            ;

        }

        .form-container {
            margin-top: 160px;
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 0 1rem rgba(255, 255, 255, 0.25);
            padding-top: 50px;
            color: white;
            margin-left: 40px;
            width: 500px;
            height: 450px;

        }

        .form-control {
            background-color: #00000091;
            color: white;
            font-weight: 900;
            border: none;
            border-bottom: 2px solid #fff;
            border-radius: 0;
            box-shadow: none;




        }

        #email {
            opacity: 0.3;
            background-color: #ffffff76;
            color: white;
            font-weight: 900;
        }


        #password {
            opacity: 0.3;
            background-color: #ffffff76;
            color: white;
        }

        .mb-3 {
            color: white;
        }

        .text-center {
            color: white;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
        }

        #btnin {
            background-color: #000;
            color: #fff;
            border: none;
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
            width: 270px;
            margin-left: 10px;
            height: 35px;
            border-radius: 10px;
        }

        #btn {
            background-color: #000;
            color: #fff;
            border: none;
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
            width: 270px;
            height: 35px;
            border-radius: 10px;
            margin-left: 20px;
        }

        #btnin:hover {

            background-color: #fdf9f9;
            color: #000000;
            border: none;
            box-shadow: 0 0 0 0.2rem rgba(143, 135, 135, 0.25);
            width: 270px;
            margin-left: 10px;
            font-weight: 900;
        }

        #btn:hover {

            background-color: #fdf9f9;
            color: #000000;
            border: none;
            box-shadow: 0 0 0 0.2rem rgba(143, 135, 135, 0.25);
            width: 270px;
            margin-left: 20px;
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
    </style>
</head>


<body style="background-position: center;">
    <div id="maindiv" style="display:flex">
        <div style="margin-top: 120px">
            <!-- background-image: url(FLEXIFY2.jpg); -->
            <img src="Flexify Images/flexify.jpg" width="800px" alt="">
        </div>
        <div>
            <form method="POST">
                <div class="row justify-content-center">
                    <div class="col-md-6 form-container">
                        <div class="container">
                            <h1 class="text-center">Verify Email </h1>
                            <label for="email" class="form-label"><b>Email</b></label>
                            <input id="email" class="form-control" type="text" name="email"
                                placeholder="Enter Your Email" >
                            <br>
                            <label for="code" class="form-label" value="<?php echo $_GET['email']; ?>"
                                required><b>Verification Code</b></label><br>



                            <input id="password" class="form-control" type="text" name="verification_code"
                                placeholder="Enter Your Verification Code" required />


                            <div id="account">
                                <input id="btnin" type="submit" name="verify_email" value="Verify Email">
                                <a id="btn" href="register.php">Back</a>


                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>