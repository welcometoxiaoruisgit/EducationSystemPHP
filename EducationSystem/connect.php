<?php
			if (!session_id())	session_start();
			echo "<br>"."<div style='text-align:left;'>Welcome".'“'.$_SESSION['username'].'”'."Log In！</div>"."<br>";
			$username=$_SESSION['username'];
			include 'conn.php';
			
?>