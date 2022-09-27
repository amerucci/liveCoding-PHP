<!doctype html>


<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php if(!empty($title)){
    echo $title;
  }
  else{
    echo "Accueil";
  } ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body style="    height: 100vh;
    width: 100vw;
    justify-content: center;
    align-items: center;
    display: flex;">
  <div class="container">
    <div class="row">
      <p style="width:100%; text-align: center">Les ordres qu'entend le chef d'orchestre</p>
      <div class="col py-5 justify-content-around d-flex">
 
          <a href="plusfort">J'entends rien</a>
          <a href="moinsfort">C'est trop fort</a>
          <a href="gojorge">j'attends le triangle</a>
 

      </div>
    </div>
    <div class="row text-center" style="justify-content:center; align-items:center">
    
    
    <?php if(!empty($lavariablequicontientmoncontenu)){
      echo $lavariablequicontientmoncontenu; 
    }else{
     echo '<p>Le concert se déroule normalement</p>';
    }?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>