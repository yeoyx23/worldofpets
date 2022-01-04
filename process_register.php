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

$errorMsg = "";
$success = true;

//Helper function that checks input for malicious or unwanted content.
function sanitize_input($data)
{
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;
}


/*
* Helper function to write the member data to the DB
*/
function saveMemberToDB()
{
 console.log("This is the database function:");
 global $fname, $lname, $email, $pwd_hashed, $errorMsg, $success;
 // Create database connection.
 $config = parse_ini_file('../../private/db-config.ini');
 $conn = new mysqli($config['servername'], $config['username'],
         $config['password'], $config['dbname']);
 // Check connection
 if ($conn->connect_error)
 {
 $errorMsg = "Connection failed: " . $conn->connect_error;
 $success = false;
 }
 else
 {
 // Prepare the statement:
 $stmt = $conn->prepare("INSERT INTO world_of_pets_members(fname, lname, 
email, password) VALUES (?, ?, ?, ?)");
 // Bind & execute the query statement:
 $stmt->bind_param("ssss", $fname, $lname, $email, $pwd_hashed);
 if (!$stmt->execute())
 {
 $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
 $success = false;
 }
 $stmt->close();
 }
 $conn->close();
}




//$firstname = $errorMsg="";
//$lastname = $errorMsg="";
//$password = $errorMsg="";
//$cpassword = $errorMsg="";



// Validate password strength
//$uppercase = preg_match('@[A-Z]@', $password);
//$lowercase = preg_match('@[a-z]@', $password);
//$number    = preg_match('@[0-9]@', $password);
//$specialChars = preg_match('@[^\w]@', $password);






//Validates first name field 
if (empty($_POST["fname"]))
{
 $errorMsg .= "First Name is required.<br>";
 $success = false;
}
else
{
 //validates character input
 $fname = sanitize_input($_POST["fname"]);
if(!preg_match("/^([a-zA-Z' ]+)$/",$fname)){
 $errorMsg .= "Invalid First Name<br>";
 $success = false;
}
}

//Validates last name field 
if (empty($_POST["lname"]))
{
 $errorMsg .= "Last Name is required.<br>";
 $success = false;
}
else
{
 //validates character input
 $lname = sanitize_input($_POST["lname"]);
if(!preg_match("/^([a-zA-Z' ]+)$/",$lname)){
 $errorMsg .= "Invalid Last Name<br>";
 $success = false;
}
}

//password validation
if (empty($_POST["pwd"]))
{
 $errorMsg .= "password is required.<br>";
 $success = false;
}
 else {
    $password = password_hash($_POST["pwd_confirm"], PASSWORD_DEFAULT);
}
/*/
{
//validates character input
 $password = sanitize_input($_POST["pwd"]);
if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8)
{
 $errorMsg .= "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character<br>";
 $success = false;
}
}
/*/

//confirm password validation
if (empty($_POST["pwd_confirm"]))
{
 $errorMsg .= "Confirm password is required.<br>";
 $success = false;
}
else
{
 //validates character input
 $pwd_hashed  = password_hash($_POST["pwd_confirm"], PASSWORD_DEFAULT);
if ($_POST["pwd"] != $_POST["pwd_confirm"]) {
 $errorMsg .= "Passwords do not match<br>";
 $success = false;
}
}
//email validation
if (empty($_POST["email"]))
{
 $errorMsg .= "Email is required.<br>";
 $success = false;
}
else
{
 $email = sanitize_input($_POST["email"]);
 // Additional check to make sure e-mail address is well-formed.
 if (!filter_var($email, FILTER_VALIDATE_EMAIL))
 {
 $errorMsg .= "Invalid email format.";
 $success = false;
 }
}

//success or not
if ($success)
{
    saveMemberToDB();
 echo "<h4>Your Registeration is successful !!</h4>";
 echo "Thank you for signing up <p> " . $lname;
 echo "<form action='signin.php'>"
         ."<button class='btn btn-success'type='submit'>"
         ."Log-in"
         ."</button>"
         ,"</form>";
         
}
else
{
 echo "<h4>Oops!</h4>";
 echo "<h4>The following input errors were detected:</h4>";
 echo "<p>" . $errorMsg . "</p>";
 echo "<form action='register.php'>"
         ."<button class='btn btn-danger'type='submit'>"
         ."return to Sign-Up"
         ."</button>"
         ,"</form>";
         
         

}   
include "footer.inc.php";

?>
