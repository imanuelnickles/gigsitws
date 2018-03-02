<!DOCTYPE html>
<html>
<head>
	
	
	<title></title>
	<style>
	
	.buton{
		background:black;
		border-style:none;
		font-size:18px;
		padding:8px;
		border-radius:4px;
		color:#FFCC33;
		
	}
	</style>
</head>
<body>

	
        <div class="container">
        	<h2 style="color:black">Verify Your Email Address</h2>
        	<div class="row">
			<span style="color:black">Thanks for creating an account with Gigsit app.</span>
		</div>
		<div class="row">
			<span style="color:black">Please follow the link below to verify your email address</span>
		</div>
		<br>
            	<div class="row">
            		<?php echo '<a href="' . $confirmation_code . '"><button type="button" class="buton">Click Here</button></a>'; ?>
            		
			
		</div>
			
           
           
			
            
            <!-- <a href="">Click Here</a> -->

        </div>

</body>
</html>