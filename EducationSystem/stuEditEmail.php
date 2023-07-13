<!DOCTYPE html>
<html>
<head>
	<title>Student Edit Email</title>
	<link rel="stylesheet" type="text/css" href="css/stuEditEmail.css">
	<?php include 'stuheader.html'; ?>
		<?php 
			include 'connect.php';
			if(isset($_POST['submit'])){
				$email=$_POST['newemail'];
				if($email==""){
					echo"<script>alert('Please enter the email！');window.history.go(-1)</script>";
					exit();
				}
				$result=mysqli_query($link,"update s set email='$email' where username=$username");

				if($result==1){
					echo"<script>alert('Edit successfully！');window.history.go(-1)</script>";
				}
			}
			mysqli_close($link);			
		 ?>
		<form name="stuxgage" id="stuxgage" method="post">
			<table border="0" cellspacing="0" cellpadding="0"  class="rt">
			
				<tr>
					<td>Current Email：</td>
					<?php 
						include 'conn.php';
						$result1=mysqli_query($link,"select email from s where username=$username");
						$row=mysqli_fetch_array($result1);
						echo "<td>".$row[0]."</td>";
						mysqli_close($link);
					?>
				</tr>
				
				<tr>
					<td>Please enter the new email：</td>
					<td><input type="text" name="newemail" size="10"></td>
					<td><input type="submit" name="submit" value="Edit" class="sb"></td>
				</tr>
			</table>			
		</form>		
	</div>
</body>
</html>