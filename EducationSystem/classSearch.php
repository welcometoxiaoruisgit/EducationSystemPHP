<!DOCTYPE html>
<html>
<head>
	<title>Class Search</title>
	<link rel="stylesheet" type="text/css" href="css/classSearch.css">
	<?php include 'stuheader.html'; ?>
	<?php include 'connect.php';?>
		<form name="stusc" id="stusc" method="post">
		 	<table border="0" cellspacing="0" cellpadding="0" class="rt">
		 		<tr>
					<td>The ID of the class you want to search for：</td>
					<td>
		 				<input type="text" name="sc" id="sc" size="20" required="required">
		 				<span style="color: red;font-size: 18px;">*</span>
		 			</td>
		 			<td><input type="submit" name="search" value="Search" class="sb"></td>
		 	</table>
		 </form>
		 <?php 
			if(isset($_POST['search']))
			{
				$cno=$_POST['sc'];
				$result1=mysqli_query($link,"select c.cno,cname,name,credit from c inner join t on c.cno=t.cno where c.cno='$cno'");
				$result3=mysqli_query($link,"select * from c where cno='$cno'");
				if(mysqli_num_rows($result3)==1){
				echo "<table align='center' width='450px' border='2px' cellpadding='0' cellspacing='0'>";
				echo "<tr><th>Class ID</th><th>Class Name</th><th>Instructor</th><th>Credits</th></tr>";
				while($row=mysqli_fetch_array($result1)){			
					echo "<tr>";				
	            		for($i=0;$i<4;$i++)
						{
	            			echo "<td>".$row[$i]."</td>";
	        			}
					echo "</tr>";							
				}
				echo "</table>";	
			}				
			else
			{
				echo "<script>alert('Cannot find the class！')</script>";
			}
		}
		mysqli_close($link);
	?>			
	</div>
</body>
</html>