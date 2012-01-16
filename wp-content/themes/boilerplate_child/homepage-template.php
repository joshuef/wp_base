<?php
/*
Template Name: Homepage Template */
?>

<?php get_header(); ?>


	
				
				
				<?php
				
				
				 if (have_posts()): while (have_posts()): the_post(); 
				
							
	
			//		$about = get_post_meta( $post->ID, 'about_the_comp', true ); // Example get posts meta
		
			//	$competition_stuffs = get_the_term_list( $post->ID, 'stuff', '', ', ', '' ); //Example get taxidermy
				

				?>
				<div class="frontpage">
	
			</div>
			
			
			
			</div><!-- end front page-->

				<?php endwhile; else: wp_reset_query(); ?>
				<?php endif; ?>
				
				
				
<?php get_sidebar(); ?>
<?php get_footer(); ?>