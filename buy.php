<?php
    include('connection.php');
    session_start();
    $select = mysqli_query($connection,"SELECT * FROM `cart` ORDER BY `ID` DESC");
?>
<?php
    $f_res = 0;
    $qty = 1;
    // echo $_SESSION['email'];
    if(isset($_POST['add'])){
        // echo $_SESSION['email'];
        $name = $_POST['Name'];
        $brand = $_POST['Brand'];
        $price = $_POST['Price'];
        $email = $_SESSION['email'];

        while($res = mysqli_fetch_array($select)){
            if($res['Email']==$email and $res['Product Name']==$name and  $res['Product Brand']==$brand and $res['Product Price']==$price){
                $id = $res['ID'];
                $qty = $res['Quantity']+1;
                $mysql = mysqli_query($connection,"UPDATE `cart` SET `ID`='$id',`Email`='$email',`Product Name`='$name',`Product Brand`='$brand',`Product Price`='$price',`Quantity`='$qty' WHERE ID = $id");
                $f_res = 1;
                header('location: mycart.php');
                break;
            }
        }
        if($f_res == 0){
            $mysql = mysqli_query($connection,"INSERT INTO `cart`(`ID`, `Email`, `Product Name`, `Product Brand`, `Product Price`, `Quantity`) VALUES ('','$email','$name','$brand','$price','$qty')");
            header('location: mycart.php');
        }
    }
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
  button{
    background-color: #cb9e61;
    color: #fefdfc;
    padding: 12px 25px;
    border: none;
    font-size: 15px;
    text-decoration: none;
  }
  button:hover{
    background-color: #fefdfc;
    color: #cb9e61;
    padding: 12px 25px;
    border: none;
    font-size: 15px;
    text-decoration: none;
  }
  #search{
    padding: 9px 0;
  }
  table{
    text-align: center;
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
                <a class="nav-link active" aria-current="page" href="interior.php">HOME</a>
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

      <?php
          if(isset($_POST['buy'])){
            $name = $_POST['Name'];
            $brand = $_POST['Brand'];
            $price = $_POST['Price'];
            $qty = 1;
            echo '<table border="1px solid black" class="table table-striped mt-5">';
            echo '<tr>';
                echo'<th>';
                    echo'Product Name';
                echo'</th>';
                echo'<th>';
                    echo'Product Brand';
                echo'</th>';
                echo'<th>';
                    echo'Product Price';
                echo'</th>';
                echo'<th>';
                    echo'Quantity';
                echo'</th>';
                
            echo'</tr>';
    
            echo '<td>';
            echo $name;
            echo '</td>';
            echo '<td>';
            echo $brand;
            echo '</td>';
            echo '<td>';
            echo $price;
            echo '</td>';
            echo '<td>';
            echo $qty;
            echo '</td>';
            
            echo '<table>';
    
            echo "<h5 style='margin-left: 100px; margin-top: 10px; font-size: 18px;'>Total: ".$price.'<h5>';
            echo "<button style='position: relative; left: 920px; bottom: 30px; padding: 10px 105px; border-radius: 20px;'><p class='m-auto'>Order Now</p></button>";
        }
      ?>


    <!-- footer -->
    <div class="footer mt-5 py-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-4 pe-5">
            <a href="#">ABOUT</a><br>
            <a href="#">BEDROOM</a><br>
            <a href="#">LIVING ROOM</a><br>
            <a href="#">KITCHEN</a><br>
            <a href="#">KIDS</a><br><br>
            <a href="#"><b>DESIGNER'S VISIT</b></a><br>
            <a href="#"><b>LOGIN</b></a><br>
            <a href="#"><b>SIGNUP</b></a><br>
            <a href="#"><b>GALLERY</b></a><br>
            <a href="#"><b>REGISTRATION</b></a>
          </div>
          <div class="col-4 my-2">
            <p class="para">We are always happy to get feedback from our valued customers so that we can continue to improve our service.</p><br><br>
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


</html>


