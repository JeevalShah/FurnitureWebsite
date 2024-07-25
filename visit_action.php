<?php
    // if(isset($_POST['submit'])){
    //     $to = "tarushi.beria183@nmims.edu.in";
    //     $subject = "Visit Scheduled";
    //     $message = $_POST['name'].$_POST['add'];
    //     $header = "From: Designer visit";
    //     if(mail($to,$subject,$message,$header)){
    //         echo "Email sent successfully";
    //     }
    //     else{
    //         echo "Email failed";
    //     }
    // }

    include("connection.php");
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $place = $_POST['place'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $add = $_POST['add'];

        mysqli_query($connection,"INSERT INTO `visit`(`ID`, `Name`, `Email`, `Phone`, `Place`, `Date`, `Time`, `Address`) VALUES ('','$name','$email','$phone','$place','$date','$time','$add')");
    }
?>