<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<div><label class="screen-reader-text" for="s">Search for:</label>
		<input type="text" value="<?php _e('Search for...', 'wplook'); ?>" name="s" id="s" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
		<input type="submit" id="searchsubmit" value="Search" />
	</div>
</form>