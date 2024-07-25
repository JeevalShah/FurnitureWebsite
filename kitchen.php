<?php
  session_start();
  if($_SESSION['email']==False){
    header('location: login.php');
  }

  include("connection.php");
  $select = mysqli_query($connection,"SELECT * FROM `products` ORDER BY `ID` DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bedroom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>
<style>
  img{
    height: 200px;
    width: 400px;
    margin-left: 20px;
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
                <a class="nav-link active" aria-current="page" href="kitchen.php">KITCHEN</a>
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
      
      <form action="" method="GET">
          <div class="input-group mb-3">
              <select name="Sort_elements" class="form-control">
                <option value="sort">--Select option--</option>
                <option value="price_LTH" <?php if(isset($_GET['Sort_elements']) and $_GET['Sort_elements']=="price_LTH"){echo "selected";}?>>Price: Low to High</option>
                <option value="price_HTL" <?php if(isset($_GET['Sort_elements']) and $_GET['Sort_elements']=="price_HTL"){echo "selected";}?>>Price: High to Low</option>
              </select>
            </div>
            <div class="col-md-3 ms-5">
            
            <div>
              <div>
                <h5>Filter
                  <button type="submit">Search</button>
                </h5>
              </div>
              <div>
                <h6>Brand List</h6>
                <hr>
                <?php
                  $brand_query_run = mysqli_query($connection,"SELECT * FROM `brands`");

                  if(mysqli_num_rows($brand_query_run)>0){
                    foreach($brand_query_run as $brandlist){
                      ?>
                        <div>
                          <input type="checkbox" name="brands[]" value="<?=$brandlist['ID'];?>">
                          <?=$brandlist['Brand']?>
                        </div>
                      <?php
                    }
                  }
                  $count_1 =$count_2 =$count_3 =$count_4 =$count_5 =$count_6 = 0 ;
                  while($res = mysqli_fetch_array($select)){
                    if($res['Price']>=1000 and $res['Price']<5000){
                      $count_1 = $count_1+1;
                    }
                    elseif($res['Price']>=5000 and $res['Price']<10000){
                      $count_2 = $count_2+1;
                    }
                    elseif($res['Price']>=10000 and $res['Price']<50000){
                      $count_3 = $count_3+1;
                    }
                    elseif($res['Price']>=50000 and $res['Price']<200000){
                      $count_4 = $count_4+1;
                    }
                    elseif($res['Price']>=200000 and $res['Price']<500000){
                      $count_5 = $count_5+1;
                    }
                    elseif($res['Price']>=500000){
                      $count_6 = $count_6+1;
                    }
                  }
                  if($count_1>0){
                    echo '<input type="checkbox" name="price[]" value="1"> Between 1000 & 5000<br>';
                  }
                  if($count_2>0){
                    echo '<input type="checkbox" name="price[]" value="2"> Between 5000 & 10000<br>';
                  }
                  if($count_3>0){
                    echo '<input type="checkbox" name="price[]" value="3"> Between 10000 & 50000<br>';
                  }
                  if($count_4>0){
                    echo '<input type="checkbox" name="price[]" value="4"> Between 50000 & 200000<br>';
                  }
                  if($count_5>0){
                    echo '<input type="checkbox" name="price[]" value="5"> Between 200000 & 500000<br>';
                  }
                  if($count_6>0){
                    echo '<input type="checkbox" name="price[]" value="6"> Above 500000';
                  }
                ?>
              </div>
            </div>
            
          </div>
          </form>

          <?php
            if(isset($_GET['Sort_elements'])){
                if($_GET['Sort_elements']=='sort'){
                  $select = mysqli_query($connection,"SELECT * FROM `products` ORDER BY `ID` DESC");
                  if(isset($_GET['brands']) and isset($_GET['price'])){
                    $brandchecked = [];
                    $brandchecked = $_GET['brands'];
                    $pricechecked = [];
                    $pricechecked = $_GET['price'];
        
                    $count = 0;
                    foreach($brandchecked as $rowbrand){
                      foreach($pricechecked as $rowprice){
                      //  echo $rowbrand;
                      //  echo $rowprice."<br>";
                       if($count==1){
                        break;
                       }
                      // while($res = mysqli_fetch_array($sorted)){
                      //   echo $rowbrand;
                      // }
                      $sorted = mysqli_query($connection,"SELECT * FROM `products` ORDER BY `ID` DESC");
                      while($res=mysqli_fetch_array($sorted)){
                        if($res['Category']=="Kitchen"){
                          if(!(in_array($res['Brand ID'], $brandchecked))){
                            continue;
                          }
                          else{
        
                            if($rowprice==1){
                              if($res['Price']>=1000 and $res['Price']<5000){
                                echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
                              }
                            }
        
                            if($rowprice==2){
                              if($res['Price']>=5000 and $res['Price']<10000){
                                if($res['Category']=='Kitchen'){
                                  echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
                                }
                              }
                            }
        
                            if($rowprice==3){
                              if($res['Price']>=10000 and $res['Price']<50000){
                                if($res['Category']=='Kitchen'){
                                  echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
                                }
                              }
                            }
        
                            if($rowprice==4){
                              if($res['Price']>=50000 and $res['Price']<200000){
                                if($res['Category']=='Kitchen'){
                                  echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
                                }
                              }
                            }
        
                            if($rowprice==5){
                              if($res['Price']>=200000 and $res['Price']<500000){
                                if($res['Category']=='Kitchen'){
                                  echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
                                }
                              }
                            }
        
                            if($rowprice==6){
                              if($res['Price']>=500000){
                                if($res['Category']=='Kitchen'){
                                  echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
                                }
                              }
                            }
                          }
                        }
                      }
                      $count=1;
                    }
                  }
                }
        
        
                elseif(isset($_GET['brands'])){
                  $brandchecked = [];
                  $brandchecked = $_GET['brands'];
                  $_count = 0;
                  foreach($brandchecked as $rowbrand){
        
                    if($_count==1){
                      break;
                    }
        
                    $sorted = mysqli_query($connection,"SELECT * FROM `products` ORDER BY `ID` DESC");
                      while($res = mysqli_fetch_array($sorted)){
                        if($res['Category']=='Kitchen'){
                          if(!(in_array($res['Brand ID'],$brandchecked))){
                            continue;
                          }
                          else{
                            echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
                                    $_count = 1;
                          }
                        }
                      }
                    }
                  }


                  elseif(isset($_GET['price'])){
                    $pricechecked = [];
                    $pricechecked = $_GET['price'];
                    foreach($pricechecked as $rowprice){
                      $sorted = mysqli_query($connection,"SELECT * FROM `products` ORDER BY `Price` DESC");
                      while($res = mysqli_fetch_array($sorted)){
                        if($rowprice==1){
                          if($res['Price']<1000 or $res['Price']>=5000){
                            continue;
                          }
                          else{
                            echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
                          }
                        }
                        if($rowprice==2){
                          if($res['Price']<5000 or $res['Price']>=10000){
                            continue;
                          }
                          else{
                            echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
                          }
                        }
                        if($rowprice==3){
                          if($res['Price']<10000 or $res['Price']>=50000){
                            continue;
                          }
                          else{
                            echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
                          }
                        }
                        if($rowprice==4){
                          if($res['Price']<50000 or $res['Price']>=200000){
                            continue;
                          }
                          else{
                            echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
                          }
                        }
                        if($rowprice==5){
                          if($res['Price']<200000 or $res['Price']>=500000){
                            continue;
                          }
                          else{
                            echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
                          }
                        }
                        if($rowprice==5){
                          if($res['Price']<500000){
                            continue;
                          }
                          else{
                            echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
                          }
                        }
                      }
                    }
                  }
                


                }
                else{

                

                if($_GET['Sort_elements']=='price_LTH'){
                    $sort_option = "ASC";
                }
                elseif($_GET['Sort_elements']=='price_HTL'){
                    $sort_option = "DESC";
                }
            

            if(isset($_GET['brands']) and isset($_GET['price'])){
              $brandchecked = [];
              $brandchecked = $_GET['brands'];
              $pricechecked = [];
              $pricechecked = $_GET['price'];

              $count = 0;
              foreach($brandchecked as $rowbrand){
                foreach($pricechecked as $rowprice){
                //  echo $rowbrand;
                //  echo $rowprice."<br>";
                 if($count==1){
                  break;
                 }
                // while($res = mysqli_fetch_array($sorted)){
                //   echo $rowbrand;
                // }
                $sorted = mysqli_query($connection,"SELECT * FROM `products` ORDER BY `Price`". $sort_option);
                while($res=mysqli_fetch_array($sorted)){
                  if($res['Category']=="Kitchen"){
                    if(!(in_array($res['Brand ID'], $brandchecked))){
                      continue;
                    }
                    else{

                      if($rowprice==1){
                        if($res['Price']>=1000 and $res['Price']<5000){
                          echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
                        }
                      }

                      if($rowprice==2){
                        if($res['Price']>=5000 and $res['Price']<10000){
                          echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
                        }
                      }

                      if($rowprice==3){
                        if($res['Price']>=10000 and $res['Price']<50000){
                          echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
                        }
                      }

                      if($rowprice==4){
                        if($res['Price']>=50000 and $res['Price']<200000){
                          echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
                        }
                      }

                      if($rowprice==5){
                        if($res['Price']>=200000 and $res['Price']<500000){
                          echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
                        }
                      }

                      if($rowprice==6){
                        if($res['Price']>=500000){
                          echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
                        }
                      }
                    }
                  }
                }
                $count=1;
              }
            }
          }


          elseif(isset($_GET['brands'])){
            $brandchecked = [];
            $brandchecked = $_GET['brands'];
            $_count = 0;
            foreach($brandchecked as $rowbrand){

              if($_count==1){
                break;
              }

              $sorted = mysqli_query($connection,"SELECT * FROM `products` ORDER BY `Price`". $sort_option);
                while($res = mysqli_fetch_array($sorted)){
                  if($res['Category']=='Kitchen'){
                    if(!(in_array($res['Brand ID'],$brandchecked))){
                      continue;
                    }
                    else{
                      echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
                              $_count = 1;
                    }
                  }
                }
            }
          }

          elseif(isset($_GET['price'])){
            $pricechecked = [];
            $pricechecked = $_GET['price'];
            $_count = 0;
            foreach($pricechecked as $rowprice){
              if($_count==1){
                break;
              }
              $sorted = mysqli_query($connection,"SELECT * FROM `products` ORDER BY `Price`". $sort_option);
              while($res = mysqli_fetch_array($sorted)){
                if($rowprice==1){
                  if($res['Price']<1000 and $res['Price']>=5000){
                    continue;
                  }
                  else{
                    echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
                  }
                }
                if($rowprice==2){
                  if($res['Price']<5000 and $res['Price']>=10000){
                    continue;
                  }
                  else{
                    echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
                  }
                }
                if($rowprice==3){
                  if($res['Price']<10000 and $res['Price']>=50000){
                    continue;
                  }
                  else{
                    echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
                  }
                }
                if($rowprice==4){
                  if($res['Price']<50000 and $res['Price']>=200000){
                    continue;
                  }
                  else{
                    echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
                  }
                }
                if($rowprice==5){
                  if($res['Price']<200000 and $res['Price']>=500000){
                    continue;
                  }
                  else{
                    echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
                  }
                }
                if($rowprice==6){
                  if($res['Price']<500000){
                    continue;
                  }
                  else{
                    echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
                  }
                }
              }
              $_count = 1;
            }
          }

          else{
            $sorted = mysqli_query($connection,"SELECT * FROM `products` ORDER BY `Price`". $sort_option);
                while($res=mysqli_fetch_array($sorted)){
                  if($res['Category']=='Kitchen'){
                    echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
                  }
                }
          }
        }
          
        }
        
        else{
          $select = mysqli_query($connection,"SELECT * FROM `products` ORDER BY `ID` DESC");
          while($res = mysqli_fetch_array($select)){
            if($res['Category']=='Kitchen'){
              echo '<form action="buy.php" method="post">';
               echo'<div class="container card py-3 my-3" id="op1">';
                        echo'<div class="row">';
      
                      echo'<div class="col-4" style="padding-left: 0px;">';
                          echo'<img src="inp-images/'.$res['Photo'].'" alt="">';
                      echo'</div>';
                      echo'<div class="col-8">';
      
                              echo $res['Name'];
                              echo '<br>';
                              echo $res['Brand'];
                              echo '<br>';
                              echo $res['Price'];
                              echo '<br>';
                              echo $res['Return Policy'];
                              echo '<br>';
                              echo $res['Description'];
                              echo '<br>';
                              echo '<br>';
                        echo '<input type=hidden name=Name value='.$res["Name"].'>';
                        echo '<input type=hidden name=Brand value='.$res["Brand"].'>';
                        echo '<input type=hidden name=Price value='.$res["Price"].'>';
                        echo'<button class="me-2" type="submit" name=add>Add to cart</button>';
                        echo'<button type="submit" name=buy>Buy Now</button>';
                      echo'</div>';
                      echo'</div>';
                      echo'</div>';
                echo '</form>';
            }
          }
        }
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
            </div>
          </div>
        </div>
      </div>
</body>
</html>