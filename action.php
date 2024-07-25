<?php
    include("connection.php");
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];

        $select = mysqli_query($connection,"SELECT * FROM `user_accounts` ORDER BY `ID` ASC");

        while($res = mysqli_fetch_array($select)){
            if($email!=$res['Email']){
                $f_result = "true";
            }
            else{
                $f_result = "false";
                break;
            }
        }
        if($f_result=="true"){
            if($pass===$cpass){
                $mysql = mysqli_query($connection,"INSERT INTO `user_accounts`(`ID`, `Name`, `Email`, `Password`, `CPassword`) VALUES ('','$name','$email','$pass','$cpass')");
                echo "<br>data inserted";
            }
        }
    }
?>