<?php
include_once "./user.php";
include_once "./helper.php";

$id=null;
$user=null;
if($_GET["id"]){
$id= $_GET["id"];
$user= User::find($id);
// var_dump($user);
}else{
    header("location:./index.php");
}
// var_dump($_POST);
$errors =[];

if(isset($_POST["edit"])){
    $errors=validate($_POST,["email","name","password"]);
    if(count($errors)<=0){
        $dataUpdate = [
            "id"=>$_POST["id"],
            "name"=>$_POST["name"],
            "email"=>$_POST["email"],
            "password"=>md5($_POST["password"])
        ];
        // var_dump($dataUpdate);
        $userUpdate = User::update($dataUpdate);
        $_SESSION["message"]="Updated Successfully";
        $errors =[];
        header(header:"location:./index.php");
         var_dump($user);
    }
}else {
    $errors=[];
}
// var_dump($errors);
?> 

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit users</title>
  </head>
  <body>
    <div class="container">
        <div>
            <h1>Edit User</h1>
        </div>
        <div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="id" value="<?= $user['id']; ?>">
<div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input name="email" type="email" value="<?= $user["email"];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="text-danger">
                    <?php echo isset($errors["email"]) ? $errors["email"]:"" ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input name="name" type="text" value="<?= $user["name"];?>" class="form-control"  aria-describedby="emailHelp">
                <div class="text-danger">
                    <?php echo isset($errors["name"]) ? $errors["name"]:""?>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input  name="password" type="password" class="form-control" id="exampleInputPassword1">
                <div class="text-danger">
                    <?php echo isset($errors["password"]) ? $errors["password"]:"" ?>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary" name="edit">Update</button>
        </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </body>
</html>