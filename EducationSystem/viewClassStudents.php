<!DOCTYPE html>
<html>
<head>
	<title>View Classes</title>
	<link rel="stylesheet" type="text/css" href="css/viewClassStudents.css">
	<?php include 'teaheader.html'; ?>
		<?php 
			include 'connect.php';
			$result=mysqli_query($link,"select class from t where username=$username");
			$data=mysqli_fetch_row($result);
			$class=$data[0];
			echo "<br>"."Your class is ".'“'.$class.'”'."<br>"."<br>";

			$result1=mysqli_query($link,"select sc.sno,name,sex,email from sc inner join s on sc.sno=s.sno inner join c on sc.cno=c.cno where cname='$class'");
			$result2=mysqli_query($link,"select credit from c where cno in (select cno from t where username=$username)");
			$data2=mysqli_fetch_row($result2);
			$credit=$data2[0];
			echo "<h2 align='center'>My students</h2>";	
			echo "<table align='center' width='450px' border='2px' cellpadding='0' cellspacing='0'>";
			echo "<tr><th>UwinID</th><th>Student Name</th><th>Gender</th><th>Email</th><th>Class Name</th><th>Credits</th></tr>";
			while($row=mysqli_fetch_array($result1)){
				echo "<tr>";
				echo "<td>".$row[0]."</td>";
				echo "<td>".$row[1]."</td>";
				echo "<td>".$row[2]."</td>";
				echo "<td>".$row[3]."</td>";
				echo "<td>".$class."</td>";
				echo "<td>".$credit."</td>";
				echo "</tr>";
			}
			echo "</table>";
			mysqli_close($link);
		 ?>
	</div>
</body>
</html>