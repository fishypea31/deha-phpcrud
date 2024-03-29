<?php
if(!isset($_SESSION['username'])){
    header('location: loginform.php');
}else{
    session_destroy();
    header('location: loginform.php');
}