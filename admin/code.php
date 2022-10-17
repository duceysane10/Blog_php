<?php
include('seting.php');
if(!$_SESSION['username']){
    header('Location: index.php');
    $_SESSION['message']='Log in first';
    $_SESSION['msg_type']="danger";
}
$id=0;
$username='';
$email = '';
$password = '';
$confirm_password = '';

// registration Admin user
if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password =  $_POST['password'];
    $userType =$_POST['userType'];
    $confirm_password = $_POST['confirmpassword'];
    $image = $_FILES['img']['name'];
    // image file directory
  	$target = "img/".basename($image);

    if($password === $confirm_password)
    {
        $encryptpass=md5($password);
        $query = "INSERT INTO users (name,email,password,userType,img) VALUES ('$username','$email',' $encryptpass','$userType','$image ')";
        if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
            $query_run = mysqli_query($connection, $query);
            if($query_run)
            {
                $_SESSION['message']='Admin is Added Successfully';
                $_SESSION['msg_type']="success";
                header('Location: register.php');
            }else{
                $_SESSION['message']='Admin not Added Successfully';
                $_SESSION['msg_type']="info";
                header('Location: register.php');
            }
        }
        else 
        { 
            $_SESSION['message']='un apple to upload this image';
            $_SESSION['msg_type']="danger";
            header('Location: register.php');
        }
    }
    else 
    {
        $_SESSION['message']='Password and Confirm Password Does not Match';
            $_SESSION['msg_type']="warning";
            header('Location: register.php');

        
    }

}

/////////////// Delete Admin data  //////////////////////////////////////////////////////////////////
if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $query = "DELETE FROM users where id ='$id'";
    $result = mysqli_query($connection,$query);
    $_SESSION['message']='record has been deleted';
    $_SESSION['msg_type']="danger";
    header('Location: register.php');
}

// EDIT FUNTION
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $result=$connection->query("select * from users where id =$id") or die($connection->error());
    $row = $result->fetch_array();
    $username= $row['name'];
    $email = $row['email'];
    $password = $row['password'];
    $userType = $row['userType'];
}
// update function
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userType = $_POST['userType'];
    $confirm_password = $_POST['confirmpassword'];
    if($password === $confirm_password)
    {
        $encryptpass= md5( $password);
        $query ="UPDATE `users` SET `name`='$username',`email`='$email',`password`='$encryptpass',userType='$userType' WHERE `users`.`id`='$id'";
        $result = mysqli_query($connection,$query);
        if($result){
            $_SESSION['message']='Admin updated Successfully';
            $_SESSION['msg_type']="success";
            header('Location: register.php');
        }else{
            $_SESSION['message']='Admin Not updated Successfully';
            $_SESSION['msg_type']="info";
            header('Location: register.php');
        }
    }else{
        $_SESSION['message']='Password and Confirm Password Does not Match';
        $_SESSION['msg_type']="warning";
        header('Location: register.php');
    }
      

}
////////////////////////////// All Blog Posts/////////////////////////////////////////////
//////// creating or publishing post ///////////////////////
if(isset($_POST['publish']))
{
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image = $_FILES['img']['name'];
    // image file directory
  	$target = "img/".basename($image);

        $query = "INSERT INTO  tbl_post (post_title,post_content,photo) VALUES ('$title','$content','$image ')";
        if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
            $query_run = mysqli_query($connection, $query);
            if($query_run)
            {
                $_SESSION['message']='post published';
                $_SESSION['msg_type']="success";
                header('Location: posts.php');
            }else{
                $_SESSION['message']='post not published';
                $_SESSION['msg_type']="waring";
                header('Location: posts.php');
            }
        }
        else 
        { 
            $_SESSION['message']='unapple to upload this image';
            $_SESSION['msg_type']="danger";
            header('Location: register.php');
        }
}
/////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_GET['delete_p'])){
    $p_id = $_GET['delete_P'];
    $query = "DELETE FROM tbl_post where post_id='$p_id'";
    $result = mysqli_query($connection,$query);
    $_SESSION['message']='post has been deleted';
    $_SESSION['msg_type']="danger";
    header('Location: posts.php');
}
?>

   