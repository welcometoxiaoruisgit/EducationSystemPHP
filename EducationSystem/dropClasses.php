<!DOCTYPE html>
<html>
<head>
	<title>Drop classes</title>
	<link rel="stylesheet" type="text/css" href="css/dropClasses.css">
	<?php include 'stuheader.html'; ?>
		<?php
			include 'connect.php';
			$result2=mysqli_query($link,"select sno from s where username=$username");
			$data=mysqli_fetch_row($result2);						
			$sno=$data[0];

			$result1=mysqli_query($link,"select sc.cno,cname,name,cgrade from sc inner join t on sc.cno=t.cno inner join c on sc.cno=c.cno where sno=$sno");
			
			echo "<h2 align='center'>Enrolled Classes</h2>";	
			echo "<table align='center' width='400px' border='2px' cellpadding='0' cellspacing='0'>";
			echo "<tr><th>Class ID</th><th>Class Name</th><th>Instructor</th><th>Grade</th></tr>";
			while($row=mysqli_fetch_array($result1)){			
				echo "<tr>";				
            		for($i=0;$i<4;$i++)
					{
            			echo "<td>".$row[$i]."</td>";
        			}
				echo "</tr>";			
			}
			echo "</table>";

			if(isset($_POST['xz'])){
			$tx=$_POST['tx'];
			$result2=mysqli_query($link,"select sno,major from s where username=$username");
			$data=mysqli_fetch_row($result2);						
			$sno=$data[0];
			$cmajor=$data[1];
			
			$result3=mysqli_query($link,"select * from sc where cno='$tx' and sno='$sno' ");		
			$result4=mysqli_query($link,"select * from sc where sno='$sno' and cno='$tx' and cgrade=0");
			

			if(mysqli_num_rows($result3)==1)
			{
				if(mysqli_num_rows($result4)==1)
				{
					$result5=mysqli_query($link,"delete from sc where sno='$sno' and cno='$tx'");
					echo "<script>alert('Drop successfully！');window.history.go(-1)</script>";
				}
				else
				{
					echo "<script>alert('The class you selected has ended！')</script>";
				}
			}
			else
			{
				echo"<script>alert('Please enter the correct Class ID！')</script>";
			}
		}
		mysqli_close($link);
	?>
		<form name="stutx" id="stutx" method="post">
		 	<table border="0" cellspacing="0" cellpadding="0" class="rt">
		 		<tr>
					<td>Which class do you want to drop? Enter the Class ID：</td>
					<td>
		 				<input type="text" name="tx" id="tx" size="20" required="required">
		 				<span style="color: red;font-size: 18px;">*</span>
		 			</td>
		 			<td><input type="submit" name="xz" value="Drop" class="sb"></td>
		 		</tr>		 		
		 	</table>
		 </form>				
	</div>
</body>
</html>