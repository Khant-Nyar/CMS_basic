<?php ob_start(); ?>
<?php session_start(); ?>
<?php include_once "database.php" ?>
<?php 
	if(isset($_POST['login'])){
		$email=$_POST['email'];
		$password=$_POST['password'];

		$email=mysqli_real_escape_string($connect,$email);
		$password=mysqli_real_escape_string($connect,$password);

		$query="SELECT * FROM users WHERE  user_email='$email'";
		$result=mysqli_query($connect,$query);
		if(!$result){
			die("Failed");
		}
		while($row=mysqli_fetch_assoc($result)){
			$db_useremail=$row['user_email'];
			$db_username=$row['user_name'];
			$db_userpassword=$row['user_password'];
			$db_userrole=$row['user_role'];
		}
		if($email ==$db_useremail && $password==$db_userpassword){
			$_SESSION['useremail']=$db_useremail;
			$_SESSION['username']=$db_username;
			$_SESSION['userpassword']=$db_userpassword;
			$_SESSION['userrole']=$db_userrole;

			header('location:admin');
		}else{
			header('location:index.php');
		}

	}
 ?>