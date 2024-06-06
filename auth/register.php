<?php

//connectiing database

@include('../database/connection.php');

//if condition

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);

    $select = " SELECT * FROM users WHERE email = '$email' && password = '$password'  ";

    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {

        $error[] = 'user already exist!';

    } else{

        if($pass != $cpass){
          $error[] = 'password not matched!';
        }else{
            $insert = "INSERT INTO users(name, email, password) VALUES('$name','$email','$password')";
            mysqli_query($conn, $insert);
          header('location:login.php');
        }

}
;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get started | Smartcity</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.0/mdb.min.css" rel="stylesheet" />
</head>

<body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <h4 class=" text-bold mt-1 mb-5 pb-1">Smart City</h4>
                                    </div>

                                    <form method="post">
                                        <p>Get started to Smart city</p>
                                        <?php
                        if (isset($error)) {
                            foreach ($error as $error) {
                                echo '<span class="text-danger serror-msg">' . $error . '</span>';
                            }
                            ;
                        }
                        ;

                        ?>
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" name="name" id="form2Example11" class="form-control"
                                                placeholder="Phone number or email address" />
                                            <label class="form-label" for="form2Example11">Full name </label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="email" name="email" id="form2Example22" class="form-control" />
                                            <label class="form-label" for="form2Example22">Email</label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="password" name="password" id="form2Example22"
                                                class="form-control" />
                                            <label class="form-label" for="form2Example22">password</label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="password" name="cpassword" id="form2Example22"
                                                class="form-control" />
                                            <label class="form-label" for="form2Example22">Confirm</label>
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button 
                                                class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                                type="submit" name="submit">
                                                Sign in
                                            </button>
                                            Already have one <a class="text-info" href="login.php">login</a>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4 text-bold">We are more than just a company</h4>
                                    <p class="small mb-0">A smart city integrates advanced technologies and data
                                        analytics
                                        to enhance urban living, improve resource management, and ensure sustainable
                                        development.
                                        By leveraging IoT, AI, and connectivity, it aims to create a more efficient,
                                        livable,
                                        and resilient urban environment.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.0/mdb.umd.min.js"></script>

</html>