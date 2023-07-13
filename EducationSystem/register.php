<!DOCTYPE html>
<html>
<head>
	<title>Registration Role Selection</title>
	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
			background: url(img/indeximg2.jpg) no-repeat;
			background-size: cover ;
			background-position: center center;
			background-attachment: fixed;		
		}
		p{
			font-weight: bolder;
			font-size: 30px;
			margin-left: 105px;
			color:white;
			text-shadow: 5px 5px 5px black;
		}
		div{
			width: 550px;
			height: 400px;
			margin-top: 160px;
			margin-left: 60px;
			padding-top: 10px;
			background-color:rgba(0,0,0,0.7);
			border-radius: 10px;
		}
		.t2{
			border-radius:2px 2px;
			color:white;
			background-color:rgba(0,0,0,0.7);
			border:0px;
			width:100px;
			height:60px;
			margin-left:220px;
			margin-top:30px;
			font-size: 18px;
			text-shadow: 5px 5px 5px black;
		}
	</style>
</head>
<body>
	<div>
		<form name="login" id="login" method="post">
		<table border="0" cellspacing="0" cellpadding="0">
		<p>[Register]</p>
    	<tr>
    		<td>
    			<a href="stuRegister.php"><input type="button" name="return" id="return" class="t2" value="Student"></a>
			</td>
    	</tr>
    	<tr>
    		<td>
    			<a href="teaRegister.php"><input type="button" name="return1" id="return1" class="t2" value="Teacher"></a>
			</td>
    	</tr>
    	<tr>
    		<td>
          		<a href="index.php"><input type="button" name="return2" id="return2" class="t2" value="Back"></a>
        	</td>
    	</tr>  
			</table>
		</form>
	</div>
</body>
</html>