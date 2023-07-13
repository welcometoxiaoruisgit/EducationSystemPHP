<!DOCTYPE html>
<html>
<head>
	<title>Teacher Edit Phone Number</title>
	<link rel="stylesheet" type="text/css" href="css/teaEditPhone.css">
	<?php include 'teaheader.html'; ?>
		<?php 
			include 'connect.php';
			if(isset($_POST['submit'])){
				$tel=$_POST['newtel'];
				if($tel==""){
					echo"<script>alert('Please enter the phone number！');window.history.go(-1)</script>";
					exit();
				}
				$result=mysqli_query($link,"update t set tel=$tel where username=$username");

				if($result==1){
					echo"<script>alert('Edit successfully！');window.history.go(-1)</script>";
				}
			}
			mysqli_close($link);			
		 ?>
		<form name="teaxgtel" id="teaxgtel" method="post">
			<table border="0" cellspacing="0" cellpadding="0"  class="rt">
			
				<tr>
					<td>Current Phone number：</td>
					<?php 
						include 'conn.php';
						$result1=mysqli_query($link,"select tel from t where username=$username");
						$row=mysqli_fetch_array($result1);
						echo "<td>".$row[0]."</td>";
						mysqli_close($link);
					?>
				</tr>
			
				<tr>
					<td>Please enter the new phone number：</td>
					<td><input type="text" name="newtel" size="20">
					<input type="submit" name="submit" value="Edit" class="sb">
					</td>
				</tr>
			</table>			
		</form>	
	</div>
</body>
</html>