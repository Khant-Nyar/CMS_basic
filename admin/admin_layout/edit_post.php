<?php 
	if(isset($_GET['post_id'])){
		$post_id=mysqli_real_escape_string($connect,$_GET['post_id']);
		$query="SELECT * FROM posts WHERE post_id=$post_id";
		$result=mysqli_query($connect,$query);
		while($row=mysqli_fetch_assoc($result)){
			$post_id=$row['post_id'];
			$post_author=$row['post_author'];
			$post_category_id=$row['post_category_id'];
			$post_title=$row['post_title'];
			$post_status=$row['post_status'];
			$post_image=$row['post_image'];
			$post_tag=$row['post_tag'];
			$post_content=$row['post_content'];
		}
	}
	if(isset($_POST['update'])){
		 if(isset($_SESSION['userrole'])=='admin'){
		 $post_author=$_POST['post_author'];
		 $post_category_id=$_POST['post_category_id'];
		 $post_title=$_POST['post_title'];
		 $post_status=$_POST['post_status'];

		 $post_image=$_FILES['post_image']['name'];
		 if($post_image){
		 	$query="SELECT *FROM posts WHERE post_id=$post_id";
		 	$result=mysqli_query($connect,$query);
		 	$row=mysqli_fetch_assoc($result);
		 	$post_image=$row['post_image'];
		 	$img_path='../image/'.$post_image;
		 	if(file_exists($img_path)){
		 		unlink($img_path);
		 	}
		 }
		
		 $post_image_tmp=$_FILES['post_image']['tmp_name'];
		 move_uploaded_file($post_image_tmp,'../image/'.$post_image);

		 if(empty($post_image)){
		 	$query="SELECT * FROM posts WHERE post_id=$post_id";
		 	$result=mysqli_query($connect,$query);
		 	$row=mysqli_fetch_assoc($result);
		 	$post_image=$row['post_image'];
		 }

		 $post_tag=$_POST['post_tag'];
		 $post_content=$_POST['post_content'];
		 $post_date=date('Y-m-d');

		 $query="UPDATE `posts` SET `post_category_id`='$post_category_id',`post_title`='$post_title',`post_author`='$post_author',`post_date`='$post_date',`post_image`='$post_image',`post_content`='$post_content',`post_tag`='$post_tag',`post_status`='$post_status' WHERE post_id=$post_id";
		 $result=mysqli_query($connect,$query);
		 if(!$result){
		 	die("Failed");
		 }
		 header('location:post.php');
	}
}
 ?>

<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="">Post Title</label>
		<input type="text" class="form-control" name="post_title" value="<?php echo $post_title ?>">
	</div>
	<div class="form-group">
		<label for="">Post Category</label>
		<select name="post_category_id" id="" class="form-control">
			<?php 
				$query="SELECT * FROM categories";
				$result=mysqli_query($connect,$query);
				while($row=mysqli_fetch_assoc($result)){
					$cat_id=$row['cat_id'];
					$cat_title=$row['cat_title'];
				
			 ?>
			<option value="<?php echo $cat_id ?>"><?php echo $cat_title ?></option>
			<?php 
				}
			 ?>
		</select>
	</div>
	<div class="form-group">
		<label for="">Post Author</label>
		<input type="text" class="form-control" name="post_author" value="<?php echo $post_author?>">
	</div>
	<div class="form-group">
		<label for="">Post Status</label>
		<input type="text" class="form-control" name="post_status" value="<?php echo $post_status?>">
	</div>
	<div class="form-group">
		<label for="">Post Image</label><br>
		<img src="../image/<?php echo $post_image ?>" width="120px" height="100px" alt="">
		<input type="file" name="post_image">
	</div>
	<div class="form-group">
		<label for="">Post Tags</label>
		<input type="text" class="form-control" name="post_tag" value="<?php echo $post_tag?>">
	</div>
	<div class="form-group">
		<label for="">Post Content</label>
		<textarea name="post_content" class="form-control" id="editor" cols="30" rows="10"><?php echo $post_content?></textarea>
	</div>
	<div class="form-group">
		<label for="">Post Date</label>
		<input type="date" class="form-control" name="post_date">
	</div>
	<div class="form-group">
		
		<input type="submit" class="btn btn-primary" name="update" value="Update Post">
	</div>
	
</form>
<!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem laboriosam officia inventore veniam quo, debitis maiores perspiciatis quibusdam rem, eaque libero fugiat ratione. Similique eius commodi laborum quidem veritatis magni. -->