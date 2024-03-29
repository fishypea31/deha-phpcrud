<?php
require_once 'DB.php';
$conn = new mysqli('localhost', 'root', '', 'crud');
if (isset($_GET['registersuccess'])) {
    echo '<div role="alert">
    Register success
  </div>';
}
$errors = [];
if (isset($_POST['login_btn'])) {
    $username = htmlspecialchars($_POST['username']);
    $conn->real_escape_string($username);
    $password = htmlspecialchars($_POST['password']);
    $conn->real_escape_string($password);
    if (empty($username)) {
        $errors['username'] = 'Username is required';
    }
    if (empty($password)) {
        $errors['password'] = 'Password is required';
    }
    if (strlen($username) < 4 || strlen($username) > 20) {
        $errors['username_len'] = 'Username must be between 4 and 20 characters';
    }
    if (strlen($password) < 4 || strlen($password) > 20) {
        $errors['password_len'] = 'Password must be between 4 and 20 characters';
    }
    $sql = sprintf("SELECT * FROM admins WHERE username = '%s' AND password = '%s'", $username, $password);
    $result = $conn->query($sql);
    // var_dump($sql);
    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header('Location: index.php');
    } else {
        $errors['login_fail'] = 'Incorrect Username or Password';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body class="container">
    <form id="login_form" method="post" >
        <h1>Login form</h1>
        <div class="mb-3">
            <input class="form-control"  type="text" id="username" name="username" placeholder="Enter username" required minlength="4" maxlength="20">
        </div>
        <div class="mb-3">
            <input class="form-control"  type="password" id="password" name="password" placeholder="Enter password" required minlength="4" maxlength="20">
        </div>
        <input type="submit" value="login" name="login_btn" class="btn btn-primary" />
        <?php
        foreach ($errors as $error) {
            echo '<div role="alert">
                            ' . $error . '
                          </div>';
        }
        ?>
    </form>
    <div><a href="./registerform.php" class="btn btn-danger">Register</a> </div>

</body>

</html>