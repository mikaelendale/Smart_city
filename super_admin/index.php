<?php

//connectiing database

@include('../database/connection.php');

session_start();
if(!isset($_SESSION['user_type'],
$_SESSION['name'],
$_SESSION['user_type'],
$_SESSION['password'],
$_SESSION['user_id'],
$_SESSION['email'],
$_SESSION['verified'],
$_SESSION['profile_picture'],
$_SESSION['biography'],
$_SESSION['role'],
$_SESSION['permissions'],
$_SESSION['date_verified'],)){
    header('location:../auth/login.php');
}

?>

<?php echo $_SESSION['name']; ?><br>
<?php echo $_SESSION['user_type']; ?><br>
<?php echo $_SESSION['password']; ?><br>
<?php echo $_SESSION['user_id']; ?><br>
<?php echo $_SESSION['email']; ?><br>
<?php echo $_SESSION['verified']; ?><br>
<?php echo $_SESSION['profile_picture']; ?><br>
<?php echo $_SESSION['biography']; ?><br>
<?php echo $_SESSION['role']; ?><br>
<?php echo $_SESSION['permissions']; ?><br>
<?php echo $_SESSION['date_verified']; ?><br>