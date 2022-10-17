<?php
include('seting.php');
$id=0;
// Loging Admin User////////////////////////////////////////////////////////////////////////
if(isset($_POST['login_btn'])){
    $inpemail = $_POST['email'];
    $inpass = md5(($_POST['password']));
   
    if(!empty($inpemail )){
        if(!empty($inpass)){
            $query=("select * from users WHERE email='$inpemail' && password=' $inpass'");
            $result= mysqli_query($connection,$query);
            $row= mysqli_fetch_array($result);
            $email = $row['email'];
            $userType = $row['userType'];
            if($row ){
                if($userType ==="Admin"){
                    $_SESSION['msg_type']="success";
                    $_SESSION['message']='welcome:'."   ".$email;
                    $_SESSION["id"] = $row['id'];
                    $_SESSION['username']=$email;
                    if(isset($_SESSION["id"])) {
                    header('Location: Dashboard.php');
                }            
               }
               else{
                $_SESSION['msg_type']="success";
                $_SESSION["id"] = $row['id'];
                $_SESSION['username']=$email;
                if(isset($_SESSION["id"])) {
                header('Location: ../front/frontEnd.php');
               }
                }
            }else{
                $_SESSION['message']='incrroct eamil or password ';
                $_SESSION['msg_type']="danger";
                header('Location: index.php');
                }
        }
        else{
            $_SESSION['message']='password is reqire';
            $_SESSION['msg_type']="warning";
            header('Location: index.php');
        }
    }else{
        $_SESSION['message']='email  is reqire';
            $_SESSION['msg_type']="warning";
            header('Location: index.php');
    }
}
?>