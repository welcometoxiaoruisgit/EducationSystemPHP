<!DOCTYPE html>
<html>
<head>
	<title>Manage the System</title>
	<link rel="stylesheet" type="text/css" href="css/admindex.css">
	<?php include 'admheader.html'; ?>
		<?php 
			include 'connect.php';

			$result=mysqli_query($link,"select * from user where username!='$username'");
			echo "<h2 align='center'>User Information</h2>";
			echo "<table align='center' width='400px' border='2px' cellpadding='0' cellspacing='0'>";
			echo "<tr><th>Account ID</th><th>Password</th><th>Role</th></tr>";
			while($row=mysqli_fetch_array($result)){				
				echo "<tr>";
					for($i=0;$i<3;$i++)
					{
						echo "<td>".$row[$i]."</td>";
					}
				echo "</tr>";			
			}
			echo "</table>";

			
			if(isset($_POST['dele'])){
				$name=$_POST['name'];
				$result1=mysqli_query($link,"select * from user where username='$name'");
				if($name!=$username)
				{
					if(mysqli_num_rows($result1)==1)
					{
						mysqli_query($link,"delete from user where username=$name");
						echo "<script>alert('Delete successfully！');window.history.back(-1);</script>";

					}
					else
					{
						echo "<script>alert('Please enter the correct Account ID！')</script>";
					}
				}				
				else
				{
					echo "<script>alert('Cannot delete yourself！')</script>";
				}
			}			
			mysqli_close($link);
		?>
		<form name="admdele" id="admdele" method="post">
		 	<table border="0" cellspacing="0" cellpadding="0" class="rt">
		 		<tr>
					<td>Enter the Account ID to delete：</td>
					<td>
		 				<input type="text" name="name" id="name" size="20" required="required">
		 				<span style="color: red;font-size: 18px;">*</span>
		 			</td>
		 			<td><input type="submit" name="dele" value="Delete" class="sb"></td>
		 		</tr>		 		
		 	</table>
		 </form>
	</div>
</body>
</html>