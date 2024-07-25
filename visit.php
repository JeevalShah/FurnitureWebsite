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
                <a class="nav-link active" aria-current="page" href="visit.php"><b>DESIGNER'S VISIT</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="login.php"><b>LOGIN</b></a>
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

          <!-- main -->
          <div class="container-fluid main">
            <form action="visit_action.php" onsubmit="return formValidator()" method="post">
              <div class="row">
                <h3 class="mt-2 ms-auto">BOOK YOUR APPOINTMENT</h3>
            </div>
            <div class="row">
              <div class="col-12">
                <input type="text" placeholder="Your Name*" id="name" name="name" required>
                <input type="email" placeholder="Your Email*" id="email" name="email" required>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <input type="number" placeholder="Your Phone" id="phone" name="phone">
                <input type="text" placeholder="Your Place to be designed" id="place" name="place">
            </div>
            </div>
            <div class="row">
              <div class="col-12">
                <input type="text" placeholder="Your Preferable Date" id="date"
                onfocus="(this.type='date')"
                onblur="(this.type='text')" name="date">
                <input type="time" required min="10:00" max="18:00" name="time">
            </div>
            </div>
            <div class="row">
              <div class="col-12">
                <textarea cols="126" rows="6" placeholder="Your Address..." id="add" name="add"></textarea>
            </div>
            </div>
            <div class="row">
              <div class="col-12">
                <input type="submit" id="sub" value="BOOK APPOINTMENT" name="submit">
            </div>
            </div>
            </form>


                
            </div>
        </div>
</body>
<script>
  function formValidator(){
    var name = document.getElementById('name');
    var email = document.getElementById('email');
    var phone = document.getElementById('phone');
    var place = document.getElementById('place');
    var text = document.getElementById('add');
  const date = new Date(document.getElementById('date').value);
  const today = new Date();
  var dm = date.getMonth();
  var tm = today.getMonth();
  var dd = date.getDate();
  var td = today.getDate();
  var dy = date.getFullYear();
  var ty = today.getFullYear();

    if(isEmpty(name,"Please enter the name")){
      if(isAlpha(name,"Please enter the correct name")){
        if(isEmpty(email,"Please enter the email")){
          if(isemail(email,"Please enter the correct email")){
            if(isEmpty(phone,"Please enter the phone number")){
              if(correctphone(phone,"Please enter a 10 digit phone number")){
                if(isEmpty(place,"Please enter the place that you would like to design")){
                  if(isAlpha(place,"Please enter the correct place")){
                    if(isdate(dm,tm,dd,td,dy,ty,"Please enter the correct date")){
                      if(isEmpty(text,"Please enter the address")){
                        if(isadd(text,"Please enter the address between the length of 10-200 letters")){
                          return true;
                        }
                      }
                    }
                  }
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
  function correctphone(ele,msg){
    if(ele.value.length==10){
      return true;
    }
    else{
      alert(msg);
      ele.focus();
      return false;
    }
  }
  function isadd(ele,msg){
    if(ele.value.length>10 && ele.value.length<=200){
      return true;
    }
    else{
      alert(msg);
      ele.focus();
      return false;
    }
  }
  function isdate(dm,tm,dd,td,dy,ty,msg){
    if((dm==tm && dd>td && dy>=ty)||(dm>tm && dy>=ty)||(dm<tm && dy>ty)){
      return true;
    }
    else{
        alert(msg);
        document.getElementById('date').focus();
        return false;
    }
  }
</script>
</html>