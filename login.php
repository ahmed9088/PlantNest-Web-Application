<?php session_start();
include 'plantdb.php'
    ?>




<?php


if (isset($_POST['login'])) {

    $n = $_POST['name'];
    $p = $_POST['password'];

    $sql = "SELECT * from users where name='$n' and password='$p' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['profile'] = $n;
        header('Location: index.php');
    } else {
        echo 'Incorrect';
        ;

    }
}

?>




<!DOCTYPE html>
<html>

<head>




    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <title>Login Page</title>
    <style>
        body {
            padding: 0px;

            background-repeat: no-repeat;
            background-attachment: fixed;
            background-color: #000000;
            background-image: url(plant.jpg);
            background-size: cover;
            height: 720px;
            color: white;

        }

        .form-container {
            margin-top: 21%;
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 0 1rem rgba(255, 255, 255, 0.25);
            padding-top: 50px;
            color: white;
            margin-left: 40px;
            width: 100%;
            height: 500px;
            background: linear-gradient(to bottom, #003300 0%, #ff0000 100%);
            background-image: url(plant.jpg);

            border-radius: 60px;
            margin-left: 120%;
            opacity: 1;
            box-shadow: 0px 0px 20px 0px white;
        }

        .form-control {
            background-color: black;
            color: white;
            font-weight: 900;
            border: none;
            border-bottom: 2px solid #fff;
            border-radius: 0;
            box-shadow: none;




        }

        #email {
            opacity: 5;
            background-color: #ffffff76;
            color: white;

        }

        h1 {
            background: linear-gradient(to top right, #000000 40%, #ffffff 100%);

        }

        #password {
            opacity: 5;
            background-color: #ffffff76;
            color: white;
            border-radius: 7px;
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
            color: #fff;
            background-color: #000;
            border: none;
            box-shadow: 0 0 0 0.2rem rgba(255, 255, 255, 0.25);
            width: 270px;
            margin-left: 30px;
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
            background: linear-gradient(to bottom, #ffffff 0%, #ff3300 100%);

            width: 270px;
            margin-left: 30px;
            font-weight: 900;
        }

        #btn:hover {

            background-color: #fdf9f9;
            color: #000000;
            border: none;
            background: linear-gradient(to bottom, #ffffff 0%, #ff3300 100%);
            width: 270px;
            margin-left: 20px;
            font-weight: 900;
        }



        #account {
            margin-top: 40px;
            display: flex;
        }

        a {
            text-decoration: none;
            text-align: center;
            padding-top: 4px;
        }



        #forgot {
            margin-top: 10px;
            width: 100%;
            margin-bottom: -10px;
            margin-left: 77%;
            margin-right: 1%;


        }

        #f {
            background: linear-gradient(to bottom, #ff3300 0%, #33ccff 130%);
            border-radius: 10px;
            padding: 3px;
            color: skyblue;
            font-weight: 700;
            font-size: 2vh;
        }

        #f:hover {
            background: linear-gradient(to bottom, #ff3300 0%, #33ccff 180%);
            border-radius: 10px;
            padding: 3px;
            font-weight: 700;

        }

        #start {
            width: 45%;
        }

        @media(max-width:768px) {
            #f {
                font-size: x-small;
            }
        }

        @media(max-width:480px) {
            body {
                height: auto;
            }

            #maindiv {
                width: 180%;
                margin-left: -45%;
            }

            #forgot {
                margin-left: 60%;

            }

            #f {
                font-size: small;
            }
        }

        .logo-overlay {
            width: 610px;
            /* Adjust the width of the logo */
            height: auto;
            /* Maintain aspect ratio */
            border-radius: 20%;
            /* If the logo is circular, apply border-radius to make it circular */
            z-index: 1;
            opacity: 2;
            margin-right: 27%;
            height: 100px;
        }

        #profile {
            margin-bottom: 3%;
        }
    </style>
</head>


<body style="background-position: center;">
    <!-- <script>
    // Load and display the loader
    const loaderFrame = document.createElement('iframe');
    loaderFrame.src = 'loader.php';
    loaderFrame.style = 'position: fixed; top: 0; left: 0; width: 100%; height: 100%; border: none; background-color: black; z-index:1000';
    document.body.appendChild(loaderFrame);

    // Simulate a delay to demonstrate loading
    setTimeout(() => {
      // Remove the loader after a delay (replace this with actual content loading)
      document.body.removeChild(loaderFrame);

      // Restore the background color and overflow
      document.body.style.backgroundColor = '';
      document.body.style.overflow = 'auto';
    }, 4000); // Delay in milliseconds
  </script> -->
    <div id="maindiv" style="display:flex">

        <div id="start">
            <form action="login.php" method="POST">
                <div class="row justify-content-center">
                    <div class="col-md-6 form-container">
                        <div class="container">
                            <div id="profile">
                                <img class="logo-overlay" src="Plant Images\logo lg (2).png" alt="">

                                <h1 class="text-center">Login</h1>
                            </div>


                            <label for="name" class="form-label"><b>Name</b></label>
                            <input id="password" class="form-control" type="text" name="name"
                                placeholder="Enter Your Name" required>
                            <br>
                            <label for="password" class="form-label"><b>Password</b></label>
                            <input id="password" class="form-control" type="password" name="password"
                                placeholder="Enter Your Secret Password" required>
                            <div id="forgot"> <a id="forget" href="forgetpass.php"> <span id="f"> Forget Password ?
                                    </span></a>
                            </div>
                            <div id="account">

                                <input id="btnin" type="submit" name="login" value="login">
                                <a id="btn" href="register.php">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>