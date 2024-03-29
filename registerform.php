<?php
require_once 'DB.php';
include_once "./admins.php";
include_once "./helper.php";
$errors =[];

if(isset($_POST["register"])){
    $errors=validate($_POST,["fullname","username","email","phone","password"]);
    if(count($errors)<=0){
        $dataRegister = [
            "fullname"=>$_POST["fullname"],
            "username"=>$_POST["username"],
            "email"=>$_POST["email"],
            "phone"=>$_POST["phone"],
            "password"=>$_POST["password"],
        ];
        $adminRegister = admins::register($dataRegister);
        $_SESSION["message"]="Registered Successfully";
        $errors =[];
        header(header:"location:./loginform.php");
        // var_dump($user);
    }
}else {
    $errors=[];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</head>

<body>
    <section>
        <div>
            <div class="container">
                <form id="register_form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <h1>Register a new membership</h1>
                    <div class="mb-3">
                        <input class="form-control"  type="text" id="fullname" name="fullname" placeholder="Enter fullname">
                        <div id="Help" class="text-danger">
                            <?php echo isset($errors["fullname"]) ? $errors["fullname"]:"" ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input class="form-control"  type="text" id="username" name="username" placeholder="Enter username" required minlength="4" maxlength="20">
                        <div id="Help" class="text-danger">
                            <?php echo isset($errors["username"]) ? $errors["username"]:"" ?>
                        </div></div>
                    <div class="mb-3">
                        <input class="form-control"  type="email" id="email" name="email" placeholder="Enter email" required>
                        <div id="lHelp" class="text-danger">
                            <?php echo isset($errors["email"]) ? $errors["email"]:"" ?>
                        </div></div>
                    <div class="mb-3">
                        <input class="form-control"  type="text" pattern="[0-9]{10,11}" id="phone" name="phone" placeholder="Enter phone" required>
                        <div id="lHelp" class="text-danger">
                            <?php echo isset($errors["phone"]) ? $errors["phone"]:"" ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input class="form-control"  type="password" id="password" name="password" placeholder="Enter password" required minlength="4" maxlength="20">
                        <div id="lHelp" class="text-danger">
                            <?php echo isset($errors["password"]) ? $errors["password"]:"" ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input class="form-control"  type="password" id="password_confirm" name="password_confirm" placeholder="Retype password" required minlength="4" maxlength="20">
                    </div>
                    <div class="mb-3">
                        <input   type="checkbox" name="aggree" /> I agree to the terms
                    </div>
                    <input class="form-control"  type="hidden" name="register" value="1" />
                    <input class="btn btn-primary"  class="form-control"  type="submit" value="Regsiter" name="register_btn" />
                    <a href="loginform.php">I already have a membership</a>
                    <?php
                    foreach ($errors as $error) {
                        echo '<p class="text-danger">' . $error . '</p>';
                    }
                    ?>
                </form>
            </div>
        </div>
    </section>
    <script>
        $('#password_confirm').on('keyup', function(e) {
            if ($('#password').val() != $('#password_confirm').val()) {
                $('#password_confirm').addClass('is-invalid');
            } else {
                $('#password_confirm').removeClass('is-invalid');
            }
        });

        $('#regsiter_form').on('submit', function(e) {
            e.preventDefault();
            form = e.target;
            if ($('input[name=aggree]').is(':checked')) {
                if ($('#password').val() == $('#password_confirm').val()) {
                    form.submit();
                } else {
                    alert('Password not match');
                }
            } else {
                alert('You must agree to the terms');
            }
        });
    </script>
</body>

</html>