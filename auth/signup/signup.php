<?php
require_once '../connection.php'; 

class Registration {
    private $database;

    public function __construct(Database $db){
        $this->database = $db;
    }

    public function registerUser($firstName, $lastName, $email, $password, $confirmPassword){
        $firstName = $this->database->escapeString($firstName);
        $lastName = $this->database->escapeString($lastName);
        $email = $this->database->escapeString($email);
        $password = $this->database->escapeString($password);

        $error = [];

        if ($password != $confirmPassword){
            $error[] = 'Passwords do not match.';
        } else {
            $selectQuery = "SELECT * FROM registration WHERE email = '$email'";
            $result = $this->database->query($selectQuery);

            if($result && $result->num_rows > 0){
                $error[] = "Cannot register because email already exists.";
            } else {
                $insertQuery = "INSERT INTO registration (firstName, lastName, email, password) VALUES ('$firstName', '$lastName', '$email', '$password')";
                if($this->database->query($insertQuery)){
                    header('Location: ../../index.php');
                    exit;
                } else {
                    $error[] = "Cannot register!";
                }
            }
        }

        if(!empty($error)){
          foreach($error as $err){
              echo '<p>' . $err . '</p>';
          }
      }
    }
}

$data = new Database();
$user = new Registration($data);

if(isset($_POST['signUp'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $user->registerUser($firstName, $lastName, $email, $password, $confirmPassword);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../main.css" />
  <link rel="stylesheet" href="../signin/signin.css" />
  <title>Sign Up</title>
</head>
<body>
  <div class="header">
    <div class="container">
      <div class="navbar">
        <div class="logo">
          <a href="../../index.php">
            <img src="../../images/logo-nakrebi.svg" alt="logo" width="75px" />
          </a>
        </div>
        <nav>
          <ul class="nav-menu">
            <li class="nav-item"><a href="../../index.php">Home</a></li>
            <li class="nav-item-reg">
              <a href="../../auth/signin/signin.php">Sign In</a>
            </li>
            <li class="nav-item-reg">
              <a href="signup.php">Sign Up</a>
            </li>
            <li class="nav-item"><a href="#">Products</a></li>
            <li class="nav-item"><a href="#">About</a></li>
            <li class="nav-item"><a href="#">Contact</a></li>
            <li class="nav-item"><a href="#">Account</a></li>
          </ul>
        </nav>
        <nav id="reg">
          <ul>
            <li><a class="regBtn" href="../../auth/signin/signin.php">Sign In</a></li>
            <li><a id="signUp" class="regBtn" href="signup.php">Sign Up</a></li>
            <li></li>
          </ul>
        </nav>
        <div class="hamburger">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </div>
      </div>
      <div class="form-container">
        <form action="" method="post" id="signUp">
          <fieldset>
            <legend>Sign Up</legend>
            <span class="signin-title">Sign Up</span>
            <input class="input-email" type="text" name="firstName" placeholder="First Name" />
            <input class="input-email" type="text" name="lastName" placeholder="Last Name" />
            <input class="input-email" type="email" name="email" placeholder="Email" />
            <input type="password" name="password" placeholder="Password" />
            <input type="password" name="confirmPassword" placeholder="Confirm Password" />
            <button type="submit" class="signin-btn" name="signUp">Register</button>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
  <script src="../../main.js"></script>
</body>
</html>
