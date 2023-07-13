<!DOCTYPE html>
<html>
<head>
	<title>Teacher Information</title>
	<link rel="stylesheet" type="text/css" href="css/teaindex.css">
	<?php include 'teaheader.html'; ?>
		<?php 
			include 'connect.php';
			$result=mysqli_query($link,"select * from t where username='$username'");			
			echo "<h2 align='center'>Teacher Information</h2>";
			echo "<table align='center' width='400px' border='2px' cellpadding='0' cellspacing='0'>";
			while($row=mysqli_fetch_array($result)){
					$result2=mysqli_query($link,"select credit from c where cno='$row[8]'");
					$data=mysqli_fetch_row($result2);					

					echo "<tr><th>Account ID</th><th>".($row[0] ?? '')."</th></tr>";
					echo "<tr><th>UwinID</th><th>".($row[1] ?? '')."</th></tr>";
					echo "<tr><th>Name</th><th>".($row[2] ?? '')."</th></tr>";
					echo "<tr><th>Gender</th><th>".($row[3] ?? '')."</th></tr>";
					echo "<tr><th>Age</th><th>".($row[4] ?? '')."</th></tr>";
					echo "<tr><th>Email</th><th>".($row[9] ?? '')."</th></tr>";
					echo "<tr><th>Phone number</th><th>".($row[5] ?? '')."</th></tr>";
					echo "<tr><th>Department</th><th>".($row[6] ?? '')."</th></tr>";
					echo "<tr><th>Class (Credits)</th><th>".($row[7] ?? '')." (".($data[0] ?? '').") </th></tr>";		
			}
			echo "</table>";
			mysqli_close($link);
		?>
	</div>
</body>
</html>