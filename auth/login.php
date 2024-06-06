<?php
//connectiing database

@include('../database/connection.php');

//starting session 

session_start();

if (isset($_POST['submit'])) {

    //if submit submit the email and password

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);

    //checking if it is in the db

    $select = " SELECT * FROM users WHERE email = '$email' && password = '$password'";

    $result = mysqli_query($conn, $select);

    //if condition

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);

        //if the user is verified and it is user

        if ($row['user_type'] == 'user' && $row['verified'] == 'yes') {
            $_SESSION['name'] = $row['name'];
            $_SESSION['user_type'] = $row['user_type'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['verified'] = $row['verified'];
            $_SESSION['profile_picture'] = $row['profile_picture'];
            $_SESSION['biography'] = $row['biography'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['permissions'] = $row['permissions'];
            $_SESSION['date_verified'] = $row['date_verified'];
            
            header('location:../user/index.php');

        } 

        // //if the user is verified and it is admin
        
        elseif ($row['user_type'] == 'admin' && $row['verified'] == 'yes') {
            $_SESSION['name'] = $row['name'];
            $_SESSION['user_type'] = $row['user_type'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['verified'] = $row['verified'];
            $_SESSION['profile_picture'] = $row['profile_picture'];
            $_SESSION['biography'] = $row['biography'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['permissions'] = $row['permissions'];
            $_SESSION['date_verified'] = $row['date_verified'];
            
            header('location:../admin/index.php');

        }

        // //if the user is super admin

        elseif($row['user_type'] == 'super_admin') {
            $_SESSION['name'] = $row['name'];
            $_SESSION['user_type'] = $row['user_type'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['verified'] = $row['verified'];
            $_SESSION['profile_picture'] = $row['profile_picture'];
            $_SESSION['biography'] = $row['biography'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['permissions'] = $row['permissions'];
            $_SESSION['date_verified'] = $row['date_verified'];
            
            header('location:../super_admin/index.php');

        }
        
        // // if it is not verified 

        elseif ($row['verified'] == 'no') {
            header('location:../unverified.php');
        };

        //if there is no user
        
    }
    elseif (mysqli_num_rows($result) < 0){
        $error[] = 'Opps!! User Does not Exist';
    }
}
;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Smartcity</title>
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
                                    <p>Please login to your account</p>
                                    <!-- if there is an error -->
                                        <?php
                        if (isset($error)) {
                            foreach ($error as $error) {
                                echo '<span class="text-danger serror-msg">' . $error . '</span>';
                            }
                            ;
                        }
                        ;

                        ?>
                                    <form method="post" action="">
                                        

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="email" name="email" id="form2Example11" class="form-control"
                                                placeholder="Phone number or email address" />
                                            <label class="form-label" for="form2Example11">Email</label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="password" name="password" id="form2Example22"
                                                class="form-control" />
                                            <label class="form-label" for="form2Example22">Password</label>
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                                type="submit" name="submit">Log in</button>
                                            <a class="text-muted" href="#!">Forgot password?</a>
                                        </div>
                                    </form>
                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <p class="mb-0 me-2">Don't have an account?</p>
                                        <a href="register.php"><button type="button" class="btn btn-outline-info">Create
                                                new</button></a>
                                    </div>



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