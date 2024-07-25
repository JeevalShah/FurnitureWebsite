<?php
    include("connection.php");

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $review = $_POST['review'];
        $file = $_FILES['photo']['name'];
        $file_temp = $_FILES['photo']['tmp_name'];

        $mysql = mysqli_query($connection,"INSERT INTO `review`(`ID`, `Photo`, `Name`, `Review`) VALUES ('','$file','$name','$review')");

        if($mysql){
            $move = move_uploaded_file($file_temp,'inp-images/'.$file);
            header("location: interior.php");
        }
    }
?>