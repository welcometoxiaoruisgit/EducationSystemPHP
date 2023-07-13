<!DOCTYPE html>
<html>
<head>
	<title>Class Information</title>
	<link rel="stylesheet" type="text/css" href="css/admCourseSelectInfo.css">
	<?php include 'admheader.html'; ?>
		<?php 
			include 'connect.php';

			$result=mysqli_query($link,"select sc.sno,s.name,s.dept,s.major,sc.cno,t.class,t.name from sc inner join t on sc.cno=t.cno inner join s where sc.sno=s.sno");
			echo "<h2 align='center'>Class Information</h2>";
			echo "<table align='center' width='600px' border='2px' cellpadding='0' cellspacing='0'>";
			echo "<tr><th>UwinID</th><th>Student Name</th><th>Department</th><th>Major</th><th>Class ID</th><th>Class Name</th><th>Instructor</th></tr>";
			while($row=mysqli_fetch_array($result)){				
				echo "<tr>";
					for($i=0;$i<7;$i++)
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