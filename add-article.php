<?php
session_start();
require("config.php");
require("langmanager.php");
require("mysql.php");

if (!isset($_SESSION['logged_in'])) {
    header("Location: ./");
}
if (isset($_GET['add'])) {
    $articlename = $_POST['articlename'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    #$featured = $_POST['featured'];

    $statement = $pdo->prepare("INSERT INTO articles (articlename, content, author, featured) VALUES (?, ?, ?, ?)");
    $statement->execute(array($articlename, $content, $author, 0));
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title><?php echo ($blogname); ?> - <?php echo ($newarticles); ?></title>



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
        <form action="?add=1" method="POST">
            <!--<img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
            <h1 class="h3 mb-3 fw-normal"><?php echo ($newarticles); ?></h1>
            <input type="text" name="articlename" class="form-control" placeholder="<?php echo ($articlenametext); ?>" required autofocus>
            <input type="text" name="content" class="form-control" placeholder="<?php echo ($articlecontenttext); ?>" required>
            <input type="text" name="author" class="form-control" placeholder="<?php echo ($authortext); ?>" required>
            <p>
                <!--<div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="featured" value="1"> <?php #echo ($featuredtext); 
                                                                        ?>
                </label>
            </div>-->
                <button class="w-100 btn btn-lg btn-primary" type="submit"><?php echo ($addtext); ?></button>
            <p class="mt-5 mb-3 text-muted">&copy; LeProfi Software, 2021</p>
        </form>
    </main>



</body>

</html>