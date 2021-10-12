<?php if ( is_single() ) { ?>
<?php if ( !function_exists('register_sidebar') || !dynamic_sidebar('widgetssingle') ) : ?>
<?php endif; ?>
<?php } ?>

<?php if ( is_tag() ) { ?>
<?php if ( !function_exists('register_sidebar') || !dynamic_sidebar('widgetscolumn') ) : ?>
<?php endif; ?>
<?php } ?>
