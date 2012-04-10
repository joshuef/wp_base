<?php
/*
Template Name: Homepage Template */
?>

<?php get_header(); ?>



			
			<?php
			
			$paged = (get_query_var('page')) ? get_query_var('page') : 1;
			
			$get_q_args =	( 
			 		array(
			 		'post_type' => 'post',
				//	'category_name' => $category,
				 	'paged' => $paged,

					'orderby' => 'date',
					'order' => 'DESC',
					'posts_per_page' => 9,

				));
				
			$wp_query = new WP_Query( $get_q_args );	
			
			?>
			<div class="frontpage">
				<?php 	if ($wp_query->have_posts()): while ($wp_query->have_posts()): $wp_query->the_post();  ?>
			
				<a href="<?php the_permalink(); ?>">	
					<div class="post">
						<h2><?php the_title();?></h2>
						<div class=""><?php the_post_thumbnail('medium'); ?></div>
					</div> <!-- post--></a>
		

			<?php endwhile; else: wp_reset_query(); ?>
			<?php endif; ?>


						<div class="navigation"><p><?php// posts_nav_link(); ?></p></div>

						<?php posts_nav_link(',','Newer','Older'); ?>

						</div> <!--- end of front page-->
				
<?php get_sidebar(); ?>
<?php get_footer(); ?>