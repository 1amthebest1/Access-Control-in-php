<!DOCTYPE html>
<html lang="en">
<body>

    <form action="login.php" method="post">
    <input type="text" name="user">
    <input type="password" name="pass">
    <input type="submit">
<?php 
    if($_SERVER['REQUEST_METHOD']=="POST"){
    session_start();
    include("db.php");
    $Username=$_POST['user'];
    $Password=$_POST['pass'];

    LOGIN_CHECK($Username,$Password);

    //     session_set_cookie_params([
    //         'lifetime' => 0,
    //         'path' => '/',
    //         'domain' => '',
    //         'secure' => true,
    //         'httponly' => true,
    //         'samesite' => 'Strict']);
    //         setcookie('user', $Username, time() + (86400 * 30), "/");


    // }
    }
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['haha'])){
    echo "<br>";
    echo "param received, good job :) ";
}
else if($_SERVER["REQUEST_METHOD"] == "GET" && !isset($_GET['haha'])){
    echo "You are not authorized";

}
 
 ?>

</body>
</html>
