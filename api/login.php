<?php
session_start();
include("connect.php");

$mobile = $_POST['mobile'];
$password = $_POST['password'];
$role = $_POST['role'];

$check = mysqli_query($connection, "SELECT * FROM users WHERE mobile='$mobile' AND password='$password' AND role='$role'");

if(mysqli_num_rows($check)>0){
    $userdata = mysqli_fetch_array($check);
    $groups = mysqli_query($connection, "SELECT * FROM users WHERE role=2");
    $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);

    $_SESSION['userdata'] = $userdata;
    $_SESSION['groupsdata'] = $groupsdata;

    echo '
    <script>
    window.location = "../route/dashboard.php";
    </script>
    ';

}
else{
    echo '
    <script>
    alert("user not found");
    window.location = "../route/login.html";
    </script>
    ';
}

?>