 <?php

      session_start();
      if($_SESSION['email']==true){

    }else{

      header('location:admin_login.php');

    } 
      include('include/header.php');

  ?>

  <?php

    include('db/connection.php');

    $id = $_GET['edit'];

    $query = mysqli_query($conn,"SELECT * FROM news WHERE id = '$id'");

  while($row = mysqli_fetch_array($query)){

    $id = $row['id'];
    $title = $row['title'];
    $description = $row['description'];
    $date = $row['date'];
    $thumbnail = $row['thumbnail'];
    $category = $row['category'];


  }


  ?>

    <div style="width: 80%; margin-left:16% ">
      
      <ul class="breadcrumb">
        <li class="breadcrumb-item active"><a href="home.php">Home</a></li>>

        <li class="breadcrumb-item active"><a href="news.php">News</a></li>>

        <li class="breadcrumb-item active">Add News</li>>
      </ul>

    </div>

  <div style=" width:70%;margin-left: 25%; margin-top: 10%">

  		
  		 <form action="" name="categoryform" method="post" enctype="multipart/form-data" onsubmit="return validateform()">
  		 	<h1>Update News</h1><hr>
  			<div class="form-group">
    			<label for="email">Title:</label>
    			<input type="text" name="title" value="<?php echo $title;?>" placeholder="Title Name" class="form-control"  id="email">
  			</div>
  			<div class="form-group">
  				<label for="comment">Description:</label>
          <!-- remeber always that in textarea value is given between ending and closing tag -->
  				<textarea class="form-control" name="description" placeholder=" Description" rows="5" id="comment"><?php echo $description;?>    
          </textarea>
			</div> 
      <div class="form-group">
          <label for="email">Date:</label>
          <input type="date" name="date" class="form-control" value="<?php echo $date;?>" id="email">
        </div>
        <div class="form-group">
          <label for="email">Thumbnail:</label>
          <input type="file" name="thumbnail" value="<?php echo $thumbnail;?>"class="form-control img-thumbnail"  id="email">
          <img class="img img-thumbnail" src="images/<?php echo $thumbnail;?>" width="200" height="200">
        </div>
        <input type="hidden" name="id" value="<?php echo $_GET['edit'];?>">
        <div class="form-group">
          <label for="email">Category:</label>
           
            <select class="form-control" name="category">
               <?php
              include('db/connection.php');

              $query = mysqli_query($conn,"SELECT * FROM category");

              while($row=mysqli_fetch_array($query)){
                $category =$row['category_name']; 
              ?>

            <option><?php echo  $category;?></option>
          <?php }?>
          </select>
        </div>
 				 <input type="submit" name="submit" class="btn btn-primary" value="Update">

        </form>

        <script>
          
          function validateform(){

            var x = document.forms['categoryform']['title'].value;
            var y = document.forms['categoryform']['description'].value;
            var z = document.forms['categoryform']['date'].value;
            var w = document.forms['categoryform']['category'].value;



            if(x==""){
              alert('Title must be filled out !');
              return false;
            }
            if(y==""){
              alert('Description must be filled out !');
              return false;
            }
            if(y.length<10){
              alert('Description Atleast 100 character !');
              return false;
            }
            if(z==""){
              alert('Date must be filled out !');
              return false;
            }
            if(w==""){
              alert('Category must be filled out !');
              return false;
            }

          }

        </script>
</div>
<?php

    include('include/footer.php');

  ?>

<?php 


  include('db/connection.php');

  if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $thumbnail = $_FILES['thumbnail']['name'];
    $tmp_thumbnail = $_FILES['thumbnail']['tmp_name'];

    $category = $_POST['category'];

    move_uploaded_file($tmp_thumbnail, "images/$thumbnail");

    $sql=mysqli_query($conn,"UPDATE news SET title='$title',description='
      $description',date='$date',thumbnail='$thumbnail',category='$category' WHERE id ='$id'");

    if($sql){

      echo "<script> alert('News Updateed Sucessfully!');</script>";
            echo "<script>window.location='http://localhost/news/news.php';</script>";

    }else{

            echo "<script> alert('Please Try Agian!');</script>";

    }
  }

  

?>
 