<?php
  include_once "./user.php";
  $users = User::all();
  // var_dump($users);
  $currentPage = $users['current_page'];
  $totalPages = $users['total_pages'];
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CRUD users</title>
  </head>
  <body>
    <div class="container">
    <div><a href="./logout.php" class="btn btn-danger">Log out</a> </div>

        <div>
            <h1>User List</h1>
        </div>
        <?php if(isset($_SESSION["message"])){ ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <p>
      <?php echo ($_SESSION["message"]);unset($_SESSION["message"]); ?>

      </p>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php } ?>

    <a href="./create.php" class="btn btn-primary">Create</a> 
    <div>
      <form action="search.php" method="get">
          <input type="text" name="search" id="search" placeholder="Search with name">
          <input type="submit" name="search-button" value="Search">
      </form>
    </div>
    <div>
      <?php if(count($users['data'])>0){ ?>
       
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
    <?php foreach($users['data'] as $user){ ?>
    <tr>
      <th scope="row"><?php echo $user["id"]; ?></th>
      <td><?php echo $user["name"]; ?></td>
      <td><?php echo $user["email"]; ?></td>
      <td>
        <a href="./show.php?id=<?= $user["id"]?>" class="btn btn-info">show</a>
        <a href="./edit.php?id=<?= $user["id"]?>" class="btn btn-warning">edit</a>
        <form class="btn" action="./delete.php" method="post" id="formDelete-<?=$user["id"]?>">
          <input type="hidden" value="<?=$user["id"]?>" name="id">
          <button type="submit" class="btn btn-danger btn-delete">delete</button>
        </form>
      </td>
    <?php } ?>    </tr>
  </tbody>
  <?php }else{ ?>
    <h2>No data</h2>
    <?php } ?>
</table>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <?php if ($currentPage > 1): ?>
      <li class="page-item"><a class="page-link" href="?page=<?= $currentPage - 1 ?>">Previous</a></li>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
      <li class="page-item <?= ($i === $currentPage) ? 'active' : '' ?>">
        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
      </li>
    <?php endfor; ?>

    <?php if ($currentPage < $totalPages): ?>
      <li class="page-item"><a class="page-link" href="?page=<?= $currentPage + 1 ?>">Next</a></li>
    <?php endif; ?>
  </ul>
</nav>
    </div>

        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
    

      let deleteBtns = document.querySelectorAll(".btn-delete");
    deleteBtns.forEach(function(item){
    item.addEventListener("click",function(event){
      if (confirm("Delete user?")){
      let id=this.getAttribute("id");
      document.querySelector("#formDelete-"+id).submit();
    }
    })
  })
    </script>
  </body>
</html>