<?php 
//connection to the data base
$connection = mysqli_connect("localhost","root","","adminpanel"); 

if($connection){

}else{
    $_SESSION['message']='Connection Error';
    $_SESSION['msg_type']="danger";
    header('Location: index.php');
}
?>