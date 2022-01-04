<?php
session_start();
?>    
<nav class="navbar navbar-expand-sm navbar-dark bg-dark ">
    <a class="navbar-brand" href="index.php"><img src="images/petlogo1.jpg" alt="alt" width="100" height="100"/></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

 <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#dogs">Dogs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#cats">Cats</a>
      </li>    
    </ul>
     <ul class="navbar-nav">
       <li class="nav-item">
           <a class="nav-link" href="signin.php">
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
 <a href="logout.php" tite="Edit Profile">Edit Profile.
     

<?php
}
else echo " Sign in"
?>
           </a> 

                      

      </li>    
    <li class="nav-item">
        <a class="nav-link" href="register.php">Sign Up</a>
               
      </li> 
     </ul>
   

 </div>
</nav>
