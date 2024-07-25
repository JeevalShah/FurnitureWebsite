<?php
  session_start();
  if($_SESSION['email']==False){
    header('location: login.php');
  }



  include("connection.php");

  $select = mysqli_query($connection,"SELECT * FROM `review` ORDER BY `ID` DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
  #sub{
    border:none;
    width:99%;
    background-color: #cb9e61;
    color: #fefdfc;
}
#sub:hover{
    color: #cb9e61;
    background-color: #fefdfc;
}
</style>
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
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  HOME
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#design">Designs</a></li>
                  <li><a class="dropdown-item" href="#cardd">Tips</a></li>
                  <li><a class="dropdown-item" href="#about">About us</a></li>
                  <li><a class="dropdown-item" href="#nseason">New Season</a></li>
                  <li><a class="dropdown-item" href="#review">Reviews</a></li>
                </ul>
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


    <!-- slider -->
    <div class="image-slider mb-5 sli">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/slider1.jpg" class="d-block w-100" alt="..." >
            <div class="carousel-caption bannerr">
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/slider4.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption">
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/slider3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption">
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon pre" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon next" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>


    <!-- cards -->
    <div class="container Cardd mb-5" id="cardd">
      <h3 class="heading mb-3 mt-4">TIPS</h3>
      <div class="row mx-5 px-5">
        <div class="col-4">
          <div class="flip-card mx-auto">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="images/card1.jpg">
              </div>
              <div class="flip-card-back">
                <img src="images/card2.jpg">
              </div>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="flip-card mx-auto">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="images/card3.jpg">
              </div>
              <div class="flip-card-back">
                <img src="images/card4.jpg">
              </div>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="flip-card mx-auto">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="images/card5.jpg">
              </div>
              <div class="flip-card-back">
                <img src="images/card6.jpg">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mx-5 px-5 mt-5">
        <div class="col-4">
          <div class="flip-card mx-auto">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="images/card7.jpg">
              </div>
              <div class="flip-card-back">
                <img src="images/card8.jpg">
              </div>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="flip-card mx-auto">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="images/card9.jpg">
              </div>
              <div class="flip-card-back">
                <img src="images/card10.jpg">
              </div>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="flip-card mx-auto">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="images/card11.jpg">
              </div>
              <div class="flip-card-back">
                <img src="images/card12.jpg">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mx-5 px-5 mt-5">
        <div class="col-4">
          <div class="flip-card mx-auto">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="images/card13.jpg">
              </div>
              <div class="flip-card-back">
                <img src="images/card14.jpg">
              </div>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="flip-card mx-auto">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="images/card15.jpg">
              </div>
              <div class="flip-card-back">
                <img src="images/card16.jpg">
              </div>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="flip-card mx-auto">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <img src="images/card17.jpg">
              </div>
              <div class="flip-card-back">
                <img src="images/card18.jpg">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- designer -->
    <div class="designer container mb-2 mx-auto" id="about">
        <div class="row mx-auto">
          <div class="col-1 designer-img"></div>
            <div class="col-7 designer-img">
                <img src="images/designer.jpg">
            </div>
            <div class="col-3 designer-txt">
                <h4 class="brownt">
                    This is Kyla, an expert in interior design.
                </h4>
                <h4 class="greyt">
                    Renovate your home. Write to us and let's get started!
                </h4>
                <a href="visit.php">RENEW YOUR HOME</a>
                <p>Home, sweet home</p>
            </div>
        </div>
    </div> 

    <!-- new season -->
    <div class="season" id="nseason">
        <div class="container">
            <h3 class="heading mb-3">NEW SEASON</h3>
            <div class="row">
                <div class="col-4 mt-auto ms-3">
                    <img src="images/season1.jpg" id="s1" class="mx-auto">
                </div>
                <div class="col-5">
                    <img src="images/season2.jpg" id="s2"><br>
                    <img src="images/blank.jpg" id="blank">
                </div>
                <div class="col-1">
                    <img src="images/season3.jpg" id="s3">
                </div>
            
            </div>
        </div>
    </div>

    <!-- testimonial -->
    <div class="container-fluid testimoniall mb-5 pb-5" id="review">
      <div class="row">
        <h3 class="heading mb-3">CUSTOMER REVIEWS</h3>
        <div class="swiper-container">
          <div class="swiper-wrapper">

          <?php
            while($res = mysqli_fetch_array($select)){
              echo'<div class="swiper-slide">';
              echo'<div class="testimonial-card">';
                echo'<div class="customer">';
                  echo'<img src="inp-images/'.$res['Photo'].'" alt="Customer Image">';
                  echo'<p class="customer-name">'.$res['Name'].'</p>';
                echo'</div>';
                echo'<p class="testimonial-text">';
                  echo $res['Review'];
                echo'</p>';
              echo'</div>';
            echo'</div>';
            }
          ?>
          </div>
        </div>
      </div>
    </div>

    <!-- footer -->
    <div class="footer mt-5 py-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-4 pe-5">
            <a href="interior.php">ABOUT</a><br>
            <a href="bedroom.php">BEDROOM</a><br>
            <a href="living.php">LIVING ROOM</a><br>
            <a href="kitchen.php">KITCHEN</a><br>
            <a href="kids.php">KIDS</a><br><br>
            <a href="visit.php"><b>DESIGNER'S VISIT</b></a><br>
            <a href="login.php"><b>LOGIN</b></a><br>
            <a href="signup.php"><b>SIGNUP</b></a><br>
            <a href="gallery.php"><b>GALLERY</b></a><br>
            <a href="seller.php"><b>THE VENDOR</b></a>
          </div>
          <div class="col-4 my-2">
            <p class="para">We are always happy to get feedback from our valued customers so that we can continue to improve our service.</p><br><br>
            <form action="review_action.php" method="post" enctype="multipart/form-data" onsubmit="return formValidator()">
              <label>Photo: </label>
              <input type="file" name="photo" id="photo"><br>
              <input type="text" name="name" id="name" style="background-color: #fefdfc; border: 1px solid black; width: 504px; height: 40px;" placeholder="your Name..."><br>
              <textarea name="review" id="rev" cols="60" rows="4" placeholder="Your Review..." style="border: 1px solid black;" class="mt-2"></textarea><br>
              <input class="py-1" type="submit" name="submit" value="SUBMIT" id="sub" style="width: 505px;">
            </form>
          </div>
          <div class="col-4 ps-5">
            <p>SOLUTIONS FOR EVERY DAY</p>
            <h1>R Decor</h1>
            <p class="p">Home, sweet home</p>
            <p id="demo"></p>
          </div>
        </div>
      </div>
    </div>

</body>

<!-- slider -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

<!-- dropdown -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- testimonial -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  var swiper = new Swiper('.swiper-container', {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
});
</script>
<!-- Form Validation -->
<script>
  function formValidator(){
    var name = document.getElementById('name');
    var rev = document.getElementById('rev');
    var photo = document.getElementById('photo');

    if(isPhoto(photo,"Please insert the photo with jpg or png extension")){    
      if(isEmpty(name,"Please enter the name")){ 
        if(isAlpha(name,"Please enter the correct name")){
          if(isEmpty(rev,"Please enter the review")){
            if(correv(rev,"The length of the review should be between 0 and 200")){
              return true;
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
  function correv(ele,msg){
    if(ele.value.length<=100 && ele.value.length>0){
      return true;
    }
    else{
      alert(msg);
      ele.focus();
      return false;
    }
  }
  function isPhoto(ele,msg){
    if(ele.value.endsWith('png')||ele.value.endsWith('jpg')){
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