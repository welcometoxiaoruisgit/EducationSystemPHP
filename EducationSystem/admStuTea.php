<!DOCTYPE html>
<html>
<head>
	<title>View Teacher and Student</title>
	<link rel="stylesheet" type="text/css" href="css/admStuTea.css">
	<?php include 'admheader.html'; ?>
		<?php 
			include 'connect.php';

			$result=mysqli_query($link,"select sno,name,dept,major,grade,email from s");
			$result1=mysqli_query($link,"select tno,name,dept,class,email from t");
			echo "<h2 align='center'>Student Information</h2>";
			echo "<table align='center' width='500px' border='2px' cellpadding='0' cellspacing='0'>";
			echo "<tr><th>UwinID</th><th>Name</th><th>Department</th><th>Major</th><th>Credits</th><th>Email</th></tr>";
			while($row=mysqli_fetch_array($result)){				
				echo "<tr>";
					for($i=0;$i<6;$i++)
					{
						echo "<td>".$row[$i]."</td>";
					}
				echo "</tr>";			
			}
			echo "</table>";

			echo "<h2 align='center'>Teacher Information</h2>";
			echo "<table align='center' width='500px' border='2px' cellpadding='0' cellspacing='0'>";
			echo "<tr><th>UwinID</th><th>Name</th><th>Department</th><th>Class</th><th>Email</th></tr>";
			while($row=mysqli_fetch_array($result1)){				
				echo "<tr>";
					for($i=0;$i<5;$i++)
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