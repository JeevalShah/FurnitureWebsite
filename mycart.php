<?php
session_start();
    include('connection.php');
    $select = mysqli_query($connection,"SELECT * FROM `cart` ORDER BY `ID` ASC");

    $select_later = mysqli_query($connection,"SELECT * FROM `save_for_later` ORDER BY `ID` ASC");


?>
<?php
  if($_SESSION['email']==False){
    header('location: login.php');
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
  .cart-table h5{
    margin-left: 100px;
    /*margin-top: 10px;*/
    font-size: 18px;
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
                <a class="nav-link active" href="interior.php">HOME</a>
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
                <a class="nav-link active" href="mycart.php" aria-current="page"><i class="fa-solid fa-cart-shopping"></i></a>
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

echo'<div class="cart-table">';
$total = 0;

echo "<h5>Your Current Cart</h5>";

echo '<form method=post>';
    echo '<div class="input-group mb-3">';
      echo '<p class="m-auto">';
        echo "<input type='text' placeholder='Search Here' name='text' id='search'>";
        echo '<button type="submit" name="search">Search</button>';
      echo '</p>';
    echo '</div>';
echo '</form>';

echo '<table border="1px solid black" class="table table-striped">';
echo '<tr>';

    echo'<th>';
        echo'Name';
    echo'</th>';
    echo'<th>';
        echo'Brand';
    echo'</th>';
    echo'<th>';
        echo'Price';
    echo'</th>';
    echo'<th>';
        echo'Quantity';
    echo'</th>';
    echo'<th>';
        
    echo'</th>';
    echo'<th>';
        
    echo'</th>';
    echo'<th>';
        
    echo'</th>';
    echo'<th>';
        
    echo'</th>';
echo'</tr>';

if(isset($_POST['search'])){
    $txt = $_POST['text'];
    while($res = mysqli_fetch_array($select)){
        if(($txt==$res['Product Name']||$txt==$res['Product Brand']||$txt==$res['Product Price']||$txt==$res['Quantity'])&&$_SESSION['email']==$res['Email']){
            $total = $total + $res['Product Price']*$res['Quantity'];
            echo '<tr>';
            echo'<td>';
                echo $res['Product Name'];
            echo'</td>';
            echo'<td>';
                echo $res['Product Brand'];
            echo'</td>';
            echo'<td>';
                echo $res['Product Price'];
            echo'</td>';
            echo'<td>';
                echo $res['Quantity'];
            echo'</td>';
            echo'<td>';
                echo '<form method=get>';
                    echo '<button type=submit name=add value='.$res["ID"].' onclick="add1()">Add Quantity</button>';
                echo '</form>';
            echo'</td>';
            echo'<td>';
                echo '<form method=get>';
                    echo '<button type=submit name=des value='.$res["ID"].'>Decrease Quantity</button>';
                echo '</form>';
            echo'</td>';
            echo'<td>';
                echo '<form method=get>';
                    echo '<button type=submit name=remove value='.$res["ID"].'>Remove</button>';
                echo '</form>';
            echo'</td>';
            echo'<td>';
            echo '<form method=get>';
                echo '<button type=submit name=save_for_later value='.$res["ID"].'>Save For Later</button>';
            echo '</form>';
        echo'</td>';
        echo'</tr>';
        }
    }
}

else{
while($res = mysqli_fetch_array($select)){
    if($res['Email']==$_SESSION['email']){
        $id = $res['ID'];
        $total = $total + $res['Product Price']*$res['Quantity'];
        echo '<tr>';
        echo'<td>';
            echo $res['Product Name'];
        echo'</td>';
        echo'<td>';
            echo $res['Product Brand'];
        echo'</td>';
        echo'<td>';
            echo $res['Product Price'];
        echo'</td>';
        echo'<td id="new_val">';
            echo $res['Quantity'];;
        echo'</td>';
        echo'<td>';
            echo '<form method=get>';
                echo '<button type=submit name=add value='.$res["ID"].'>Add Quantity</button>';
            echo '</form>';
        echo'</td>';
        echo'<td>';
            echo '<form method=get>';
                echo '<button type=submit name=des value='.$res["ID"].'>Decrease Quantity</button>';
            echo '</form>';
        echo'</td>';
        echo'<td>';
            echo '<form method=get>';
                echo '<button type=submit name=remove value='.$res["ID"].'>Remove</button>';
            echo '</form>';
        echo'</td>';
        echo'<td>';
        echo '<form method=get>';
            echo '<button type=submit name=save_for_later value='.$res["ID"].'>Save For Later</button>';
        echo '</form>';
    echo'</td>';
    echo'</tr>';
    }
}
}

echo'</table>';
echo "<h5>Total: ₹".$total."</h5>";
echo "<button style='position: relative; left: 920px; bottom: 30px; padding: 10px 105px; border-radius: 20px;'><p class='m-auto'>Order Now</p></button>";



echo "<br><br>";
echo "<h5>Save For Later</h5>";
echo '<table border="1px solid black" class="table table-striped">';
    echo '<tr>';
        echo '<th>';
            echo "Name";
        echo '</th>';

        echo '<th>';
            echo "Brand";
        echo '</th>';

        echo '<th>';
            echo "Price";
        echo '</th>';

        echo '<th>';
            echo "Quantity";
        echo '</th>';

    echo '<th>';
    echo '</th>';

    echo '<th>';
    echo '</th>';

    echo '<th>';
    echo '</th>';

    echo '<th>';
    echo '</th>';

    while($res = mysqli_fetch_array($select_later)){
        if($res['Email']==$_SESSION['email']){
        echo '<tr>';
            echo'<td>';
                echo $res['Product Name'];
            echo'</td>';
            echo'<td>';
                echo $res['Product Brand'];
            echo'</td>';
            echo'<td>';
                echo $res['Product Price'];
            echo'</td>';
            echo'<td>';
                echo $res['Quantity'];;
            echo'</td>';
            echo'<td>';
                echo '<form method=get>';
                    echo '<button type=submit name=add1 value='.$res["ID"].'>Add Quantity</button>';
                echo '</form>';
            echo'</td>';
            echo'<td>';
                echo '<form method=get>';
                    echo '<button type=submit name=des1 value='.$res["ID"].'>Decrease Quantity</button>';
                echo '</form>';
            echo'</td>';
            echo'<td>';
                echo '<form method=get>';
                    echo '<button type=submit name=remove1 value='.$res["ID"].'>Remove</button>';
                echo '</form>';
            echo'</td>';
            echo'<td>';
            echo '<form method=get>';
                echo '<button type=submit name=move value='.$res["ID"].'>Move to Cart</button>';
            echo '</form>';
        echo'</td>';
        echo'</tr>';
        }
    }
echo '</table>';

if(isset($_GET['add'])){
    $select = mysqli_query($connection,"SELECT * FROM `cart` ORDER BY `ID` ASC");
    while($res = mysqli_fetch_array($select)){
        if($_GET['add']==$res['ID']){
            $id = $res['ID'];
            $email = $res['Email'];
            $name = $res['Product Name'];
            $brand = $res['Product Brand'];
            $price = $res['Product Price'];
            $qty = $res['Quantity']+1;
            mysqli_query($connection,"UPDATE `cart` SET `ID`='$id',`Email`='$email',`Product Name`='$name',`Product Brand`='$brand',`Product Price`='$price',`Quantity`='$qty' WHERE ID = $id");
            break;
        }
    }
}

if(isset($_GET['des'])){
    $select = mysqli_query($connection,"SELECT * FROM `cart` ORDER BY `ID` ASC");
    while($res = mysqli_fetch_array($select)){
        if($_GET['des']==$res['ID']){
            $id = $res['ID'];
            $email = $res['Email'];
            $name = $res['Product Name'];
            $brand = $res['Product Brand'];
            $price = $res['Product Price'];
            $qty = $res['Quantity']-1;
            if($qty==0){
              mysqli_query($connection,"DELETE FROM `cart` WHERE ID = $id");
              break;
            }
            else{
              mysqli_query($connection,"UPDATE `cart` SET `ID`='$id',`Email`='$email',`Product Name`='$name',`Product Brand`='$brand',`Product Price`='$price',`Quantity`='$qty' WHERE ID = $id");
              break;
            }
        }
    }
}

if(isset($_GET['remove'])){
    $select = mysqli_query($connection,"SELECT * FROM `cart` ORDER BY `ID` ASC");
    while($res = mysqli_fetch_array($select)){
        if($_GET['remove']==$res['ID']){
            mysqli_query($connection,"DELETE FROM `cart` WHERE ID = $id");
            break;
        }
    }
}

if(isset($_GET['save_for_later'])){
    $select = mysqli_query($connection,"SELECT * FROM `cart` ORDER BY `ID` ASC");
    while($res = mysqli_fetch_array($select)){
        if($_GET['save_for_later']==$res['ID']){
            $id = $res['ID'];
            $email = $res['Email'];
            $name = $res['Product Name'];
            $brand = $res['Product Brand'];
            $price = $res['Product Price'];
            $qty = $res['Quantity'];
            // mysqli_query($connection,"INSERT INTO `save_for_later`(`ID`, `Email`, `Product Name`, `Product Brand`, `Product Price`, `Quantity`) VALUES ('','$email','$name','$brand','$price','$qty')");

            $select_later = mysqli_query($connection,"SELECT * FROM `save_for_later` ORDER BY `ID` ASC");
            $f_res = 0;
            while($res=mysqli_fetch_array($select_later)){
                if($email==$res['Email'] && $name==$res['Product Name'] && $brand==$res['Product Brand'] && $price==$res['Product Price']){
                    $n_id = $res['ID'];
                    $n_email = $res['Email'];
                    $n_name = $res['Product Name'];
                    $n_brand = $res['Product Brand'];
                    $n_price = $res['Product Price'];
                    $f_res = 1;
                    $quantity = $res['Quantity']+$qty;
                    mysqli_query($connection,"UPDATE `save_for_later` SET `ID`='$n_id',`Email`='$n_email',`Product Name`='$n_name',`Product Brand`='$n_brand',`Product Price`='$n_price',`Quantity`='$quantity' WHERE ID = $n_id");
                    break;
                }
                else{
                    $f_res = 0;
                }
            }

            if($f_res==0){
                mysqli_query($connection,"INSERT INTO `save_for_later`(`ID`, `Email`, `Product Name`, `Product Brand`, `Product Price`, `Quantity`) VALUES ('','$email','$name','$brand','$price','$qty')");
            }
            // echo $quantity;
            mysqli_query($connection,"DELETE FROM `cart` WHERE ID = $id");
            break;
        }
    }
}



if(isset($_GET['add1'])){
    $select = mysqli_query($connection,"SELECT * FROM `save_for_later` ORDER BY `ID` ASC");
    while($res = mysqli_fetch_array($select)){
        if($_GET['add1']==$res['ID']){
            $id = $res['ID'];
            $email = $res['Email'];
            $name = $res['Product Name'];
            $brand = $res['Product Brand'];
            $price = $res['Product Price'];
            $qty = $res['Quantity']+1;
            mysqli_query($connection,"UPDATE `save_for_later` SET `ID`='$id',`Email`='$email',`Product Name`='$name',`Product Brand`='$brand',`Product Price`='$price',`Quantity`='$qty' WHERE ID = $id");
            break;
        }
    }
}

if(isset($_GET['des1'])){
    $select = mysqli_query($connection,"SELECT * FROM `save_for_later` ORDER BY `ID` ASC");
    while($res = mysqli_fetch_array($select)){
        if($_GET['des1']==$res['ID']){
            $id = $res['ID'];
            $email = $res['Email'];
            $name = $res['Product Name'];
            $brand = $res['Product Brand'];
            $price = $res['Product Price'];
            $qty = $res['Quantity']-1;
            if($qty==0){
              mysqli_query($connection,"DELETE FROM `save_for_later` WHERE ID = $id");
              break;
            }
            else{
              mysqli_query($connection,"UPDATE `save_for_later` SET `ID`='$id',`Email`='$email',`Product Name`='$name',`Product Brand`='$brand',`Product Price`='$price',`Quantity`='$qty' WHERE ID = $id");
              break;
            }
        }
    }
}

if(isset($_GET['remove1'])){
    //echo"yayy";
    $select = mysqli_query($connection,"SELECT * FROM `save_for_later` ORDER BY `ID` ASC");
    while($res = mysqli_fetch_array($select)){
        if($_GET['remove1']==$res['ID']){
            $id = $res['ID'];
            mysqli_query($connection,"DELETE FROM `save_for_later` WHERE ID = $id");
            break;
        }
    }
}

if(isset($_GET['move'])){
    $select = mysqli_query($connection,"SELECT * FROM `save_for_later` ORDER BY `ID` ASC");
    while($res = mysqli_fetch_array($select)){
        if($_GET['move']==$res['ID']){
            $id = $res['ID'];
            $email = $res['Email'];
            $name = $res['Product Name'];
            $brand = $res['Product Brand'];
            $price = $res['Product Price'];
            $qty = $res['Quantity'];

            $select_later = mysqli_query($connection,"SELECT * FROM `cart` ORDER BY `ID` ASC");
            $f_res = 0;
            while($res=mysqli_fetch_array($select_later)){
                if($email==$res['Email'] && $name==$res['Product Name'] && $brand==$res['Product Brand'] && $price==$res['Product Price']){
                    $n_id = $res['ID'];
                    $n_email = $res['Email'];
                    $n_name = $res['Product Name'];
                    $n_brand = $res['Product Brand'];
                    $n_price = $res['Product Price'];
                    $f_res = 1;
                    $quantity = $res['Quantity']+$qty;
                    mysqli_query($connection,"UPDATE `cart` SET `ID`='$n_id',`Email`='$n_email',`Product Name`='$n_name',`Product Brand`='$n_brand',`Product Price`='$n_price',`Quantity`='$quantity' WHERE ID = $n_id");
                    break;
                }
                else{
                    $f_res = 0;
                }
            }

            if($f_res==0){
                mysqli_query($connection,"INSERT INTO `cart`(`ID`, `Email`, `Product Name`, `Product Brand`, `Product Price`, `Quantity`) VALUES ('','$email','$name','$brand','$price','$qty')");
            }
            mysqli_query($connection,"DELETE FROM `save_for_later` WHERE ID = $id");
            break;
        }
    }
}

echo'</div>';
?>


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


