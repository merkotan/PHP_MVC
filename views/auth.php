<div class="well">
<form class="form-horizontal" action="<?php echo URL;?>/login/addUser" method="post">
	<!--action="index.php?id=1" -->
<div class = "panel-heading">
	<h1><?php echo $arg ?></h1>
	<h3>Fill in infomation about yourself</h3>
</div>

<div class="form-group">
	<label for="first_name">Your First Name</label>
	<input type="text" class="form-control" name="first_name" required autofocus />
</div>
<div class="form-group">
	<label for="last_name">Your Last Name</label>
	<input type="text" class="form-control" name="last_name" required/>
</div>
<div class="form-group">
	<label for="auth_email">Your E-mail</label>
	

	<input type="email" class="form-control" name="auth_email" placeholder='Your E-mail' required/>
</div>
<div class="form-group">
	<label for="auth_password">Your Password</label>
	<input type="password" class="form-control"name="auth_pass" placeholder='Your Password' required /><br/>
</div>
 <div class="form-group">
 	<input type="submit" class="btn btn-default" name="register" value="Register"/>
 	<input type="reset" class="btn btn-default" name="reset" value="Reset"/>
 </div>
</div>
</form>