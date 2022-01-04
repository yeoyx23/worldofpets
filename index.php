<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <!<!-- Google Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
        
        
        <link rel="stylesheet"
 href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
 integrity=
 "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
 crossorigin="anonymous">
        <!--jQuery-->
<script defer
 src="https://code.jquery.com/jquery-3.4.1.min.js"
 integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
 crossorigin="anonymous">
</script>
<!--Bootstrap JS-->
<script defer
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
 integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"
 crossorigin="anonymous">
</script>
        
        <!--CSS CODE-->
        <link rel="stylesheet" href="css/main.css">
        
        <!-- Custom JS -->
<script defer src="js/main.js"></script>
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

</script>
        
        
        <title>World of Pets!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        
    </head>
    <?php
 include "nav.inc.php";
?>
    
<?php
session_start();
?>    

       
    
<body>
        
 <header class="jumbotron text-center">
 <h1 class="display-4">Welcome to World of Pets!</h1>
 <h2>Home of Singapore's Pet Lovers</h2>
 
<?php
if($_SESSION['lname']=='Yoon'){
?>
 Welcome <?php echo $_SESSION["lname"]; ?>. Click here to <a href="logout.php" tite="Logout">Logout.
     </br>
     <a href="logout.php" tite="Edit Profile">Edit Profile.
         </br>
         <a href="adminpage.php" tite="Logout">Admin Control.
         

<?php
}
elseif ($_SESSION["lname"]) {
?>
 Welcome <?php echo $_SESSION["lname"]; ?>. Click here to <a href="logout.php" tite="Logout">Logout
     </br>
<?php
}
else echo "<h1>Please login first .</h1>";
?>
 
 
 
 
</header>
    
 <main class="container">
     <section id="dogs">
     <h2><span class="pet">All About Dogs!</span> </h2>
 <div class="row">
     <article class="col-sm">
 <h3>Poodles</h3>
 <figure>
     <img class="photo" src="images/poodle_small.jpg" alt="poodle" title="View larger image of poodle" style="width:100%;max-width:300px">
     <figcaption><span class="caption">Standard Poodle</span></figcaption>
</figure>
 <p>
 Poodles are a group of formal dog breeds, the Standard
Poodle, Miniature Poodle and Toy Poodle...
 </p>
 </article>

 
<article class="col-sm">
 <h3>Chihuahua</h3>
  <figure>
 <a>
 <img class="photo" src="images/chihuahua_small.jpg" alt="chihuahua"
 title="View larger image..."/>
 </a>
<figcaption><span class="caption">Chihuahua</span></figcaption>

  </figure>
 <p>
 The Chihuahua is the smallest breed of dog, and is named
after the Mexican state of Chihuahua...
 </p>
 </article>
  </div>
 </section>
     
<section id="cats">
     <h2><span class="pet">All About Cats!</span></h2>
 <div class="row">
<article class="col-sm">
 <h3>Tabby</h3>
  <figure>
 <a>
 <img class="photo" src="images/tabby_small.jpg" alt="tabby"
 title="View larger image..."/>
 </a>
 <figcaption><span class="caption">Tabby Cat</span></figcaption>
</figure>
 <p>
A tabby is any domestic cat with an 'M' on its forehead, stripes by its eyes
and across its cheeks.
 </p>
 </article>
<article class="col-sm">
 <h3>Calico</h3>
  <figure>
 <a>
 <img class="photo" src="images/calico_small.jpg" alt="calico"
 title="View larger image..."/>
 </a>
 <figcaption><span class="caption">Calico Cat</span></figcaption>
  </figure>
 <p>
A calico cat is a domestic cat with a coat that is typically 25% to 75% white 
and has large orange and black patches
 </p>
 </article>
 </div>
 </section>
                           
 </main>
        
 <?php
 include "footer.inc.php";
?>
       
    </body>
</html>
