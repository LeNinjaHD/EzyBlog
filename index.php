<?php
session_start();
require("langmanager.php");
require("mysql.php");
if (isset($_SESSION['logged_in'])) {
  $logged_in = true;
} else {
  $logged_in = false;
}
?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="<?php echo ($blogdescription); ?>">
  <meta name="author" content="LeNinjaHD">
  <title><?php echo $blogname; ?></title>



  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
  <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#7952b3">


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


  <!-- Custom styles for this template -->
  <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/blog.css" rel="stylesheet">
</head>

<body>

  <div class="container">
    <header class="blog-header py-3">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
          <?php
          if ($logged_in == true) {
          ?>
            <a class="btn btn-sm btn-outline-secondary" href="add-article.php"><?php echo ($addarticletext); ?></a>
          <?php
          } else {
          ?>
            <a class="btn btn-sm btn-outline-secondary" href="login.php"><?php echo ($logintext); ?></a>
          <?php
          }
          ?>
        </div>
        <div class="col-4 text-center">
          <a class="blog-header-logo text-dark" href="./"><?php echo ($blogname); ?></a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
          <?php
          if ($logged_in == false) {
          ?>
          <a class="btn btn-sm btn-outline-secondary disabled" tabindex="-1" href=""><?php echo ($adminpaneltext); ?></a>
          <?php
          } else {
          ?>
            <a class="btn btn-sm btn-outline-secondary" href="admin.php"><?php echo ($adminpaneltext); ?></a>
          <?php
          }
          ?>
        </div>
      </div>
    </header>

    <!--<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      <a class="p-2 link-secondary" href="#">World</a>
      <a class="p-2 link-secondary" href="#">U.S.</a>
      <a class="p-2 link-secondary" href="#">Technology</a>
      <a class="p-2 link-secondary" href="#">Design</a>
      <a class="p-2 link-secondary" href="#">Culture</a>
      <a class="p-2 link-secondary" href="#">Business</a>
      <a class="p-2 link-secondary" href="#">Politics</a>
      <a class="p-2 link-secondary" href="#">Opinion</a>
      <a class="p-2 link-secondary" href="#">Science</a>
      <a class="p-2 link-secondary" href="#">Health</a>
      <a class="p-2 link-secondary" href="#">Style</a>
      <a class="p-2 link-secondary" href="#">Travel</a>
    </nav>
  </div>-->
  </div>

  <main class="container">
    <?php
    $statement = $pdo->prepare("SELECT * FROM articles WHERE featured = 1");
    $statement->execute();
    while ($row = $statement->fetch()) {
    ?>
      <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-italic"><?php echo ($row['articlename']); ?></h1>
          <p class="lead my-3"><?php echo ($row['content']); ?></p>
          <p class="lead mb-0"><?php echo ($row['author']); ?></p>
        </div>
      </div>
    <?php
    }
    ?>

    <!--<div class="row mb-2">
      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">World</strong>
            <h3 class="mb-0">Featured post</h3>
            <div class="mb-1 text-muted">Nov 12</div>
            <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="stretched-link">Continue reading</a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
            </svg>

          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-success">Design</strong>
            <h3 class="mb-0">Post title</h3>
            <div class="mb-1 text-muted">Nov 11</div>
            <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="stretched-link">Continue reading</a>
          </div>
          <div class="col-auto d-none d-lg-block">
            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
              <title>Placeholder</title>
              <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
            </svg>

          </div>
        </div>
      </div>
    </div>-->

    <div class="row">
      <div class="col-md-8">
        <h3 class="pb-4 mb-4 font-italic border-bottom">
          <?php echo ($newarticles); ?>
        </h3>
        <?php
        $statement = $pdo->prepare("SELECT * FROM articles");
        $statement->execute();
        while ($row = $statement->fetch()) {
        ?>
          <article class="blog-post">
            <h2 class="blog-post-title"><?php echo ($row['name']); ?></h2>
            <p class="blog-post-meta">January 1, 2014 <?php echo ($by); ?> <a href="#"><?php echo ($row['author']); ?></a></p>

            <p><?php echo ($row['content']); ?></p>
          </article><!-- /.blog-post -->
        <?php
        }
        ?>
      

        <nav class="blog-pagination" aria-label="Pagination">
          <a class="btn btn-outline-primary" href="#">Older</a>
          <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
        </nav>

      </div>

      <div class="col-md-4">
        <div class="p-4 mb-3 bg-light rounded">
          <h4 class="font-italic"><?php echo ($about); ?></h4>
          <p class="mb-0"><?php echo ($abouttext); ?></p>
        </div>

        <!--<div class="p-4">
        <h4 class="font-italic">Archives</h4>
        <ol class="list-unstyled mb-0">
          <li><a href="#">March 2014</a></li>
          <li><a href="#">February 2014</a></li>
          <li><a href="#">January 2014</a></li>
          <li><a href="#">December 2013</a></li>
          <li><a href="#">November 2013</a></li>
          <li><a href="#">October 2013</a></li>
          <li><a href="#">September 2013</a></li>
          <li><a href="#">August 2013</a></li>
          <li><a href="#">July 2013</a></li>
          <li><a href="#">June 2013</a></li>
          <li><a href="#">May 2013</a></li>
          <li><a href="#">April 2013</a></li>
        </ol>
      </div>-->

        <div class="p-4">
          <h4 class="font-italic"><?php echo ($socialmedia); ?></h4>
          <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
          </ol>
        </div>
      </div>

    </div><!-- /.row -->

  </main><!-- /.container -->

  <footer class="blog-footer">
    <p>&copy; <?php echo ($blogname); ?>, Powered by EzyBlog (2021)</p>
    <p>
      <a href="#"><?php echo ($backtotop); ?></a>
    </p>
  </footer>



</body>

</html>