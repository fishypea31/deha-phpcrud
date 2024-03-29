<?php
  include_once "./user.php";

if(isset($_POST["id"])){
    $id=$_POST["id"];
    User::destroy($id);
    $_SESSION["message"]="Deleted successfully";
    header("location:./index.php");
}else{
    $_SESSION["message"]="User not found";
    header("location:./index.php");
}


?>