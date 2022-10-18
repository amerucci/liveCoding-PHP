<?php



try {
	
$connection = new PDO('mysql:host=localhost;dbname=musique', 'root', '');
}
 catch (PDOException $e) {
print "Erreur !: " . $e->getMessage() . "<br/>";
die();
}

$genre = $_REQUEST["genre"];

$sql = "SELECT * FROM artistes WHERE genre = '".$genre."'";
$req = $connection->query($sql);


while ($artiste=$req->fetch()){
	echo $artiste['nom']."<br/>";
} 

?>