 <?php
      error_reporting(0);
      session_start();
      if($_SESSION['email']==true){

    }else{

      header('location:admin_login.php');

    }
      $page='news'; 
      include('include/header.php');

  ?>
  <div style="width: 80%; margin-left:16% ">
      
      <ul class="breadcrumb">
        <li class="breadcrumb-item active"><a href="home.php">Home</a></li>>


        <li class="breadcrumb-item active">News</li>>
      </ul>

    </div>

  <div style=" width:70%;margin-left: 25%; margin-top: 10%">

  		<div class="text-right">
  			
  			<button><a href="addnews.php" class="btn btn-info">Add News</a></button>


  		</div>

  		<table class="table table-bordered">
  			
  			<tr>
  				<th>Id</th>
  				<th>Title</th>
  				<th>Description</th>
  				<th>Date</th>
  				<th>Category</th>
          <th>Thumbnail</th>
          <th>Admin</th>
          <th>Edit</th>
          <th>Delete</th>



  			</tr>
  			<?php

  				include('db/connection.php');

          $page = $_GET['page'];

          if($page=="" || $page =="1"){
            $page1 = 0;
          }else{

            $page1 = ($page*2)-2;
          }

          $query = mysqli_query($conn,"SELECT * FROM news LIMIT $page1,2");

          while($row = mysqli_fetch_array($query)){
	
  			?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo substr($row['description'],0,50) ?></td>
            <td><?php echo date("F,jS,y", strtotime($row['date'])); ?></td>
            <td><?php echo $row['category']; ?></td>
            <td><img class="img img-thumbnail" src="images/<?php echo $row['thumbnail']; ?>" width="100" height = "100"></td>
            <td><?php echo $row['admin'];?></td>
            <td><a href="news_edit.php?edit=<?php echo $row['id']?>" class="btn btn-info">Edit</a></td>
            <td><a href="news_delete.php?delete=<?php echo $row['id']?>" class="btn btn-danger">Delete</a></td>


        </tr>

      <?php }
// for pagination
        $sql = mysqli_query($conn,"SELECT * FROM news");
        $count = mysqli_num_rows($sql);

        $a = $count/2;

        ceil($a);

        for($b=1;$b<=$a;$b++){

          ?>
          </table>
            <ul class="pagination" >
              
              <li class="page-item"><a class="page-link" href="news.php?page=<?php echo $b;?>"><?php echo $b;?></a></li>
        <?php
          }
      ?>
      
    </ul>

  		</table>
  		
  </div>

  <?php

  	include('include/footer.php');

  ?>
  