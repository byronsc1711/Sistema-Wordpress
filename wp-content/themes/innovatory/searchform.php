<?php
/**
 * Search Form
 */

?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search..', 'innovatory' ); ?>" />
	<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
</form>