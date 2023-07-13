<!DOCTYPE html>
<html>
<head>
	<title>View My Classes</title>
	<link rel="stylesheet" type="text/css" href="css/dropClasses.css">
	<?php include 'stuheader.html'; ?>
		<?php
			include 'connect.php';
			$result2=mysqli_query($link,"select sno from s where username=$username");
			$data=mysqli_fetch_row($result2);						
			$sno=$data[0];

			$result1=mysqli_query($link,"select sc.cno,cname,name,cgrade from sc inner join t on sc.cno=t.cno inner join c on sc.cno=c.cno where sno=$sno");
			
			echo "<h2 align='center'>My Classes</h2>";	
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

		mysqli_close($link);
	?>				
	</div>
</body>
</html>