<?php
session_start();
if(isset($_POST['logbut'])){
   require 'dbconnect.php';


    //get info from form
    $email=$_POST['email'];
    $password=$_POST['password'];
    $passwordh = md5($password);

    //check for that account
    $sql="SELECT * FROM users WHERE email= '$email' AND password = '$passwordh'";
    $result= mysqli_query($conn,$sql);
    $check = mysqli_num_rows($result);
    if ($check == 1){
        $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] =$row['staff_reg_no'];
            $_SESSION['firstname']=$row['firstname'];
            $role=$row['user_type'];
            if($role=='STUDENT'){
                $_SESSION['course']=$row['course'];
            if ($_SESSION['course']=='COM'){
                $_SESSION['course']='COMPUTER SCIENCE';
            }
            else if ($_SESSION['course']=='AST'){
                $_SESSION['course']='APPLIED STATISTICS AND COMPUTER SCIENCE';
            }
            else
                if($_SESSION['course']=='ACS'){
                $_SESSION['course']='ACTURIAL SCIENCE';
            }
            header("Location:index.php");
            exit();}
            else if($role=='ADMIN'){
                header("Location:admin/admin.php");
                exit();
            }
            else if($role=='LECTURER'){
                header("Location:lecturer/lecturer.php");
                exit();
            }
    }
            else if($check != 1){
        header("Location:login.php?login=FAIL");
        exit();
    }
}
?>
