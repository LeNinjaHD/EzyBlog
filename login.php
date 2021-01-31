<?php
session_start();
require("langmanager.php");
require("config.php");
$success = true;

if (isset($_GET['signin'])) {
    $loginusername = $_POST['username'];
    $loginpassword = $_POST['password'];
    if ($loginusername == $username) {
        $usernamesuccess = true;
    } else {
        $usernamesuccess = false;
    }
    if ($loginpassword == $password) {
        $passwordsuccess = true;
    } else {
        $passwordsuccess = false;
    }
    if ($passwordsuccess == true || $usernamesuccess == true) {
        $success = true;
        $_SESSION['logged_in'] = true;
        header('Location: ./');
    } else {
        $success = false;
    }
}
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="LeNinjaHD">
    <title><?php echo ($blogname); ?> - <?php echo ($logintext); ?></title>



    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <link href="css/login.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <?php
        if ($success == false) {
            echo ('<div class="alert alert-danger" role="alert">Login Failed</div>');
        }
        ?>
        <form action="?signin=1" method="POST">
            <!--<img class="mb-4" src="" alt="" width="72" height="57">-->
            <h1 class="h3 mb-3 fw-normal"><?php echo ($pleaselogin); ?></h1>
            <label for="username" class="visually-hidden"><?php echo ($usernametext); ?></label>
            <input type="text" name="username" id="username" class="form-control" placeholder="<?php echo ($usernametext); ?>" required autofocus>
            <label for="password" class="visually-hidden"><?php echo ($passwordtext); ?></label>
            <input type="password" name="password" id="password" class="form-control" placeholder="<?php echo ($passwordtext); ?>" required>
            <!--<div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>-->
            <button class="w-100 btn btn-lg btn-primary" type="submit"><?php echo ($signintext); ?></button>
            <p class="mt-5 mb-3 text-muted">&copy; LeProfi Software, 2021</p>
        </form>
    </main>



</body>

</html>