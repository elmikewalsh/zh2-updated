	<span class="social-title"><?php echo get_option('zh2_social_links_title'); ?>&nbsp;</span>
	 <?php wp_nav_menu( array('theme_location'  => 'social_menu' ,'sort_column' => 'menu_order', 'container_class' => 'social', 'after' => '&nbsp;<li class="menu-divider">|</li>' ) ); ?></p>

    <p><?php wp_nav_menu( array('theme_location'  => 'footer_menu' ,'sort_column' => 'menu_order', 'container_class' => 'footer', 'after' => '&nbsp;<li class="menu-divider">::</li>' ) ); ?></p>

	</div>  <!-- /end .container -->

	<?php wp_footer(); ?>

</body>
</html>