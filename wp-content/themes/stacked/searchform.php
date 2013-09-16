<!--BEGIN #searchform-->
<form method="get" class="searchform" action="<?php echo home_url(); ?>/">
	<fieldset>
		<input type="text" name="s" class="s" value="<?php _e('Search...', 'framework') ?>" onfocus="if(this.value=='<?php _e('Search...', 'framework') ?>')this.value='';" onblur="if(this.value=='')this.value='<?php _e('Search...', 'framework') ?>';" />
	</fieldset>
<!--END #searchform-->
</form>