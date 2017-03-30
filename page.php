<?php get_header(); ?>

		<h2><?php the_title(); ?></h2>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post">

			<?php the_content(__('<p class="serif">Read the rest of this page &raquo;</p>')); ?>

			<?php wp_link_pages(array('before' => __('<p><strong>Pages:</strong> '), 'after' => '</p>', 'next_or_number' => 'number')); ?>

			<h5><?php edit_post_link(__('Edit'), '<p>', '</p>'); ?></h5>
		</div> <!-- /end .post -->
				
		<?php endwhile; endif; ?>

<?php get_footer(); ?>