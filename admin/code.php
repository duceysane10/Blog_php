<?php
include('seting.php');
if(!$_SESSION['username']){
    header('Location: index.php');
    $_SESSION['message']='Log in first';
    $_SESSION['msg_type']="danger";
}
$id=0;
$p_id=0;
$p_title ='';
$file = '';
$content2 ='';
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

// EDIT admin FUNTION
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $result=$connection->query("select * from users where id =$id") or die($connection->error());
    $row = $result->fetch_array();
    $username= $row['name'];
    $email = $row['email'];
    $password = $row['password'];
    $userType = $row['userType'];
}
// update Admin
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
    $content = $_POST['conetnt1'];
    $image = $_FILES['img']['name'];
    // image file directory
  	$target = "../img/".basename($image);

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
            //echo mysqli_error();
            $_SESSION['message']='unapple to upload this image';
            $_SESSION['msg_type']="danger";
            header('Location: posts.php');
        }
}
//////////////////////////////////// Deleting Single post /////////////////////////////////////////////////////////
if (isset($_GET['Delete'])){
    $p_id = $_GET['Delete'];
    $query = "DELETE FROM tbl_post where post_id='$p_id'";
    $result = mysqli_query($connection,$query);
    $_SESSION['message']="Deleted post";
    $_SESSION['msg_type']="warning";
    header('Location: posts.php');
}
////////////////////////// updating Posts ///////////////////////////////////////////////////
if(isset($_GET['editP'])){
    $p_id = $_GET['editP'];
    $result=$connection->query("select * from tbl_post where tbl_post.post_id =$p_id") or die($connection->error());
    $row = $result->fetch_array();
    $p_title = $row['post_title'];
    $file = $row['photo']; 
    $content2 = $row['post_content'];
}

if(isset($_POST['update_p'])){
    $p_id=$_POST['p_id'];
    $p_title = $_POST['p_title'];
    $content2 = $_POST['conetnt2'];
    $file = $_FILES['p_img']['name'];
  
     // image file directory
  	$target = "../img/".basename($file );
    $query ="UPDATE `tbl_post` SET `post_title`='$p_title',`photo`='$file',`post_content`='$content2' WHERE `tbl_post`.`post_id`  ='$p_id'";
    $result = mysqli_query($connection,$query);
        if (move_uploaded_file($_FILES['p_img']['tmp_name'], $target)) {
        if($result){
            $_SESSION['message']='Post updated Successfully';
            $_SESSION['msg_type']="success";
            header('Location: posts.php');
        }else{
            $_SESSION['message']='Post Not updated Successfully';
            $_SESSION['msg_type']="info";
            header('Location: posts.php');
        }
    }
    else{
        $_SESSION['message']='uloading error Successfully';
        $_SESSION['msg_type']="info";
        header('Location: posts.php');
    }
}
////////////////////////////////////////// finding Single Post//////////////////////////////////
if (isset($_GET['blog'])){
    $p_id = $_GET['blog'];
    $query = "SELECT * FROM tbl_post where post_id='$p_id'";
    $result = mysqli_query($connection,$query);
    $row = $result->fetch_assoc();
}
////////////////////////////////////////// finding All Post//////////////////////////////////
// function Allposts(){
//     $query = "SELECT * FROM tbl_post";
//     $result = mysqli_query($connection,$query);
//     $Allpost = $result->fetch_assoc();
//     return $Allpost;
// }
//upload ckediter image
if(isset($_FILES['upload']['name']))
    {
        $file = $_FILES['upload']['tmp_name'];
        $file_name = $_FILES['upload']['name'];
        $file_name_array = explode(".", $file_name);
        $extension = end($file_name_array);
        $new_image_name = rand() . '.' . $extension;
        chmod('upload', 0777);//
        $allowed_extension = array("jpg", "gif", "png");
        if(in_array($extension, $allowed_extension))
        {
        move_uploaded_file($file, '../img/' . $new_image_name);
        $function_number = $_GET['CKEditorFuncNum'];
        $url = '../img/' . $new_image_name;
        $message = '';
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
        }
    }
?>

   