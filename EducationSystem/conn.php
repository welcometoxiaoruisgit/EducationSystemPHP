<?php
		$link=mysqli_connect('localhost','root','661158','comp3340');
		mysqli_set_charset($link,'utf8');
		if (!$link){
    		echo"<script>alert('Failed to connect！')</script>";
		}
?>