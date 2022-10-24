<?php 
include('seting.php');
if(!$_SESSION['username']){
    header('Location: index.php');
    $_SESSION['message']='Log in first';
    $_SESSION['msg_type']="danger";
}
if(isset($_POST['publish']))
{
    $category = mysqli_real_escape_string($connection,$_POST['category']);
    $stmt = $connection->prepare("SELECT c_id FROM category WHERE category=? limit 1");
    $stmt->bind_param('s', $category);
    $stmt->execute();
    $result = $stmt->get_result();
    $value = $result->fetch_object();
    $category =0;
    foreach($value as $re){
        $category +=$re;
        echo $category;
    }

}