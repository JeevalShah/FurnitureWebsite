<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/Gallery.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
  img{
    width: 315px;
    height: 180px;
  }
  button{
    background-color: #cb9e61;
    color: #fefdfc;
    padding: 12px 25px;
    border: none;
    font-size: 15px;
  }
  button:hover{
    background-color: #fefdfc;
    color: #cb9e61;
    padding: 10px 25px;
    border: none;
    text-decoration: none;
  }
  h3{
    color: #cb9e61;
    font-size: 20px;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    letter-spacing: 2px;
    position: relative;
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
                <a class="nav-link" href="login.php"><b>LOGIN</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="signup.php"><b>SIGNUP</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="gallery.php"><b>GALLERY</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="seller.php"><b>THE VENDOR</b></a>
              </li>
            </p>
            </ul>
          </div>
        </div>
      </nav>

   
    <section class="portfolio-section" id="portfolio">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 text-center">
            <h3 class="mb-3">OUR DESIGNS</h3>
            </div>
          </div>
          <div class="portfolio-menu mt-2 mb-4">
            <nav class="controls">
              <button type="button" class="outline" data-filter="all">All</button>
              <button type="button" class="outline" data-filter=".bedroom">Bedroom</button>
              <button type="button" class="outline" data-filter=".living">Living Room</button>
              <button type="button" class="outline" data-filter=".kitchen">Kitchen</button>
              <button type="button" class="outline" data-filter=".kids">Kids</button>
            </nav>
          </div>
          <ul class="row portfolio-item" style="list-style: none;">
            <li class="mix bedroom col-xl-3 col-md-4 col-12 col-sm-6 pd">
              <img src="images/bedroom1.jpg" itemprop="thumbnail" alt="Image description" />
            </li>
            <li class="mix kitchen col-xl-3 col-md-4 col-12 col-sm-6 pd">
              <img src="images/kitchen1.jpg" itemprop="thumbnail" alt="Image description" />
            </li>

            <li class="mix kids col-xl-3 col-md-4 col-12 col-sm-6 pd ">
              <img src="images/kids1.jpg"itemprop="thumbnail" alt="Image description" />
            </li>
            <li class="mix bedroom col-xl-3 col-md-4 col-12 col-sm-6 pd">
              <img src="images/bedroom2.jpg" itemprop="thumbnail" alt="Image description" />
            </li>
            <li class="mix kids col-xl-3 col-md-4 col-12 col-sm-6 pd ">
              <img src="images/kids2.jpg"itemprop="thumbnail" alt="Image description" />
            </li>
            <li class="mix living col-xl-3 col-md-4 col-12 col-sm-6 pd">
              <img src="images/living1.jpg" itemprop="thumbnail" alt="Image description" />
            </li>
            <li class="mix kitchen col-xl-3 col-md-4 col-12 col-sm-6 pd">
              <img src="images/kitchen2.jpg" itemprop="thumbnail" alt="Image description" />
            </li>
            <li class="mix living col-xl-3 col-md-4 col-12 col-sm-6 pd">
              <img src="images/living2.jpg" itemprop="thumbnail" alt="Image description" />
            </li>
            <li class="mix living col-xl-3 col-md-4 col-12 col-sm-6 pd">
              <img src="images/living3.jpg" itemprop="thumbnail" alt="Image description" />
            </li>
            <li class="mix bedroom col-xl-3 col-md-4 col-12 col-sm-6 pd">
              <img src="images/bedroom3.jpg" itemprop="thumbnail" alt="Image description" />
            </li>
            <li class="mix kids col-xl-3 col-md-4 col-12 col-sm-6 pd ">
              <img src="images/kids3.jpg"itemprop="thumbnail" alt="Image description" />
            </li>
            <li class="mix kitchen col-xl-3 col-md-4 col-12 col-sm-6 pd">
              <img src="images/kitchen3.jpg" itemprop="thumbnail" alt="Image description" />
            </li>

          </ul>
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
  



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- JS Links -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<!-- Mixitup -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.2.2/mixitup.min.js'></script>
<!-- fancybox -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.js'></script>
<!-- Fancybox js -->
<!-- testimonial -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    /*Downloaded from https://www.codeseek.co/ezra_siton/mixitup-fancybox3-JydYqm */
    // 1. querySelector
    var containerEl = document.querySelector(".portfolio-item");
    // 2. Passing the configuration object inline
    //https://www.kunkalabs.com/mixitup/docs/configuration-object/
    var mixer = mixitup(containerEl, {
      animation: {
        effects: "fade translateZ(-100px)",
        effectsIn: "fade translateY(-100%)",
        easing: "cubic-bezier(0.645, 0.045, 0.355, 1)"
      }
    });
    // fancybox insilaze & options //
    $("[data-fancybox]").fancybox({
      loop: true,
      hash: true,
      transitionEffect: "slide",
      /* zoom VS next////////////////////
      clickContent - i modify the deafult - now when you click on the image you go to the next image - i more like this approach than zoom on desktop (This idea was in the classic/first lightbox) */
      clickContent: function(current, event) {
        return current.type === "image" ? "next" : false;
      }
    });

</script>
</html>