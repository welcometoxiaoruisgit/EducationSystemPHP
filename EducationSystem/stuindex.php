<!DOCTYPE html>
<html>
<head>
	<title>Student Information</title>
	<link rel="stylesheet" type="text/css" href="css/stuindex.css">
	<?php include 'stuheader.html'; ?>
		<?php
			include 'connect.php';
			$result=mysqli_query($link,"select * from s where username='$username'");
			echo "<h2 align='center'>Student Information</h2>";
			echo "<table align='center' width='450px' border='2px' cellpadding='0' cellspacing='0'>";
			while($row=mysqli_fetch_array($result)){	
					echo "<tr><th>Account ID</th><th>".$row[0]."</th></tr>";			
					echo "<tr><th>UwinID</th><th>".$row[1]."</th></tr>";
					echo "<tr><th>Name</th><th>".$row[2]."</th></tr>";
					echo "<tr><th>Gender</th><th>".$row[3]."</th></tr>";
					echo "<tr><th>Age</th><th>".$row[4]."</th></tr>";
					echo "<tr><th>Email</th><th>".$row[5]."</th></tr>";	
					echo "<tr><th>Phone number</th><th>".$row[6]."</th></tr>";
					echo "<tr><th>Department</th><th>".$row[7]."</th></tr>";
					echo "<tr><th>Major</th><th>".$row[8]."</th></tr>";
					echo "<tr><th>Credits</th><th>".$row[9]."</th></tr>";			
			}                                                              
			echo "</table>";

			mysqli_close($link);
		 ?>
	</div>
</body>
</html>