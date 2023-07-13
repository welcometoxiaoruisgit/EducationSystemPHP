<!DOCTYPE html>
<html>
<head>
	<title>View all courses</title>
	<link rel="stylesheet" type="text/css" href="css/admCourseInfo.css">
	<?php include 'admheader.html'; ?>
		<?php 
			include 'connect.php';
			$result=mysqli_query($link,"select c.cno,cname,credit,name from c inner join t on c.cno=t.cno");
			echo "<h2 align='center'>Course Information Table</h2>";
			echo "<table align='center' width='400px' border='2px' cellpadding='0' cellspacing='0'>";
			echo "<tr><th>Class ID</th><th>Class Name</th><th>Credits</th><th>Instructor</th></tr>";
			while($row=mysqli_fetch_array($result)){				
				echo "<tr>";
					for($i=0;$i<4;$i++)
					{
						echo "<td>".$row[$i]."</td>";
					}
				echo "</tr>";			
			}
			echo "</table>";

			mysqli_close($link);
		?>
	</div>
</body>
</html>