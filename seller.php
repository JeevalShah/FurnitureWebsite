<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/visit.css">
    <link rel="stylesheet" href="css/register.css">
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
                <a class="nav-link active" aria-current="page" href="seller.php"><b>THE VENDOR</b></a>
              </li>
            </p>
            </ul>
          </div>
        </div>
      </nav>

          <!-- main -->
          <div class="container-fluid main">
            <div class="row mx-auto">
              <form action="seller_action.php" method="post" onsubmit="return form_Validator()" enctype="multipart/form-data">
                <h3 class="mt-2">ADD PRODUCT</h3>
                <div class="col-12">
                        <div class="col-12">
                            <input type="file" name="photo" id="photo">
                            <input type="text" placeholder="Product Name*" id="name" name="name" required style="position: relative; top: 20px;">
                        </div>
                        <div class="col-12">
                            <input type="text" placeholder="Brand Name*" id="brand" name="brand" required>
                            <input type="number" placeholder="Price of the Product" name='price' id="price">
                        </div>
                        <div class="col-12">
                            <select class="sel" id="category" name="category" style="width: 470px;">
                                <option value="none">Category of your product</option>
                                <option value="Bedroom">Bedroom</option>
                                <option value="Living Room">Living Room</option>
                                <option value="Kitchen">Kitchen</option>
                                <option value="Kids">Kids</option>
                            </select>
                            <select class="sel sel1" id="return_policy" name="return_policy" style="width: 470px;">
                                <option value="none">Select the Return Policy</option>
                                <option value="10 days Return">10 days Return</option>
                                <option value="Exchange">Exchange</option>
                                <option value="Not returnable only exchanable">Not returnable only exchanable</option>
                                <option value="nope">Neither returnable nor exchangable</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <textarea cols="126" rows="6" placeholder="Description..." name="description" id="des"></textarea>
                        </div>
                        <div class="col-12">
                            <input type="submit" id="sub" value="ADD PRODUCT" name="submit">
                        </div>
                </div>
              </form>
            </div>
        </div>
</body>
<script>
  function form_Validator(){
    var name = document.getElementById('name');
    var brand = document.getElementById('brand');
    var category = document.getElementById('category');
    var return_policy = document.getElementById('return_policy');
    var des = document.getElementById('des');
    var photo = document.getElementById('photo');

    if(isPhoto(photo,"Please insert the photo with jpg or png extension")){
      if (isAlpha(name,"Please enter the correct Name")){
        if (isAlpha(brand,"Please enter the correct Brand")){
          if (isCategory(category,"Please select the category of your product")){
            if (isReturn(return_policy,"Please select the return policy of your product")){
              if(isDes(des,"Please write a description between the range 0 to 10000")){
                return true;
              }
            }
          }
        }
      }
    }
    return false;
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
  function isCategory(ele,msg){
    if(ele.value=="none"){
      alert(msg);
      ele.focus();
      return false;
    }
    else{
      return true;
    }
  }
  function isReturn(ele,msg){
    if(ele.value=="none"){
      alert(msg);
      ele.focus();
      return false;
    }
    else{
      return true;
    }
  }
  function isDes(ele,msg){
    if(ele.value.length>0 && ele.value.length<=10000){
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