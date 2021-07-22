<?php

  define('LOGIN',[
    'username'  =>  'Damin',
    'password'  =>  'admin@1987'
  ]);

  define('CONFIG',[
    'username'  =>  'modir',
    'password'  =>  'modir@1987'
  ]);

  session_start();

  $act = $_GET['a'] ?? false;
  if($act)
    if($act=='login') {
      $_SESSION['login'] = false;
      $username = $_POST['username'] ?? null;
      $password = $_POST['password'] ?? null;
      If($username == LOGIN['username'] && $password == LOGIN['password'])
        $_SESSION['login'] = true;
      header('Location: ' . basename(__FILE__));
    } elseif ($act=='logout') {
        $_SESSION['login'] = false;
        header('Location: ' . basename(__FILE__));
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>ESART</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Easy Search And Replace Tool">
    <meta name="author" content="Codebox.ir">
    <link rel="icon" href="https://codebox.ir/favicon.ico">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">
      <?php if($_SESSION['login'] ?? false) { ?>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">ESART <sup>v1.0</sup></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav mr-auto">
            <a class="nav-item nav-link active" href="#">File & Folder <span class="sr-only">(current)</span></a>
            <!--
            <a class="nav-item nav-link" href="#">Database</a>
            <a class="nav-item nav-link" href="#">Content</a>
            -->
          </div>
          <a class="nav-item nav-link" href="#">Help</a>
          <a href="?a=logout"class="btn btn-sm btn-outline-danger">Logout</a>
        </div>
      </nav>
      <div id="engin-file" class="row mt-3">
        <div class="col-md-6">
          <h4 class="text-center my-2">File & Folder</h4>
          <form id="file-search" class="form">
            <div class="form-group">
              <label for="path" class="form-label">Keyword</label>
              <input type="text" class="form-control" id="keyword" name="keyword" placeholder="blog_">
              <small class="alert-secondary p-1 pl-4 ml-2">
                <input type="checkbox" class="form-check-input" id="k-word" name="k-word">
                <label class="form-check-label" for="k-word">Word Mucth</label>
              </small>
              <small class="alert-secondary p-1 pl-4 ml-2">
                <input type="checkbox" class="form-check-input" id="k-case" name="k-case">
                <label class="form-check-label" for="k-case">Case Sensetive</label>
              </small>
            </div>
            <div class="form-group">
              <label for="path" class="form-label">Start Path</label>
              <input type="text" class="form-control" id="path" name="path" placeholder="./">
              <small class="alert-secondary p-1 pl-4 ml-2">
                <input type="checkbox" class="form-check-input" id="folders" name="folders">
                <label class="form-check-label" for="folders">Folders</label>
              </small>
              <small class="alert-secondary p-1 pl-4 ml-2">
                <input type="checkbox" class="form-check-input" id="files" name="files">
                <label class="form-check-label" for="files">Files</label>
              </small>
            </div>
            <div class="form-group">
              <label for="path" class="form-label">Filename Extension</label>
              <input type="text" class="form-control" id="path" name="path" placeholder="* for all or .php">
              <small class="alert-info p-1">Use <strong class="text-danger">!</strong> at start for exception, example: <strong>!.css</strong></small>
              <small class="alert-info p-1">Seprate by <strong class="text-danger">:</strong> example: <strong>.css : .js</strong></small>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="recursive" name="recursive">
                <label class="form-check-label" for="recursive">Recursive</label>
              </div>

            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Search</button>
            </div>
          </form>
        </div>

        <div class="col-md-6 result">
          <?php var_dump(scandir('../')); ?>
        </div>
      </div>
      <?php } else { ?>
      <div class="row justify-content-md-center">
        <div class="col-md-3 mt-5">
          <form action="?a=login" method="post">
              <h2 class="text-center">Log in</h2>
              <div class="form-group">
                  <input type="text" class="form-control" placeholder="Username" name="username" required="required">
              </div>
              <div class="form-group">
                  <input type="password" class="form-control" placeholder="Password" name="password" required="required">
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">Log in</button>
              </div>
              <div class="clearfix">
                  <small class="text-muted float-right">ESART v1.0</smalla>
              </div>
          </form>
        </div>
      </div>
      <?php } ?>
    </div>
    <script>
    <?php if($_SESSION['Login'] ?? false) { ?>

      /**
       * Engine File
       */

      // Submit Search
      $("body").on("submit","#engin-file form#file-search", function(e) {
        e.preventDefault();
        $.post( "?a=file&f=search", function( $( this ).serialize() ) {
          $( "#engin-file .result" ).html( data );
        });
      });

    <?php } else { ?>

    <?php } ?>
    </script>
  </body>
</html>
