<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/visit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/login.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>
<body>
  
        <!-- logo -->
        <div class="container logo">
            <div class="row">
                <h1>R DECOR</h1>
                <p>SOLUTIONS FOR EVERY DAY</p>
            </div>
        </div>
    
    
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbarr my-1">
        <div class="container">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link" href="interior.php">HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="bedroom.php">BEDROOM</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="living.php">LIVING ROOM</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="kitchen.php">KITCHEN</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="kids.php">KIDS</a>
              </li>
              <li>
                <a href="mycart.php"><i class="fa-solid fa-cart-shopping"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">|</a>
              </li>
              <p class="right">
              <li class="nav-item">
                <a class="nav-link" href="visit.php"><b>DESIGNER'S VISIT</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="login.php"><b>LOGIN</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="signup.php"><b>SIGNUP</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="gallery.php"><b>GALLERY</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="seller.php"><b>THE VENDOR</b></a>
              </li>
            </p>
            </ul>
          </div>
        </div>
      </nav>
    <div>
        
        <div class="container" id="mainn">
        <div class="row">
        <div class="col-10" style="padding-bottom: 320px;">
            <img src="images/login.png" class="img">
        </div>
        <div class="col-2 coll2">
        <form action="login_action.php" method="post" onsubmit="return formValidator()">
          <h3 class="log">LOGIN</h3>
          <p class="log">Don't have an account yet? <a href="signup.php">Sign Up</a></p>
          <input type="text" placeholder="Enter Name" class="log" id="name" name="name"><br><br>
          <input type="email" placeholder="you@example.com" class="log" id="email" name="email"><br><br>
          <input type="password" placeholder="Enter 6 characters or more" class="log" id="pass" name="password"><br><br>
          <input type="submit" id="sub1" value="LOGIN" class="log" name="submit">
          <br><br>
        </form>
    </div>
    </div>
    </div>
    </div>
</body>
<script>
  function formValidator(){
    var name = document.getElementById('name');
    var email = document.getElementById('email');
    var pass = document.getElementById('pass');

    if(isEmpty(name,"Please enter a name")){
      if(isAlpha(name,"Please enter the correct name")){
        if(isEmpty(email,"Plese enter a email")){
          if(isemail(email,"Please enter the correct email")){
            if(isEmpty(pass,"Please enter the password")){
              if(passlen(pass,"Please enter the password of length 6 characters or more")){
                if(ispass(pass,"Please enter the correct password with 6 to 16 characters that would include 1 uppercase letter, 1 lowercase letter, 1 number and any special character")){
                  return true;
                }
              }
            }
          }
        }
      }
    }
    return false;
  }
  function isEmpty(ele,msg){
    if(ele.value!=''){
      return true;
    }
    else{
      alert(msg);
      ele.focus();
      return false;
    }
  }
  function isAlpha(ele,msg){
    exp = /\b([A-ZÀ-ÿ][-,a-z. ']+[ ]*)+/gm;
    if(ele.value.match(exp)){
      return true;
    }
    else{
      alert(msg);
      ele.focus();
      return false;
    }
  }
  function isemail(ele,msg){
    exp = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(ele.value.match(exp)){
      return true;
    }
    else{
      alert(msg);
      ele.focus();
      return false;
    }
  }
  function passlen(ele,msg){
    if(ele.value.length>=6){
      return true;
    }
    else{
      alert(msg);
      ele.focus();
      return false;
    }
  }
  function ispass(ele,msg){
    exp = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/gm;
    if(ele.value.match(exp)){
      return true;
    }
    else{
      alert(msg);
      ele.focus();
      return false;
    }
  }
</script>
</html>