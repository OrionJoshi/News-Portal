 <?php

      session_start();
      error_reporting(0);  
      if($_SESSION['email']==true){

    }else{

      header('location:admin_login.php');

    }
      $page='category'; 

    include('include/header.php');
            


  ?>

  <?php

    include('db/connection.php');
      $id = $_GET['id'];
   
    

    $query = mysqli_query($conn,"SELECT * FROM category WHERE id = '$id' ");

    

    while($row = mysqli_fetch_array($query)){

      $category = $row['category_name'];
      $des =$row['des'];

       
    }


  ?>

  <div style=" width:70%;margin-left: 25%; margin-top: 10%">

  		
  		 <form action="" name="categoryform" method="post" onsubmit="return validateform()">
  		 	<h1>Update Category</h1><hr>
  			<div class="form-group">
    			<label for="email">Category:</label>
    			<input type="text" name="category1"  class="form-control"  value="<?php echo $category; ?>" id="email">
  			</div>
  			<div class="form-group">
  				<label for="comment">Description:</label>
  				<textarea class="form-control"  name="des1"  rows="5" id="comment"><?php echo $des; ?></textarea>
			</div> 
          <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
 				 <input type="submit" name="submit1" class="btn btn-primary" value="Update category">

        </form>

        <script>
          
          function validateform(){

            var x = document.forms['categoryform']['category'].value;

            if(x==""){
              alert('Category must be filled out !');
              return false;
            }

          }

        </script>
</div>

<?php

  include('db/connection.php');

if(isset($_POST['submit1'])){

   $id = $_POST['id'];
  $category = $_POST['category1'];
  $des = $_POST['des1'];

  $query1 = mysqli_query($conn,"UPDATE category SET category_name = '$category',des = '$des' WHERE id = '$id'");

  if($query1){

      echo "<script>alert('Category Updated Sucessfuly')</script>";
      echo "<script>window.location='http://localhost/news/category.php';</script>";


    }else{

    echo "Category is not Updated";
  }
}

?>

<?php
  
  include('include/footer.php');

?>
