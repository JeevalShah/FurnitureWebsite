<?php
    include("connection.php");
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $brand = $_POST['brand'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $return_policy = $_POST['return_policy'];
        $description = $_POST['description'];
        $file = $_FILES['photo']['name'];
        $file_temp = $_FILES['photo']['tmp_name'];

        $select = mysqli_query($connection,"SELECT * FROM `brands` ORDER BY `ID` DESC");

        $f_result = 'true';
        while($res = mysqli_fetch_array($select)){
            if($res['Brand']===$brand){
                $f_result = 'false';
                break;
            }
        }

        if($f_result=='true'){
            $mysql1 = mysqli_query($connection,"INSERT INTO `brands`(`ID`, `Brand`) VALUES ('','$brand')");
        }

        $select = mysqli_query($connection,"SELECT * FROM `brands` ORDER BY `ID` DESC");
    
        while($res = mysqli_fetch_array($select)){
            if($res['Brand']==$brand){
                $brandID = $res['ID'];
                $mysqli = mysqli_query($connection,"INSERT INTO `products`(`ID`, `Photo`, `Name`, `Brand`, `Brand ID`, `Price`, `Category`, `Return Policy`, `Description`) VALUES ('','$file','$name','$brand','$brandID','$price','$category','$return_policy','$description')");
                break;
            }
        }
        if($mysqli){
            $move = move_uploaded_file($file_temp,'inp-images/'.$file);
        }

    }

 



    
?>