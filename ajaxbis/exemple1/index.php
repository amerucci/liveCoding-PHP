<!DOCTYPE html>
<html>
<body>

<h2>Appel AJAX</h2>
<div id="demo">
Ici on va appeler notre contenu grace a l'ajax
</div>


<button type="button" id="button" >Charge le fichier</button>

<script>

document.querySelector("#button").addEventListener("click", function() {
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {

    console.log(this.readyState+' '+this.status )

    if (this.readyState == 0 ) {
      console.log('Etablissement connexion')
    }

    if (this.readyState == 1 ) {
      console.log('Connexion au serveur établie')
    }

    if (this.readyState == 2 ) {
      console.log('Demande recue')
    }

    if (this.readyState == 3 ) {
      console.log('Traitement de la demande')
    }

    if (this.readyState == 4 ) {
      console.log('Demande terminée et réponse prête')
    }
    


    if (this.readyState == 0 && this.status == 200) {
      document.getElementById("demo").innerHTML = this.response;
    }
    
    if (this.readyState == 4 && this.status == 404) {
      document.getElementById("demo").innerHTML = "Couillon ca marche pas";
    }
  };

  xhttp.open("GET", "toShow.php");
  xhttp.send();
})


</script>

</body>
</html>
