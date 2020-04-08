 <?php

      session_start();
      if($_SESSION['email']==true){

    }else{

      header('location:admin_login.php');

    }
      $page='category'; 
      include('include/header.php');

  ?>

  <div style=" width:70%;margin-left: 25%; margin-top: 10%">

  		
  		 <form action="" name="categoryform" method="post" onsubmit="return validateform()">
  		 	<h1>Add Categories</h1><hr>
  			<div class="form-group">
    			<label for="email">Category:</label>
    			<input type="text" name="category" placeholder="Enter Category Name" class="form-control"  id="email">
  			</div>
  			<div class="form-group">
  				<label for="comment">Description:</label>
  				<textarea class="form-control" name="des" placeholder="Enter Category Description" rows="5" id="comment"></textarea>
			</div> 
 				 <input type="submit" name="submit" class="btn btn-primary" value="Add category">

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

    include('include/footer.php');

  ?>
  <?php

    include('db/connection.php');

    if(isset($_POST['submit'])){

      $category_name = $_POST['category'];
      $des = $_POST['des'];

      $check = mysqli_query($conn,"SELECT * FROM category WHERE category_name='$category_name'");

      if(mysqli_num_rows($check)>0){

        echo "<script>alert('Category Name Already Exist !')</script>";
        exit();
      }

        $query = mysqli_query($conn,"INSERT INTO category(category_name,des) VALUES ('$category_name','$des')");

        if($query){

          echo "<script> alert('Category Add Successfuly')</script>";
        }else{

          echo "<script> alert('Please Try Again !')</script>";
        }
    }
 

  ?>