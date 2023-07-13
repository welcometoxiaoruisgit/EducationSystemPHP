<!DOCTYPE html>
<html>
<head>
	<title>Class Enroll</title>
	<link rel="stylesheet" type="text/css" href="css/classEnroll.css">
	<?php include 'stuheader.html'; ?>
		<?php
			include 'connect.php';
			$result1=mysqli_query($link,"select c.cno,cname,t.name,credit,cmajor from c inner join t on c.cno=t.cno inner join s where s.username=$username and cmajor=major");
			echo "<h2 align='center'>Available Classes</h2>";	
			echo "<table align='center' width='450px' border='2px' cellpadding='0' cellspacing='0'>";
			echo "<tr><th>Class ID</th><th>Class Name</th><th>Instructor</th><th>Credits</th><th>Major</th></tr>";
			while($row=mysqli_fetch_array($result1)){
				echo "<tr>";
				for($i=0;$i<5;$i++)
				{
            		echo "<td>".$row[$i]."</td>";
        		}
				echo "</tr>";
			}
			echo "</table>";

			if(isset($_POST['xz'])){
			$xk=$_POST['xk'];
			$result2=mysqli_query($link,"select sno,major from s where username=$username");
			$data=mysqli_fetch_row($result2);						
			$sno=$data[0];
			$cmajor=$data[1];		
			
			$result3=mysqli_query($link,"select * from c where cno=$xk and cmajor='$cmajor'");		
			$result4=mysqli_query($link,"select * from sc where sno='$sno' and cno='$xk'");
			

			if(mysqli_num_rows($result3)==1)
			{
				if(mysqli_num_rows($result4)!=1)
				{
					mysqli_query($link,"insert into sc values ('$sno','$xk','0')");
					echo "<script>alert('Enroll successfully！')</script>";
				}
				else
				{
					echo "<script>alert('Already enrolled！')</script>";
				}			
			}
			else
			{
				echo"<script>alert('Please enter the correct Class ID！')</script>";
			}
		}
		mysqli_close($link);
	?>
		 <form name="stuxk" id="stuxk" method="post">
		 	<table border="0" cellspacing="0" cellpadding="0" class="rt">
		 		<tr>
					<td>Enter ID of the chosen class：</td>
					<td>
		 				<input type="text" name="xk" id="xk" size="20" required="required">
		 				<span style="color: red;font-size: 18px;">*</span>
		 			</td>
		 			<td><input type="submit" name="xz" value="Enroll" class="sb"></td>
		 		</tr>
		 	</table>
		 </form>			
	</div>
</body>
</html>