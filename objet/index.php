<?php
include('./part/header.php');

if (!isset($_SESSION['name_user'])) {
    header("Location:./login.php");
}

?>

<div class="form">
<?= $_SESSION['name_user']; ?>
<a href="./logout.php">Se déconnecter</a>
</div>


