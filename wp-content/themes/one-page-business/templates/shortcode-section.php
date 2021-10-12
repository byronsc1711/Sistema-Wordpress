<?php 
$one_page_business_booking_shortcode = get_theme_mod('header_shortcode', '');
if($one_page_business_booking_shortcode !='') { 

?>
<section id="booking-shortcode">
	<div class="text-center">
		<?php 
			echo do_shortcode( wp_kses_post($one_page_business_booking_shortcode) );	
		?>
	</div>
</section>

<?php
} 

