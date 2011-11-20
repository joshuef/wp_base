<?php
/*
Template Name: Homepage Template */
?>

<?php get_header(); ?>


	
				
				
				<?php
				
			//	$loopmonth = '';
				
				 if (have_posts()): while (have_posts()): the_post(); 
				
							
				
			//	$deadline = get_post_meta( $post->ID, 'date', true );
			//	$prize = get_post_meta( $post->ID, 'prize', true );
			//	$comp_link = get_post_meta( $post->ID, 'comp_link', true );
			//		$about = get_post_meta( $post->ID, 'about_the_comp', true );
				
				$competition_organisations = get_the_term_list( $post->ID, 'venue', '', ', ', '' );
				$competition_words = get_the_term_list( $post->ID, 'date', '', ', ', '' );
			//	$competition_stuffs = get_the_term_list( $post->ID, 'stuff', '', ', ', '' );
				
		
		
				
				?>
				<div class="show frontpage">
					
				
					
	<?php
	
	//	 if ($loopmonth !== date('F', strtotime($deadline))) {
			
	//		 $loopmonth = date('F', strtotime($deadline)); 
?>
	<h1><?php//	echo $loopmonth; ?></h1>
			
			
	<?php	}
		
		   ?>
					

					<div class="show"> <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
			
		<span class="factoid date">Due: <?php 	if ($date) {
				echo date('l', strtotime($deadline));
				} ?>.</span> 
				
				<span class="factoid"> <?php // echo $about ?> </span>
				
				<span class="factoid competition_link"><a href="<?php echo $comp_link ?>" target="_blank">Click through to <?php the_title(); ?> site.</a></span>
				
				</div>
			
		
			
				<div class="deets">


					<span class="deet_button"><?php echo $competition_words ?></span>

					<span class="deet_button"> <?php echo $prize ?></span>
				<span class="deet_button"><?php echo $competition_organisations ?> </span>
				<span class="deet_button"> <?php echo $medium ?></span>
				 <br />
			 <span class="tags"><?php the_tags( '', '', '' ); ?> </span>

			</div>
			
			
			
			</div><!-- competition front page-->

				<?php endwhile; else: wp_reset_query(); ?>
				<?php endif; ?>
				
				
				
<?php get_sidebar(); ?>
<?php get_footer(); ?>