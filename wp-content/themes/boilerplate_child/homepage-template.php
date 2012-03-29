<?php
/*
Template Name: Homepage Template */
?>

<?php get_header(); ?>


	
				
				<?php
				$get_q_args =	( 
				 		array(
				 		'post_type' => 'post',
					//	'category_name' => $category,
					 //	'paged' => $paged,

						'orderby' => 'date',
						'order' => 'DESC',
						'posts_per_page' => 9,

					));
				?>
				<div class="frontpage">
				<?php 	if (have_posts()): while (have_posts()): the_post();  ?>
				
					<a href="<?php the_permalink(); ?>">	
						<div class="post">
							<h2><?php the_title();?></h2>
							<div class=""><?php the_post_thumbnail('thumbnail'); ?></div>
						</div> <!-- post--></a>
			
			</div><!-- end front page-->

				<?php endwhile; else: wp_reset_query(); ?>
				<?php endif; ?>

				
<?php get_sidebar(); ?>
<?php get_footer(); ?>