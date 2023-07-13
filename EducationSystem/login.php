 <?php 
		session_start();
		include 'conn.php';
			if(isset($_POST['submit']))
			{
				$username=$_POST['username'];
				$password=$_POST['password'];
				$role=$_POST['role'];

				if($username==""){
					echo"<script>alert('Please enter an account！');window.history.go(-1)</script>";
					exit();
				}else if($password==""){
					echo"<script>alert('Please input a password！');window.history.go(-1)</script>";
					exit();
				}

				$result=mysqli_query($link,"select * from user where username='$username' and password='$password' and role='$role'");
				if(mysqli_num_rows($result)==1)
				{
					if($role=="Student"){
						$_SESSION['username']=$username;
						header("Location:stuindex.php");
					}else if($role=="Teacher")
					{
						$_SESSION['username']=$username;
						header("Location:teaindex.php");
					}else if($role=="Admin")
					{
						$_SESSION['username']=$username;
						header("Location:admindex.php");
					}
				}
				else{
					echo"<script>alert('Username or password or role error, please re-enter！');window.history.go(-1)</script>";				
				}
			}
		mysqli_close($link);
	 ?>