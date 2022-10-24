<?php
include('seting.php');
if(!$_SESSION['username']){
    header('Location: index.php');
    $_SESSION['message']='Log in first';
    $_SESSION['msg_type']="danger";
}
$id=0;
$p_id=0;
$user_id=0;
$c_id= 0;
$category='';
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
    //mysqli_real_escape_string : waxy qaadataa laba parameter waxayna faa ideesaa in xogta userka soo galsho inputka si too ah aan data base ka loogu gudbin 
    // waayo userka wuxuu soo galin karaa some code oo html ah taasna database ayeey cilad ku sababi kartaa 
    // marka xogta la soo galsho waxay ubadalee chharecter intaana database ka loo gudbin
    $username = mysqli_real_escape_string($connection,$_POST['username']);
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $userType =mysqli_real_escape_string($connection,$_POST['userType']);
    $confirm_password = mysqli_real_escape_string($connection,$_POST['confirmpassword']);
    $image = mysqli_real_escape_string($connection,$_FILES['img']['name']);
    // image file directory
  	$target = "../img/".basename($image);

    if($password === $confirm_password)
    {
        $encryptpass=md5($password);
        $query = "INSERT INTO users (name,email,password,userType,img) VALUES (?,?,?,?,?)";
        $stmt=mysqli_stmt_init($connection);
        mysqli_stmt_prepare($stmt,$query);
        mysqli_stmt_bind_param($stmt,'sssss',$username,$email,$encryptpass,$userType,$image);
        
        if (move_uploaded_file($_FILES['img']['tmp_name'], $target)) {
            $query_run = mysqli_stmt_execute($stmt);
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
    $user_id =mysqli_real_escape_string($connection,$_SESSION["id"]);
    $title = mysqli_real_escape_string($connection,$_POST['title']);
    // category input
    $category = mysqli_real_escape_string($connection,$_POST['category']);
    $stmt = $connection->prepare("SELECT c_id FROM category WHERE category=? limit 1");
    $stmt->bind_param('s', $category);
    $stmt->execute();
    $result = $stmt->get_result();
    $value = $result->fetch_object();
    $category =0;
    foreach($value as $re){
        $category +=$re;
    }
    ///// end category input
    $content = $_POST['conetnt1'];
    $image = $_FILES['img']['name'];
    // image file directory
  	$target = "../img/".basename($image);

        $query = "INSERT INTO  tbl_post (user_id,post_title,post_content,photo,categ_id) VALUES ('$user_id','$title','$content','$image','$category')";
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
    $c_id=$row['categ_id'];
   ///// category input
   $stmt = $connection->prepare("SELECT category FROM category WHERE c_id=? limit 1");
   $stmt->bind_param('s', $c_id);
   $stmt->execute();
   $result = $stmt->get_result();
   $value = $result->fetch_object();
   foreach($value as $re){
       $category =$re;
   }
   ///// end category input
    $file = $row['photo']; 
    $content2 = $row['post_content'];
    
}

if(isset($_POST['update_p'])){
    //post id
    $p_id=mysqli_real_escape_string($connection,$_POST['p_id']);
    // user ID
    $user_id =$_SESSION["id"];
    //category_id
    // category input
    $category = mysqli_real_escape_string($connection,$_POST['category']);
    $stmt = $connection->prepare("SELECT c_id FROM category WHERE category=? limit 1");
    $stmt->bind_param('s', $category);
    $stmt->execute();
    $result = $stmt->get_result();
    $value = $result->fetch_object();
    $c_id =0;
    foreach($value as $re){
    $c_id +=$re;
    }
    ///// end category input
    $p_title = mysqli_real_escape_string($connection,$_POST['p_title']);
    $content2 = mysqli_real_escape_string($connection,$_POST['conetnt2']);
    $file = mysqli_real_escape_string($connection,$_FILES['p_img']['name']);
  
     // image file directory
  	$target = "../img/".basename($file );
    $query ="UPDATE `tbl_post` SET `user_id`='$user_id',`post_title`='$p_title',`post_content`='$content2',`categ_id`='$c_id',`photo`='$file' WHERE `tbl_post`.`post_id` ='$p_id';";
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

   