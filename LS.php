<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = $_POST['txt'];
    $b = $_POST['email'];
    $c = $_POST['pswd'];

    // Check if the email is already registered
    $checkEmailQuery = "SELECT COUNT(*) FROM cust_data WHERE Email = ?";
    $checkEmailStmt = mysqli_prepare($connection, $checkEmailQuery);
    mysqli_stmt_bind_param($checkEmailStmt, "s", $b);
    mysqli_stmt_execute($checkEmailStmt);
    mysqli_stmt_bind_result($checkEmailStmt, $emailCount);
    mysqli_stmt_fetch($checkEmailStmt);
    mysqli_stmt_close($checkEmailStmt);

    if ($emailCount == 0) {
        $insertQuery = "INSERT INTO cust_data (Username, Email, Password) VALUES (?, ?, ?)";
        $insertStmt = mysqli_prepare($connection, $insertQuery);
        mysqli_stmt_bind_param($insertStmt, "sss", $a, $b, $c);

        if (mysqli_stmt_execute($insertStmt)) {
            header('Location: LS.php');
            exit();
        } else {
            header('Location: Signup.php');
            exit();
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Slide Navbar</title>
    <link rel="stylesheet" type="text/css" href="slide navbar style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Jost', sans-serif;
            /* background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e); */
            /* background-color: green; */
            background-image: url(plant.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }

        .profile {
            display: flex;
            width: 100%;
            margin-left: 25%;
        }

        .image {
            width: 60%;
            height: 32rem;
            margin-left: 10%;


        }

        .responsive {
            width: 100%;
            max-width: 600px;
            height: 100%;
            border-radius: 30px;
            box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.5);
            /* Add the box shadow to the image */

        }

        .main {
            width: 70%;
            height: 500px;
            background: red;
            overflow: hidden;
            background: url("Images/bg-1.jpg") no-repeat center/ cover;
            border-radius: 10px;
            box-shadow: 5px 20px 50px #000;
            margin-top: -10px;
            backdrop-filter: blur(5px);
        }

        #chk {
            display: none;
        }

        .signup {
            position: relative;
            width: 100%;
            height: 100%;
        }

        label {
            color: #fff;
            font-size: 2.5em;
            justify-content: center;
            display: flex;
            margin: 50px;
            font-weight: bold;
            cursor: pointer;
            transition: .5s ease-in-out;
        }


        input {
            width: 60%;
            height: 35px;
            background: #e0dede;
            justify-content: center;
            display: flex;
            margin: 20px auto;
            padding: 10px;
            border: none;
            outline: none;
            border-radius: 5px;
            margin-top: -5px;
        }

        button {
            width: 60%;
            height: 40px;
            margin: 10px auto;
            justify-content: center;
            display: block;
            color: #fff;
            background: #573b8a;
            font-size: 1em;
            font-weight: bold;
            margin-top: 20px;
            outline: none;
            border: none;
            border-radius: 5px;
            transition: .2s ease-in;
            cursor: pointer;
        }

        button:hover {
            background: #6d44b8;
        }

        .login {
            height: 460px;
            background: linear-gradient(90deg, rgba(19, 36, 0, 1) 0%, rgba(21, 121, 9, 1) 51%, rgba(0, 255, 94, 1) 100%);
            border-radius: 60% / 10%;
            transform: translateY(-180px);
            transition: .8s ease-in-out;
        }

        .login label {
            color: #fff;
            transform: scale(.6);
        }

        #chk:checked~.login {
            transform: translateY(-520px);
        }

        #chk:checked~.signup {
            transform: translateY(-20px);
            filter: blur(.1px);

        }

        #chk:checked~.login label {
            transform: scale(1);
        }

        #chk:checked~.signup label {
            transform: scale(.8);
        }
    </style>
</head>

<body>
    <div class="profile">
        <div class="main">
            <input type="checkbox" id="chk" aria-hidden="true">

            <div class="signup">
                <form method="POST" action="Signup.php" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <label for="chk" aria-hidden="true">Sign up</label>
                    <input type="text" name="txt" placeholder="User name" required
                        pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d_]{3,10}$"
                        title="Username must be 3 to 10 characters long and contain at least 1 uppercase letter, 1 lowercase letter, and 1 number.">
                    <input type="email" id="email" name="email" placeholder="Email" required="">
                    <p id="emailError" style="color: red;"></p>
                    <input type="password" name="pswd" placeholder="Password" required="">
                    <button type="submit">Sign up</button>
                </form>
            </div>

            <div method="POST" action="LS.php" class="login">
                <form>
                    <label for="chk" aria-hidden="true">Login</label>
                    <input type="email" name="email" placeholder="Email" required="">
                    <input type="password" name="pswd" placeholder="Password" required="">
                    <button type="submit" name="login" value="login">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function validateForm() {
            var emailInput = document.getElementById("email");
            var emailError = document.getElementById("emailError");

            // Check if the email is already registered using AJAX
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        if (this.responseText === "registered") {
                            // Display an alert for registered email
                            alert("Email Already registered.");
                        } else {
                            emailError.innerHTML = "";
                            emailInput.style.borderColor = "";
                        }
                    } else {
                        // Display an alert for other errors
                        alert("Email other already registered. ");
                    }
                }
            };
            xhttp.open("GET", "check-email.php?email=" + emailInput.value, true);
            xhttp.send();

            // Prevent form submission if email is already registered
            if (emailError.innerHTML !== "") {
                return false;
            }
        }
    </script>
</body>

</html>