 <?php

      session_start();
      if($_SESSION['email']==true){

    }else{

      header('location:admin_login.php');

    }
      $page='comment'; 
      include('include/header.php');

  ?>
  <div style="width: 80%; margin-left:16% ">
      
      <ul class="breadcrumb">
        <li class="breadcrumb-item active"><a href="home.php">Home</a></li>>


        <li class="breadcrumb-item active">Comment</li>>
      </ul>

    </div>

  <div style=" width:70%;margin-left: 25%; margin-top: 10%">

  		<h1>Comments</h1>
  		<hr>
  		<table class="table table-bordered">
  			
  			<tr>
  				<th>Id</th>
  				<th>Name</th>
  				<th>Email</th>
  				<th>Comment</th>
  				<th>Delete</th>
  			</tr>
  			<?php

  				include('db/connection.php');

  				$query = mysqli_query($conn,"SELECT * FROM comment");

  				while($row = mysqli_fetch_array($query)){

  					?>

  					<tr>
  						<td><?php echo $row['id']?></td>
  						<td><?php echo $row['name']?></td>
  						 <td><?php echo $row['email']?></td>
  						<td><?php echo $row['comment']?></td>
  						<td><a class="btn btn-danger" href="comment_delete.php?del=<?php echo $row['id']; ?>">Delete</a></td>


  					</tr>



  				<?php } ?>

  			

  		</table>
  		
  </div>

  <?php

  	include('include/footer.php');

  ?>
  