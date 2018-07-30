<script src='https://www.google.com/recaptcha/api.js'></script> 
<div class="well">

<form class="form-horizontal" action="<?php echo URL;?>/feedback/run" method="post">
	<!--action="index.php?id=1" -->
<div class = "panel-heading">
	<h3>Your Feed, <?php echo $_SESSION['first_name'];?>!</h3>
</div>

	<div class="form-group">
	<?php	
		if (empty($_SESSION['first_name'])) { ?>
			<label for="f_name">Your name:</label>
			<input type="text" class="form-control" name="f_name" placeholder='name' >
			</div>
			<div class="form-group">
			<label for="f_email">Your email:</label>
			<input type="email" class="form-control" name="f_email" required placeholder='email'>
		<?php }
	?>
	</div>
	<div class="form-group">
		<label for="feed"> Your feed:</label>
		<textarea class="form-control" name="feed" placeholder="Your comment here..." rows="8" required></textarea>
	</div>
	<div class="form-group">
		<div class="g-recaptcha" data-sitekey="<?php echo public_key;?>"></div>
		<input type="submit" class="btn btn-default btn-lg" name="bt_feed" value="GO!"/>
		<input type="reset" class="btn btn-default btn-lg" name="rt_feed" value="Clear">
	</div>
</form>
