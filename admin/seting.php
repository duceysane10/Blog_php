<?php 
session_start();
include("database/dbconfig.php");
if($connection){

}else{
    $_SESSION['message']='Connection Error';
    $_SESSION['msg_type']="danger";
    header('Location: index.php');
}
?>