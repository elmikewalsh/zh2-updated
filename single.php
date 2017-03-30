<?php get_header(); ?>

		<h2><?php the_title(); ?></h2>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<div class="post"> 

        <h6><?php echo __('By:'); ?> <?php if ( get_theme_mod('zh2_author_link') ) { ?><a <?php echo ( get_theme_mod( 'zh2_extlink' ) ) ? "target='_blank'" : "" ?> href="<?php the_author_url(); ?>"><?php the_author(); ?></a><?php } else { the_author_posts_link(); } ?></h6>
			<?php the_content(__('<p class="serif">Read the rest of this entry &raquo;</p>')); ?>
		</div> <!-- /end .post -->
		<h5><?php edit_post_link(__('Edit'), '<p>', '</p>'); ?></h5>

		<div class="home_bottom">
		</div> <!-- /end .home_bottom -->

		<br />

		<br />

		<div class="navigation">

			<?php if (get_adjacent_post(false, '', true)): // if there are older posts ?>
    			<p><strong><?php echo __('Posted:'); ?></strong> <?php the_date('m.d.Y'); ?></p>
			<p><strong><?php echo __('Previous post:'); ?></strong> <?php previous_post_link('%link'); ?></p>
			<?php endif; ?>

			<?php if (get_adjacent_post(false, '', false)): // if there are newer posts ?>
    			<p><strong><?php echo __('Next post:'); ?></strong> <?php next_post_link('%link'); ?></p>
			<?php endif; ?>

		</div> <!-- /end .navigation -->

		<?php endwhile; else: ?>

			<p><?php echo __('Sorry, no posts matched your criteria.'); ?></p>

		<?php endif; ?>

		<?php if(comments_open()) : ?>  
			<?php comments_template(); ?>
		<?php else : ?>  
		<?php endif; ?> 

<?php get_footer(); ?>