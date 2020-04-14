<?php

	include('db/connection.php');

	$id=$_GET['del'];
	$query = mysqli_query($conn,"DELETE FROM comment WHERE id = '$id'");

	if($query){

		echo "<script>alert('Comment Deleted');</script>";
      echo "<script>window.location='http://localhost/news/comment.php';</script>";
	}else{

		echo "<script>alert('Please , Try Again!');</script>";
				header('location:category.php');

	}
	

?>