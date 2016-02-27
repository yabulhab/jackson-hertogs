<div class="white-header">
<?php get_header(); ?>
</div>
<style> body { background-color: white); }
					</style>
<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
<div class="basic-page" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="jumbotron bump" id="page-jumbo">
		<div class="container">
			<?php
					$parent = array_reverse(get_post_ancestors($post->ID));
					$first_parent = get_page($parent[0]);
					$parent_id = $first_parent->ID;
					// $post_thumbnail_id = get_post_thumbnail_id($parent_id);
			?>
			<style> #page-jumbo { background-image: url('<?php
				$post_thumbnail_id = get_post_thumbnail_id($parent_id);
				if(!$post_thumbnail_id){
					echo "../wp-content/themes/mytheme/images/default1.jpg";
				} else {
				$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
				echo $post_thumbnail_url;
				} ?>'); }



			</style>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><h2 class="basic-jumbo-header"><?php the_title(); ?></h2></a>

		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="home-desc col-xs-12">



				<?php if(!is_page('News')){ ?>
					<!-- IF the page isn't news, we want the title of the page -->
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<h2 class="basic">
							<?php the_title(); ?>
						</h2>
					</a>


			 	<div class="basic-page-content"> <?php the_content(); ?></div>


						<?php
							$all_children = get_pages('child_of='.$post->ID.'&parent='.$post->ID);
							if(sizeof($all_children) > 0){
						?>

			</div>
		</div>
	</div>
	<div class="archive-header-bar"><div class="container">RELATED RESOURCES</div></div>
	<div class="container">
		<div class="row">
			<div class="home-desc col-xs-12">
						<?php
						}
						foreach($all_children as $post) : setup_postdata($post); ?>
							    <div class="related-resources-links"><a href="<?php the_permalink(); ?>"> <?php the_title()?> </a></div>
							    <hr class="newsArchiveLine">

						<?php endforeach; ?>

				<?php } //END IS NOT NEWS ?>
			</div>
		</div>
	</div>

			 				<?php
			 				wp_reset_postdata();
			 // BEGIN NEWS PAGES
								if ( is_page( 'News' ) ) {
									// Display the first article:
									$latest_news = 'category_name=News&posts_per_page=1';
									$latest_query = new WP_Query( $latest_news);
									if($latest_query->have_posts()){
										while($latest_query->have_posts()){
											$latest_query->the_post();
											?>
		<div class="container">
			<div class="row">
				<div class="home-desc col-xs-12">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<h2 class="basic"><?php the_title(); ?></h2>
					</a>
					<div class="featured-news-date">
			 			<?php the_date( n.".".j.".".Y ); ?>
					</div>
					<div class="basic-page-content"><?php the_content() ?></div>

						<?php
							}
						} //end latest news loop
						// Dispaly the archive:
						wp_reset_postdata();

						function posts_by_year() {
						  // array to use for results
						  $years = array();

						  // get posts from WP
					      $news_archive1 = array(
											    'numberposts' => -1,
											    'orderby' => 'post_date',
											    'order' => 'ASC',
											    'post_type' => 'post',
											    'post_status' => 'publish',
											    'category_name' => 'News'
											  );
						  $posts = get_posts($news_archive1);

						  // loop through posts, populating $years arrays
						  foreach($posts as $post) {
						    $years[date('Y', strtotime($post->post_date))][] = $post;
						  }

						  // reverse sort by year
						  krsort($years);

						  return $years;
						} ?>


				</div>
			</div>
		</div> <!-- End news article container -->
		<!-- </div> -->

		<div class="archive-header-bar"><div class="container">OLDER NEWS</div></div>



		<div class="container">
			<div class="row">
				<div class="home-desc col-xs-12">
					<div class="basic-page-content">
					<?php foreach(posts_by_year() as $year => $posts) : ?>

						<div class="newsArchiveHeader">
							<span>
							  	<?php echo $year; ?>
							  	<img class="pull-right indicator" src="../wp-content/themes/mytheme/images/down-arrow.png" data-swap="../wp-content/themes/mytheme/images/x-button.png">
								<hr class="newsArchiveLine">
							</span>
						</div>
						<div class="newsArchiveContent">
							<ul class ="newsArchUl">
							    <?php foreach($posts as $post) : setup_postdata($post); ?>
							    <div class="row">
           						 	<li class="newsArchiveListItem">
							   		 <p class="newsArchDate col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12"><?php the_date(F." ".j)?></p>
							        <a href="<?php the_permalink(); ?>"><p class="newsArchTitle col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12"><?php the_title(); ?></p></a>
							      </li>
							  	</div>
							    <?php endforeach; ?>
							</ul>
		 				</div>

							<?php endforeach;

							wp_reset_postdata();
							?>
					</div>
				</div>
			</div>
		</div> <!-- end archive container -->
							<?php
						}; //ends if (is page news)
			//END NEWS
    					?>



</div> <!-- End basic page -->
	<?php endwhile; ?>
<?php endif; ?>




<?php get_footer(); ?>

