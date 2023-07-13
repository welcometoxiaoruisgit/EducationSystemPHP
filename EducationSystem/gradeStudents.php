<!DOCTYPE html>
<html>
<head>
	<title>Grade Student</title>
	<link rel="stylesheet" type="text/css" href="css/gradeStudents.css">
	<?php include 'teaheader.html'; ?>
		<?php
			include 'connect.php';
			$result=mysqli_query($link,"select class from t where username=$username");
			$data=mysqli_fetch_row($result);
			$class=$data[0];
			echo "<br>"."Your class is ".'“'.$class.'”'."<br>"."<br>";

			$result1=mysqli_query($link,"select sc.sno,name,cgrade from sc inner join s on sc.sno=s.sno inner join c on sc.cno=c.cno where cname='$class'");
			$result2=mysqli_query($link,"select credit,cno from c where cname='$class'");
			$data1=mysqli_fetch_row($result2);
			$cno=$data1[1];
			$mark=$data1[0];
		
			echo "<h2 align='center'>My Students</h2>";	
			echo "<table align='center' width='450px' border='2px' cellpadding='0' cellspacing='0'>";
			echo "<tr><th>UwinID</th><th>Student Name</th><th>Class Name (Credits)</th><th>Grade</th></tr>";
			while($row=mysqli_fetch_array($result1)){
				echo "<tr>";
				echo "<td>".$row[0]."</td>";
				echo "<td>".$row[1]."</td>";
				echo "<td>".$class." (".$mark.")</td>";
				echo "<td>".$row[2]."</td>";
				echo "</tr>";
			}
			echo "</table>";

			
			if(isset($_POST['xz'])){
				$sno=$_POST['UwinID'];
				$grade=$_POST['gradeStudent'];
				if($grade > $mark) {
					echo "<script>alert('Exceeded the maximum score for the course！');window.history.go(-1)</script>";
					exit();
				}

				$result3=mysqli_query($link,"select * from sc where cno='$cno' and sno='$sno'");
				$result4=mysqli_query($link,"select * from sc where cno='$cno' and sno='$sno' and cgrade=0");
				if(mysqli_num_rows($result3)==1)
				{
						mysqli_query($link,"update sc set cgrade='$grade' where cno='$cno' and sno='$sno'");
						mysqli_query($link,"update s set grade=grade+'$mark' where sno='$sno'");
						echo "<script>alert('Graded successfully！');window.history.go(-1)</script>";
						exit();
		
				}
				else
				{
					echo "<script>alert('Please enter the student's UwinID of this class！')</script>";
				}
			}
			mysqli_close($link);
		 ?>
		 <form name="teamark" id="teamark" method="post">
		 	<table border="0" cellspacing="0" cellpadding="0" class="rt">
		 		<tr>
					<td>Enter UwinID of the student：</td>
					<td>
		 				<input type="text" name="UwinID" id="stu" size="20" required="required">
		 				<span style="color: red;font-size: 18px;">*</span>
		 		</tr>	
				
				<tr>
					<td>Enter the grade of the student：</td>
					<td>
		 				<input type="text" name="gradeStudent" id="stu" size="10" required="required">
		 				<span style="color: red;font-size: 18px;">*</span>
		 		</tr>	
				
		 	</table>
		 	<input type="submit" name="xz" value="Grade" class="sb">
		 </form>
	</div>
</body>
</html>