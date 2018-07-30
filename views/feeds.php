		<?php
		foreach ($arg as $data) { ?>
		<div class="form-group">
			<label for="comment"><?php echo $data[1] ?></label>
			<textarea class="form-control" rows="4" id="comment">
				<?php echo $data[0];
			?>
			</textarea>
		</div>
		 <?php }
		?>
		<div class="paginator">
			<?php 
				for ($i=1; $i<=$count; $i++){
					?>
					<a href="<?php echo URL; ?>/feeds/getList/<?php echo $i ?>"><?php echo $i; ?></a> 
				<?php
				}
				?>
		</div>