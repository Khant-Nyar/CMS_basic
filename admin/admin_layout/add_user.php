<?php 
	if(isset($_POST['add_user'])){
		 if(isset($_SESSION['userrole'])=='admin'){
		 $firstname=$_POST['firstname'];
		 $lastname=$_POST['lastname'];
		 $username=$_POST['username'];
		 $user_role=$_POST['user_role'];
		 $useremail=$_POST['useremail'];
		 $userpassword=$_POST['userpassword'];

		 $query="INSERT INTO `users`(`user_name`, `user_firstname`, `user_lastname`, `user_password`, `user_email`, `user_role`) VALUES ('$username','$firstname','$lastname','$userpassword','$useremail','$user_role')";
		 
		 mysqli_query($connect,$query);
	}
}
 ?>

    <form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="">User FirstName</label>
		<input type="text" class="form-control" name="firstname">
	</div>
	<div class="form-group">
		<label for="">User LastName</label>
		<input type="text" class="form-control" name="lastname">
	</div>
	<div class="form-group">
		<label for="">User Name</label>
		<input type="text" class="form-control" name="username">
	</div>
	<div class="form-group">
		<label for="">User Role</label>
		<select name="user_role" id="" class="form-control">
			<option value="subscriber">Subscriber</option>
			<option value="admin">Admin</option>
		</select>

	</div>
	
	<div class="form-group">
		<label for="">User Email</label>
		<input type="email" class="form-control" name="useremail">
	</div>
	
	<div class="form-group">
		<label for="">User Password</label>
		<input type="password" class="form-control" name="userpassword">
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="add_user" value="Add User">
	</div>
	
</form>
<!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem laboriosam officia inventore veniam quo, debitis maiores perspiciatis quibusdam rem, eaque libero fugiat ratione. Similique eius commodi laborum quidem veritatis magni. -->