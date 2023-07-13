<!DOCTYPE html>
<html>
<head>
	<title>Teacher Change Password</title>
	<link rel="stylesheet" type="text/css" href="css/teaChangePassword.css">
	<?php include 'teaheader.html'; ?>
	<?php 
			include 'connect.php';
			if(isset($_POST['submit'])){

				$oldpw=$_POST['oldpw'];
				$newpw1=$_POST['newpw1'];
				$newpw2=$_POST['newpw2'];

				$result1=mysqli_query($link,"select * from user where username='$username' and password='$oldpw' ");

				if(mysqli_num_rows($result1)==1){
					if('$newpw1'=='$oldpw' && '$newpw2'=='$oldpw'){
						echo"<script>alert('The new password cannot be the same as the old password, please re-enter！');window.history.go(-1)</script>";
						exit();
					}else{
						if($newpw1==$newpw2){
							$result2=mysqli_query($link,"update user set password='$newpw1' where username='$username' ");
							if($result2==1){
								echo"<script>alert('Change password successfully！');window.history.go(-1)</script>";
							}
						}else{
								echo"<script>alert('The two entered passwords are different, please re-enter！');window.history.go(-1)</script>";
								exit();		
							 }
					}
				}
				else{
					echo"<script>alert('The old password entered is incorrect, please re-enter！');window.history.go(-1)</script>";
					exit();
				}			
			}
			mysqli_close($link);			
		 ?>
		<form name="teaxgpw" id="teaxgpw" method="post">
			<table border="0" cellspacing="0" cellpadding="0"  class="rt">
				<tr>
					<td>Please enter the old password：</td>
					<td>
						<input type="password" name="oldpw" size="20" required="required">
						<span style="color: red;font-size: 18px;">*</span>
					</td>
				</tr>
				<tr>
					<td>Please enter the new password：</td>
					<td>
						<input type="password" name="newpw1" size="20" required="required">
						<span style="color: red;font-size: 18px;">*</span>
					</td>
				<tr>
					<td>Please enter the new password again：</td>
					<td>
						<input type="password" name="newpw2" size="20" required="required">
						<span style="color: red;font-size: 18px;">*</span>
					</td>
			</table>
			<td><input type="submit" name="submit" value="Edit" class="sb"></td>			
		</form>		
	</div>	
</body>
</html>