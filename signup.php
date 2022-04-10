<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $server = "localhost";
  $username = "root";
  $password = "";
  $database = "users";
  
  $conn = mysqli_connect($server, $username, $password, $database);
  if (!$conn){
      die("Error". mysqli_connect_error());
  }
  
    $username = $_POST["name"];
    $mail = $_POST["mail"];
    $password = $_POST["password"];
    
    $existSql = "SELECT * FROM `users` WHERE username = '$mail'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
       
        $showError = "E-mail Already Exists";
    }
    else{
        
       
            $hash = password_hash($password, PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO `users` ( `Username`, `Email`, `Password`) VALUES ( '$username', '$mail', '$password');";
            $result = mysqli_query($conn, $sql);
            if ($result){
                $showAlert = true;
            }
        }
        
        }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
  <script src="https://kit.fontawesome.com/dab19c3e12.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="signup.css">
</head>
<body>
    <!-- NAV BAR STARTS -->
    <div class="nav">
    <ul>
      <li class="logo">
        <p>SIMPLIFY</p>
      </li>
      <li>
        <i class="fa-solid fa-house"></i>
        <a href="Home.html" class="Home">Home</a>
      </li>
      <li>
        <i class="fa-solid fa-graduation-cap"></i><a href="Home.html" class="College">College</a>
        <div class="submenu">
          <ul>
            <li><a href="" class="IIT">IIT</a></li>
            <li><a href="" class="NIT">NIT</a></li>
            <li><a href="" class="PRIVATE">PRIVATE</a></li>
          </ul>
        </div>


      </li>
      <li> <i class="fa-solid fa-phone"></i><a href="" class="Contact">Contact Us</a>
      </li>
      <li>
        <i class="fa-solid fa-file-lines"></i><a href="DEMO.html" class="Demo">Demo</a>
      </li>
      <li>
        <i class="fa-solid fa-user"></i><a href="" class="About">About</a>
      </li>

    </ul>
  </div>
  <!-- NAV BAR CODE ENDS -->

<!-- BANNER  CODE STARTS -->
  <div class="banner">
    <div class="text">
      <div class="heading animate__animated animate__bounce animate__infinite"><p>Sign Up  Now </p></div>
      <div class="text1">
        <p>Tom and Jerry
          <br>
          are waiting for
          <br>
            YOU
          <br>
         to SignUp.
        </p>
      
      </div>
    </div>
    <div class="image"><img src="signupimg.png" alt=""></div>
  </div>
  <!-- BANNER CODE ENDS -->
  
<?php 
  if($showAlert){
    echo '<div class="alert"><p>Sucess!! You are registered sucessfully.</p>
    <a href="login.php">Click Here, To visit Login Page</a>
    </div> ';}
    if($showError){
    echo  '<div class="alertred"><p>Error!! You are not registered .</p>
    
    </div> ';}
    ?>
<!-- LOGIN FORUM -->
<div class="outer">
   <div class="title"><p>SignUp Now</p>
  </div>
   <form action="signup.php" method="post">
   <div class="user">
     <label for="name">Username: </label>
     <input type="text" name="name" id="name" required>
   </div>
   <div class="mail"> 
      <label for="password">Email: </label>
        <input type="email" maxlength="20" name="mail" id="mail" required>
   </div>
   <div class="pass"> 
      <label for="password">Password: </label>
        <input type="text" maxlength="10" name="password" id="password" required>
   </div>
   
   <div class="submitform"><input type="submit">
  </div>
   </form>
</div>
<!-- LOGIN FORUM ENDS   -->
<div class="end">
    <div class="connect">
      <p>CONNECT </p>
      <form action="">
        <div class="client-name">
          <label for="name">Enter your name: </label>
          <input type="text" name="name" id="name" required>
        </div>
        <div class="client-mail">
          <label for="email">Enter your email: </label>
          <input type="email" name="email" id="email" required>
        </div>
        <div class="query">
          <label for="query">Enter your Query: </label>
          <input type="text" name="query" id="query" required>
        </div>
        <div class="submit">
          <input type="submit" value="ASK!">
        </div>

      </form>
      <!-- <div class="side">
        <div class="tittle"> </div>
      </div> -->
    </div>
    <div class="icons">
      <div class="iconic"><a href=""><i class="fa-brands fa-whatsapp"></i></a></div>
      <div class="iconic"><a href=""><i class="fa-brands fa-twitter"></i></a></div>
      <div class="iconic"><a href=""><i class="fa-brands fa-instagram"></i></a></div>
      <div class="iconic"> <a href=""> <i class="fa-solid fa-envelope"></i></a></div>

    </div>
</div>
</body>
</html>