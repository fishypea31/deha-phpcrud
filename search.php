<?php
include_once "./user.php";
$user=null;
if($_GET["search"]){
$search= $_GET["search"];
$user= user::search($search);
}
else{
    header("location:./index.php");
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Search users</title>
  </head>
  <body class="container">
<div>       
    <h1>Search Result</h1>
    <div>
      <a class="btn btn-primary" href="./index.php">Back to list</a>
    </div>
    <div>
      <form action="search.php" method="get">
          <input type="text" name="search" id="search" placeholder="Search with name">
          <input type="submit" name="search-button" value="Search">
      </form>
    </div>
    <?php if($user){ ?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
      $count = 1; 
      foreach ($user as $singleUser) {
        ?>
    <tr>
      <th scope="row"><?php echo $singleUser["id"]; ?></th>
      <td><?php echo $singleUser["name"]; ?></td>
      <td><?php echo $singleUser["email"]; ?></td>
      <td>
        <a href="./show.php?id=<?= $singleUser["id"]?>" class="btn btn-info">show</a>
        <a href="./edit.php?id=<?= $singleUser["id"]?>" class="btn btn-warning">edit</a>
        <form class="btn" action="./delete.php" method="post" id="formDelete-<?=$singleUser["id"]?>">
          <input type="hidden" value="<?=$singleUser["id"]?>" name="id">
          <button type="submit" class="btn btn-danger btn-delete">delete</button>
        </form>
      </td>
   </tr>
   <?php
        $count++;
      }
      ?>
  </tbody>
</table>
<?php }else{ ?>
            <h1>User not Found</h1>
    <a href="./index.php" class="btn btn-primary">Back to List</a>
    <?php } ?>
    </div>
    </body>
</html>