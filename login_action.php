<?php
session_start();
include('connection.php');
$f_res = 0;
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $_SESSION['email'] = $email;


        if($name!='' or $email!='' or $pass!=''){
            $select = mysqli_query($connection,"SELECT * FROM `user_accounts` ORDER BY `ID` DESC");
            while($res = mysqli_fetch_array($select)){
                if($res['Name']==$name and $res['Email']==$email and $res['Password']==$pass){
                    $f_res = 1;
                    break;
                }
            }
        }
        if($f_res == 1){
            header('location: interior.php');
        }
        else{
            header('location: login.php');
        }
    }
?>