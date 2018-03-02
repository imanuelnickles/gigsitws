<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
	.text{
		color:black;
	}
	.pass{
		border-style: solid;
    	border-width: 2px;
    	width: 400px;
    	text-align: center;
	}
	</style>
</head>
<body>

	
        <div>
        	<h2 class="text">Temporary Password</h2>
        	<br>
            <span class="text">Your temporary password is below.</span>
			<br/>
			<h3 class="pass"><?php echo $password; ?></h3>
	        <br/>
           
			<span class="text">Please change with a new password in profile page.</span>
			<br>
			<span class="text">Thanks.</span>
           

        </div>
</body>
</html>