<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="botc.css">
  <script src="https://kit.fontawesome.com/dab19c3e12.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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
      <div class="heading animate__animated animate__bounce animate__infinite"><p>Fill The Form</p></div>
      <div class="text1">
        <p>Fill the form correctly.
          <br>
          Verify Contact details.
          <br>
          Verify Before Submit.
          <br>
          Next Step Is Payment.
        </p>
      
      </div>
    </div>
    <div class="image"><img src="form.png" alt=""></div>
  </div>
  <!-- BANNER CODE ENDS -->

<!-- PHP CODE -->
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['mobile'];
        $category = $_POST['category'];
        $rank = $_POST['jeerank'];
        $crl = $_POST['crl'];
        $percentile = $_POST['percentile'];
        $hs = $_POST['hs'];
        
        
      
      // Connecting to the Database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "simplify";

      // Create a connection
      $conn = mysqli_connect($servername, $username, $password, $database);
      // Die if connection was not successful
      if (!$conn){
          die("Sorry we failed to connect: ". mysqli_connect_error());
      }
      else{  
        // Submit these to a database
        // Sql query to be executed INSERT INTO `simplify` ( `Name`, `Email`, `Phone`, `HS`, `Category`, `Rank`, `CRL`, `Percentile`, `Date`) VALUES 
        $sql = "INSERT INTO `simplify` (`Name`, `Email`, `Phone`,  `HS`, `Category`, `Rank`, `CRL`, `Percentile`, `Date`) VALUES ('$name', '$email', '$phone', '$hs', '$category', '$rank', '$crl', '$percentile', current_timestamp());";
        $result = mysqli_query($conn, $sql);
 
        if($result){
          echo '<div class="alert"><p>Sucess!! You are registered sucessfully.</p>
        
          </div> ';
        }
        else{
           
            echo '<div class="alertred"><p>Error!! You are not registered .</p>
            </div> ';
        }

      }

    }

    
?>
<!-- PHP CODE ENDS -->

<!-- FORM CODE -->
  <div class="outer">
    <div class="tittle"><p>Enter Your Detail:</p></div>
    <div class="form" > 
      <form action="/Demo/file.php" method="post">
        <div class="name">
          <label for="name">Enter your name: </label>
          <input type="text" name="name" id="name" required>
        </div>
        <div class="email">
          <label for="email">Enter your email: </label>
          <input type="email" name="email" id="email" required>
        </div>
        <div class="mobile">
          <label for="mobile">Enter your contact number: </label>
          <input type="number" maxlength="10" name="mobile" id="mobile" required>
        </div>
        <div class="category">
          <label for="category">Enter your Category: </label>
          <input type="text" name="category" id="category" required>
        </div>
        <div class="hs">
          <label for="hs">Enter your HS: </label>
          <input type="text" name="hs" id="hs" required>
        </div>
        <div class="jeerank"> 
          <label for="jeerank">Enter your JEE MAINS Rank: </label>
          <input type="number" name="jeerank" id="jeerank" required>
        </div>
        <div class="categoryrank">
          <label for="crl">Enter your Category Rank: </label>
          <input type="number" name="crl" id="crl" required>
        </div>
        <div class="percentile">
          <label for="percentile">Enter your JEE MAINS Percentile: </label>
          <input type="number" name="percentile" id="percentile" required>
        </div>
        <div class="submit1">
          <input type="submit" value="Submit">
        </div>
      </form>
    </div>
  </div>
  <!-- FORM ENDS -->
  <!-- BOTTOM  -->
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
      <div class="side">
        <div class="tittle"> </div>
      </div>
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