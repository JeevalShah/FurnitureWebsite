<?php
    session_start();

    include("connection.php");

    $f_result = 1;
    $select = mysqli_query($connection,"SELECT * FROM `user_accounts` ORDER BY `ID` DESC");

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];

        $_SESSION['email'] = $email;

        while($res = mysqli_fetch_array($select)){
            if($res['Email']==$email){
                $f_result = 0;
                break;
            }
        }
        if($f_result==1){
            if($name!='' or $email!='' or $pass!='' or $cpass!=''){
                $mysql = mysqli_query($connection,"INSERT INTO `user_accounts`(`ID`, `Name`, `Email`, `Password`) VALUES ('','$name','$email','$pass')");
    
                if($mysql){
                    echo "Data Inserted";
                }
            }
        }
        else{
            echo '<script>alert("Email already signed up")</script>';
        }

    }
?>