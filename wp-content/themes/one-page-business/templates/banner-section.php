<?php 
$one_page_business_banner_image = get_theme_mod('banner_image', '');
if($one_page_business_banner_image !='') { 

?>
<section id="top-banner">
	<div style="text-align:center;">
		<?php 
			echo '<a href="'.esc_url(get_theme_mod('banner_link', '#')).'" ><img src="'.esc_url($banner_image).'" /></a>';	
		?>
	</div>
</section>

<?php
} 

