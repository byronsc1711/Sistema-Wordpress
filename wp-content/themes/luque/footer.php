			</div><!--.main-->
			<footer>
				<section class="esection grid">	
					<div class="father-col clearfix">
						<?php if(!dynamic_sidebar('widgetsfoot')); ?>
					</div><!--father-col clearfix-->	
					<div class="footer-credits">
						<p class="footer-copyright">&copy; 
							<?php echo esc_html( date_i18n( __( 'Y', 'luque' ) ) ); ?> <a href="<?php echo esc_url( home_url() ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						</p>
						<p class="theme-credits">
							<?php
							/* Translators: $s = name of the theme developer */
							printf( esc_html_x( 'Theme by %s', 'Translators: $s = name of the theme developer', 'luque' ), '<a href="https://www.bernibernal.com/">' . esc_html__( 'Berni Bernal', 'luque' ) . '</a>' ); ?>
						</p><!-- .theme-credits -->
					</div><!--footer-credits-->
				</section>	  
			</footer>
			<a class="goup" href="#goup">
				<span class="arrow-up icon" aria-hidden="true"></span>
			</a>
			<?php wp_footer(); ?>			   
		</body>
		</html>