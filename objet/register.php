<?php include('./part/header.php'); ?>

<form class="form">
    <h1>Register</h1>
    <input type="text" name="username" id="username" placeholder="Username" autocomplete="off">
    <input type="password" name="password" id="password" placeholder="Password" autocomplete="off">
    <input type="email" name="email" id="email" placeholder="Email address" autocomplete="off">
    <input type="text" name="firstname" id="firstname" placeholder="First name" autocomplete="off">
    <input type="text" name="lastname" id="lastname" placeholder="Last name" autocomplete="off">
    <input type="submit" value="register" name="action">
    <a href="./login.php">Login</a>
</form>


<?php 

if($_GET['action']=="register" && !empty($_GET['username']) && !empty($_GET['password'])){
$alain = new User();
$alain -> register();
}
