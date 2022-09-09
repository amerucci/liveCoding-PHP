<?php include('./part/header.php'); ?>


<form class="form">
<h1>Login</h1>
    <input type="text" name="username" id="username" placeholder="Username">
    <input type="password" name="password" id="password" placeholder="Password">
    <input type="submit" value="login" name="action">
    <a href="./register.php">Register</a>
</form>


<?php 

if($_GET['action']=="login" ){
$alain = new User();
$alain -> login();
}