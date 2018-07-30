<div class="well">
<form class="form-horizontal" action="<?php echo URL;?>/login/run" method="post">
	<!--action="index.php?id=1" -->
<div class = "panel-heading">
	<h3>Fill in email & password, please</h3>
</div>

<div class="form-group">
	<label for="email">Your E-mail</label>
	<input type="email" class="form-control" name="email" placeholder='Your E-mail' required/>
</div>
<div class="form-group">
	<label for="password">Your Password</label>
	<input type="password" class="form-control"name="password" placeholder='Your Password' required /><br/>
</div>
 <div class="form-group">
 	<input type="submit" class="btn btn-default" name="login" value="Login"/>
 	<input type="reset" class="btn btn-default" name="reset" value="Reset"/>
 </div>
</div>
</form>
