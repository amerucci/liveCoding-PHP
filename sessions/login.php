<?php session_start(); ?>
<form method="get">
    <input type="text" name="login" placeholder="Entrez votre login" value="">
    <input type="passwd" name="passwd" placeholder="Entrez votre mot de passe" value="">
    <input type="submit" value="Se connecter">
</form>

<?php
if(isset($_GET['login']) && isset($_GET['passwd'])){
    $_SESSION['connected']=true;
   header('location: ./index.php');
}
?>