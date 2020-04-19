<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>News Channel</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="style/blog.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="text-muted" href="#">Subscribe</a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="#">Programming</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="text-muted" href="#" aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
        </a>
      </div>
    </div>
  </header>

  
  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      <a class="p-2 text-muted" href="index.php">Home</a>
      <a class="p-2 text-muted" href="category_page.php?category=World">World</a>
      <a class="p-2 text-muted" href="category_page.php?category=Technology">Technology</a>
      <a class="p-2 text-muted" href="category_page.php?category=Culture">Culture</a>
      <a class="p-2 text-muted" href="category_page.php?category=Business">Business</a>
      <a class="p-2 text-muted" href="category_page.php?category=Politics">Politics</a>
      <a class="p-2 text-muted" href="category_page.php?category=Science">Science</a>
      <a class="p-2 text-muted" href="category_page.php?category=Health">Health</a>
      <a class="p-2 text-muted" href="category_page.php?category=Style">Style</a>
      <a class="p-2 text-muted" href="#">Contect Us</a>

    </nav>
  </div>

  <div class="card" style="width:100%">
    <img class="card-img-top" src="https://images.unsplash.com/photo-1513077202514-c511b41bd4c7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80" alt="Card image" width="700" height="400">
    <div class="card-img-overlay">
      <h4 class="card-title">Khageshwor</h4>
      <p class="card-text">Some example text.</p>
    </div>
  </div>
<div class="row mb-2">
     <?php

        include('db/connection.php');
        $query2=mysqli_query($conn,"SELECT * FROM news ORDER BY id DESC LIMIT 1,2");
        while($row = mysqli_fetch_array($query2)){
        $id = $row['id'];
        $title=$row['title'];
        $date=$row['date'];
        $thumbnail=$row['thumbnail'];    
        $category=$row['category'];

       ?> 

    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
       

        
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary"><?php echo $category;?></strong>
          <h3 class="mb-0"><?php echo $title;?></h3>
          <div class="mb-1 text-muted"><a href="single_new.php?single=<?php echo $id;?>"></a><?php echo $date;?></div>
          <a href="single_new.php?single=<?php echo $id;?>" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <!-- <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false"  role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
                  <img class="card-img-right flex-auto d-none d-md-block" src="images/<?php echo $thumbnail;?>" width="150">

        </div>
      </div>
    </div>
    <?php }?>
    
</div>

<main role="main" class="container">
  <div class="row">
    <div class="col-md-8 blog-main">
      <h3 class="pb-4 mb-4 font-italic border-bottom">
       Single News
      </h3>
        <?php

        include('db/connection.php');

        $id = $_GET['single'];

        

        $query = mysqli_query($conn,"SELECT * FROM news WHERE id ='$id'");

        while($row = mysqli_fetch_array($query)){
        $title=$row['title'];
        $date=$row['date'];
        $admin=$row['admin'];
        $thumbnail=$row['thumbnail'];    
        $description=$row['description'];

      }
        ?>

      <div class="blog-post">
        <h2 class="blog-post-title"><?php echo $title;?></h2>
        <p class="blog-post-meta"><?php echo $date;?> <a href="#"><?php echo $admin;?></a></p>

        <p><img class="img img-thumbnail" style="height: 15%;" src="images/<?php echo $thumbnail;?>"></p>
        <hr>
        <blockquote>
          <?php echo $description;?>
        </blockquote>
        
      </div><!-- /.blog-post -->
      

      

    </div><!-- /.blog-main -->

    <aside class="col-md-4 blog-sidebar">
      <div class="p-4 mb-3 bg-light rounded">
        <h4 class="font-italic">About</h4>
        <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
      </div>

      
      <div class="p-4">
        <h4 class="font-italic">Categories</h4>
        <hr>
        <ol class="list-unstyled mb-0">

          <?php 

            include('db/connection.php');

            $query = mysqli_query($conn,'SELECT * from category');

            while($row=mysqli_fetch_array($query)){
         

          ?>
            <li><a href="category_page.php?category=<?php echo $row['category_name'];?>"><?php echo $row['category_name'];?></a></li>         
             <?php }?>
        </ol>
      </div>
      <div class="p-4">
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
      </div>

      <div class="p-4">
        <h4 class="font-italic">Elsewhere</h4>
        <ol class="list-unstyled">
          <li><a href="#">GitHub</a></li>
          <li><a href="#">Twitter</a></li>
          <li><a href="#">Facebook</a></li>
        </ol>
      </div>
    </aside><!-- /.blog-sidebar -->

  </div><!-- /.row -->

</main><!-- /.container -->

<footer class="blog-footer">
  
    <a href="#">Back to top</a>
  </p>
</footer>
</body>
</html>
