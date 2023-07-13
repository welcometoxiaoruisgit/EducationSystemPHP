<!DOCTYPE html>
<html>
<head>
	<title>System administrator changes password</title>
	<link rel="stylesheet" type="text/css" href="css/admChangePassword.css">
	<?php include 'admheader.html'; ?>
		<?php
			include 'connect.php';

			if(isset($_POST['submit'])){

				$oldpw=$_POST['oldpw'];
				$newpw1=$_POST['newpw1'];
				$newpw2=$_POST['newpw2'];

				$result1=mysqli_query($link,"select * from user where username='$username' and password='$oldpw' ");

				if(mysqli_num_rows($result1)==1){
					if('$newpw1'=='$oldpw' && '$newpw2'=='$oldpw'){
						echo"<script>alert('The new password cannot be the same as the old password, please re-enter it！');window.history.go(-1)</script>";
						exit();
					}else{
						if($newpw1==$newpw2){
							$result2=mysqli_query($link,"update user set password='$newpw1' where username='$username' ");
							if($result2==1){
								echo"<script>alert('Successfully modified password！');window.history.go(-1)</script>";
							}
						}else{
								echo"<script>alert('The password entered twice is different. Please re-enter it！');window.history.go(-1)</script>";
								exit();
							 }
					}
				}
				else{
					echo"<script>alert('The original password was entered incorrectly. Please re-enter it！');window.history.go(-1)</script>";
					exit();
				}
			}
			mysqli_close($link);
		?>
		<form name="admchangepw" id="admchangepw" method="post">
			<table border="0" cellspacing="0" cellpadding="0"  class="rt">
				<tr>
					<td>Please enter the original password：</td>
					<td>
						<input type="password" name="oldpw" size="20" required="required">
						<span style="color: red;font-size: 18px;">*</span>
					</td>
				</tr>
				<tr>
					<td>Please enter a new password：</td>
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
			<input type="submit" name="submit" value="Confirm modification" class="sb">		
		</form>
	</div>
</body>
</html>