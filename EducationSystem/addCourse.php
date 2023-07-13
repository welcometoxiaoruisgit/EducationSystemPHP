<!DOCTYPE html>
<html>
<head>
	<title>Add Class</title>
	<link rel="stylesheet" type="text/css" href="css/addCourse.css">
	<?php include 'admheader.html'; ?>
		<?php 
			include 'connect.php';
			
			if(isset($_POST['add'])){
				$cno=$_POST['cno'];
				$cname=$_POST['cname'];
				$credit=$_POST['credit'];
				$cmajor=$_POST['cmajor'];
				$tno=$_POST['tno'];

				$result=mysqli_query($link,"select * from c where cno='$cno'");
				$result1=mysqli_query($link,"select * from c where cname='$cname'");
				$result2=mysqli_query($link,"select * from t where tno='$tno'");
				$result3=mysqli_query($link,"select * from t where tno='$tno' and class is NULL and cno is NULL ");
				if(mysqli_num_rows($result)!=1)
				{
					if(mysqli_num_rows($result1)!=1)
					{
						if(mysqli_num_rows($result2)==1)
						{
							if(mysqli_num_rows($result3)==1)
							{
								mysqli_query($link,"insert into c values('$cno','$cname','$credit','$cmajor')");
								mysqli_query($link,"update t set class='$cname' where tno='$tno'");
								mysqli_query($link,"update t set cno='$cno' where tno='$tno'");
								echo "<script>alert('Successfully added！')</script>";
							}
							else
							{
								echo "<script>alert('The teacher has scheduled classes！')</script>";
							}
						}
						else
						{
							echo "<script>alert('The teacher does not exist！')</script>";
						}
					}
					else
					{
						echo "<script>alert('The course name already exists！')</script>";
					}
				}				
				else
				{
					echo "<script>alert('The course number already exists！')</script>";
				}
			}			
			mysqli_close($link);
		?>
		<form name="addc" id="addc" method="post">
		 	<table border="0" cellspacing="0" cellpadding="0" class="rt">
		 		<tr>
					<td>Enter Class ID：</td>
					<td>
		 				<input type="text" name="cno" id="cno" size="20" required="required">
		 				<span style="color: red;font-size: 18px;">*</span>
		 			</td>
		 			
		 		</tr>
		 		<tr>
					<td>Enter class name：</td>
					<td>
		 				<input type="text" name="cname" id="cname" size="20" required="required">
		 				<span style="color: red;font-size: 18px;">*</span>
		 			</td>
		 			
		 		</tr>
		 		<tr>
					<td>Enter credits：</td>
					<td>
		 				<input type="text" name="credit" id="credit" size="20" required="required">
		 				<span style="color: red;font-size: 18px;">*</span>
		 			</td>
		 			
		 		</tr>
		 		<tr>
					<td>Enter the major of the class：</td>
					<td>
		 				<input type="text" name="cmajor" id="cmajor" size="20" required="required">
		 				<span style="color: red;font-size: 18px;">*</span>
		 			</td>		 			
		 		</tr>
		 		<tr>
					<td>Enter the instructor's UwinID：</td>
					<td>
		 				<input type="text" name="tno" id="tno" size="20" required="required">
		 				<span style="color: red;font-size: 18px;">*</span>
		 			</td>		 			
		 		</tr>		 		
		 	</table>
		 	<input type="submit" name="add" value="Add course" class="sb">
		 </form>
	</div>
</body>
</html>