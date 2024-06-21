<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../main.css" />
    <link rel="stylesheet" href="signin.css" />
    <title>Sign In</title>
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
                <a href="signin.php">Sing In</a>
              </li>
              <li class="nav-item-reg">
                <a href="../../auth/signup/signup.php">Sing Up</a>
              </li>
              <li class="nav-item"><a href="">Products</a></li>
              <li class="nav-item"><a href="">About</a></li>
              <li class="nav-item"><a href="">Contact</a></li>
              <li class="nav-item"><a href="">Account</a></li>
            </ul>
          </nav>
          <nav id="reg">
            <ul>
              <li>
                <a class="regBtn" href="signin.php">Sing In</a>
              </li>
              <li>
                <a id="signUp" class="regBtn" href="../../auth/signup/signup.php"
                  >Sing Up</a
                >
              </li>
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
          <form>
            <fieldset>
              <legend>Sign In</legend>
              <span class="signin-title">Sign In</span>
              <input class="input-email" type="email" placeholder="Email" />
              <input type="password" placeholder="Password" />
              <button class="signin-btn">Sign In</button>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
    <script src="../../main.js"></script>
  </body>
</html>
